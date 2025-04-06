<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'name', 'description', 'price', 'price_per_hour', 'delivery_time', 'revisions'];

    protected $casts = [
        'price' => 'decimal:2',
        'price_per_hour' => 'decimal:2',
        'delivery_time' => 'integer',
        'revisions' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function optionValues()
    {
        return $this->hasMany(OptionValue::class, 'package_id');
    }

    public function getOption($optionId)
    {
        return $this->optionValues()->where('option_id', $optionId)->first();
    }
}
