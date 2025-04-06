<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageOption extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'name', 'sort_order'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function values()
    {
        return $this->hasMany(OptionValue::class, 'option_id');
    }

    public function packageValues($packageId)
    {
        return $this->values()->where('package_id', $packageId)->first();
    }
}
