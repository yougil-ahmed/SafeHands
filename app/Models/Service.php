<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'description',  'status', 'location', 'service_image', 'images'];

    protected $casts = [
        'images' => 'array',
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function packages()
    {
        return $this->hasMany(ServicePackage::class);
    }
}
