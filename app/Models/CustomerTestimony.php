<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Collection;


class CustomerTestimony extends Model implements HasMedia
{
    use HasFactory,  InteractsWithMedia;

    protected  $fillable  = [
        'name',
        'designation',
        'testimonial',
        'testimony_avatar',
    ];



    protected function getAvatarAttribute()
    {
        return Storage::disk('admin-uploads')->url($this->testimony_avatar);

    }

    public static function splitInHalf(): array
    {
        $collection = self::all();
        $halfCount = ceil($collection->count() / 2);

        return [
            'firstHalf' => $collection->take($halfCount),
            'secondHalf' => $collection->skip($halfCount),
        ];
    }

}
