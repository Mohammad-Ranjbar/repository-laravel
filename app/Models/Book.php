<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Book extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $fillable = ['name', 'code'];
}
