<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;

class Enquiry extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $guarded = [];

   /* public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }*/
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->nonQueued();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
