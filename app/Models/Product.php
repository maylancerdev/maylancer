<?php

namespace App\Models;

use App\Enums\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory,  InteractsWithMedia;


    protected $fillable = [
        'name',
        'price',
        'description',
        'product_type',
        'external_link',
        'product_thumbnail',
        'published',
        'is_lifetime',
    ];

    protected $casts = [
        'product_type' => ProductType::class,
        'published' => 'boolean',
        'is_lifetime' => 'boolean',
        'price' => 'decimal:2',
    ];


    public function thumbnail()
    {
        return Storage::disk('admin-uploads')->url($this->product_thumbnail);
    }

}
