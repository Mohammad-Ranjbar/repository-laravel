<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Void_;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;


class Book extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $fillable = ['name', 'code'];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(350)
            ->height(400)
            ->sharpen(10);
        $this->addMediaConversion('old')
            ->sepia()
            ->border(10, 'black', Manipulations::BORDER_OVERLAY);
    }
}
