<?php

namespace Modules\RentalApplication\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ScreeningQuestion extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['pm_id', 'title', 'question_type', 'field_type', 'status'];

    protected static function newFactory()
    {
        return \Modules\RentalApplication\Database\factories\ScreeningQuestionFactory::new();
    }
}
