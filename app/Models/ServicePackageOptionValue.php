<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePackageOptionValue extends Model
{
    protected $fillable = ['service_package_id', 'package_option_id', 'value'];

    public function package()
    {
        return $this->belongsTo(ServicePackage::class, 'service_package_id');
    }

    public function option()
    {
        return $this->belongsTo(PackageOption::class, 'package_option_id');
    }
}
