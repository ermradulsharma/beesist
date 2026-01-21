<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Building extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'building_info',
        'building_contacts',
        'construction_info',
        'location',
        'strata_documents',
        'property_photos',
        'seo_data',
        'custom_tags',
        'featured',
        'avg_sqft_rate',
        'avg_strata_fee',
        'other_buildings_in_complex',
        'strata_by_laws',
        'pets_restrictions',
        'maintenance_fee_includes',
        'amenities',
        'other_amenities',
        'features',
        'status',
        'last_edited',
    ];
    protected $casts = [
        'other_buildings_in_complex' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($building) {
            $building->slug = $building->generateSlug($building->title);
            $building->save();
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

    public function properties()
    {
        return $this->hasMany('Modules\Property\Entities\Property', 'building_id', 'id')->with('propertyImages');
    }

    public function photos()
    {
        return $this->hasMany('Modules\Property\Entities\Media', 'ref_id', 'id')->where('type', 'building_photos')->orderby('order', 'ASC');
    }

    public function documents()
    {
        return $this->hasMany('Modules\Property\Entities\Media', 'ref_id', 'id')->where('type', 'building_strata_documents');
    }

    public function featured_image()
    {
        return $this->hasOne('Modules\Property\Entities\Media', 'ref_id', 'id')->where('type', 'building_photos')->where('featured', '1');
    }

    protected static function newFactory()
    {
        return \Modules\Property\Database\factories\BuildingFactory::new();
    }

    public function buildingImages()
    {
        return $this->hasMany(Media::class, 'ref_id', 'id')->where('type', 'building_photos')->orderby('order', 'ASC');
    }

    public function buildingDocuments()
    {
        return $this->hasMany(Media::class, 'ref_id', 'id')->where('type', 'building_strata_documents')->orderby('order', 'ASC');
    }

    public function featuredImage()
    {
        return $this->hasOne(Media::class, 'ref_id', 'id')->where('type', 'building_photos')->where('featured', '1');
    }
}
