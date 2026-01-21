<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\Method\UserMethod;
use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;
use App\Domains\Auth\Models\Traits\Scope\UserScope;
use App\Domains\Auth\Notifications\Frontend\ResetPasswordNotification;
use App\Domains\Auth\Notifications\Frontend\VerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Lab404\Impersonate\Models\Impersonate;
use Laragear\TwoFactor\Contracts\TwoFactorAuthenticatable;
use Laragear\TwoFactor\TwoFactorAuthentication;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @method bool hasManagerAccess()
 * @method bool hasAllAccess()
 * @method bool hasAgentAccess()
 * @method bool can(string $permission)
 * @method bool isManager()
 * @method bool isMasterAdmin()
 * @method bool isAgent()
 */
class User extends Authenticatable implements MustVerifyEmail, TwoFactorAuthenticatable
{
    use Billable;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Impersonate;
    use MustVerifyEmailTrait;
    use Notifiable;
    use SoftDeletes;
    use TwoFactorAuthentication;
    use UserAttribute;
    use UserMethod;
    use UserRelationship;
    use UserScope;

    public const TYPE_ADMIN = 'admin';
    public const TYPE_USER = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'uuid',
        'username',
        'slug',
        'first_name',
        'last_name',
        'name',
        'avatar',
        'email',
        'phone',
        'email_verified_at',
        'phone_verified_at',
        'password',
        'password_changed_at',
        'active',
        'gender',
        'date_of_birth',
        'timezone',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'last_login_at',
        'last_login_ip',
        'to_be_logged_out',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'email_verified_at',
        'password_changed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'to_be_logged_out' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'avatar',
        'property_count',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'permissions',
        'roles',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Auto-generate UUID
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }

            // Auto-generate username if not set
            if (empty($model->username)) {
                $baseUsername = Str::slug($model->first_name ?? $model->name ?? 'user');
                $random = Str::random(5);
                $username = strtolower($baseUsername . $random);

                // Ensure unique username
                while (self::where('username', $username)->exists()) {
                    $username = strtolower($baseUsername . Str::random(5));
                }

                $model->username = $username;
            }

            // Auto-generate slug
            if (empty($model->slug)) {
                $slugBase = Str::slug($model->name ?? $model->username);
                $slug = $slugBase;
                $count = 1;
                while (self::where('slug', $slug)->exists()) {
                    $slug = $slugBase . '-' . $count++;
                }
                $model->slug = $slug;
            }
        });
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the registration verification email.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail());
    }

    /**
     * Return true or false if the user can impersonate an other user.
     * @param bool
     */
    public function canImpersonate(): bool
    {
        if ($this->hasManagerAccess()) {
            return $this->can('user.access.user.impersonate');
        }
        if ($this->hasAllAccess()) {
            return $this->can('admin.access.user.impersonate');
        }
        if ($this->hasAgentAccess()) {
            return $this->can('user.access.user.impersonate');
        }

        return false;
    }

    /**
     * Return true or false if the user can be impersonate.
     *
     * @param bool
     */
    public function canBeImpersonated(): bool
    {
        $user = Auth::user();

        if (! $user) {
            return false;
        }

        if ($user->hasManagerAccess()) {
            return ! $this->isManager();
        }
        if ($user->hasAllAccess()) {
            return ! $this->isMasterAdmin();
        }
        if ($user->hasAgentAccess()) {
            return ! $this->isAgent();
        }

        return false;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function getPropertyCountAttribute()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasAllAccess()) {
                return UserEntity::where(['account_id' => $this->id, 'entity_key' => 'property'])->count();
            } elseif ($user->hasManagerAccess()) {
                return Property::where(['prop_agents' => $this->id])->count();
            }
        } else {
            return 0;
        }
    }
}
