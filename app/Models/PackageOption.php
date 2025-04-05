<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageOption extends Model
{
    protected $fillable = ['name'];

    public function values()
    {
        return $this->hasMany(ServicePackageOptionValue::class);
    }
}
