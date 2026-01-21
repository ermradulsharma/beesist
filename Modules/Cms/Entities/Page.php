<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'custom_head_script', 'custom_footer_script', 'gjs_data', 'is_active', 'order', 'page_type'];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($page) {
            $page->slug = $page->generateSlug($page->title);
            $page->save();
        });
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

    protected static function newFactory()
    {
        return \Modules\Cms\Database\factories\PageFactory::new();
    }
}
