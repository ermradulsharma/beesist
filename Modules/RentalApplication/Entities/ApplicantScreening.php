<?php

namespace Modules\RentalApplication\Entities;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ApplicantScreening extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['app_id', 'screened_by', 'question', 'answer', 'answer_guest', 'question_type', 'field_type'];

    public function screening_user()
    {
        return $this->hasone(User::class, 'id', 'screened_by');
    }

    public function application()
    {
        return $this->hasone(RentalApplication::class, 'id', 'app_id');
    }

    protected static function newFactory()
    {
        return \Modules\RentalApplication\Database\factories\ApplicantScreeningFactory::new();
    }
}
