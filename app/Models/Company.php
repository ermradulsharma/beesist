<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'logo',
        'email',
        'phone',
        'description',
        'address',
        'st_address',
        'city',
        'state',
        'country',
        'zip',
        'lat',
        'lng',
        'contact',
        'website',
        'social_link',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->company);
            $model->generateUniqueSlug();
        });

        static::updating(function ($model) {
            if ($model->isDirty('company')) {
                $model->slug = Str::slug($model->company);
                $model->generateUniqueSlug();
            }
        });
    }

    public function generateUniqueSlug()
    {
        $originalSlug = $this->slug;
        $count = 1;

        while ($this->slugExists($this->slug)) {
            $this->slug = $originalSlug . '-' . $count;
            $count++;
        }
    }

    protected function slugExists($slug)
    {
        return static::where('slug', $slug)->where('id', '!=', $this->id)->exists();
    }
}
