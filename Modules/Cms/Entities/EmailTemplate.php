<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'subject', 'scheduled_time', 'schedule_desc', 'content', 'command', 'other_reciepients', 'role', 'notify_trigger', 'is_active'];

    protected static function newFactory()
    {
        return \Modules\Cms\Database\factories\EmailTemplateFactory::new();
    }

    private function generateSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
