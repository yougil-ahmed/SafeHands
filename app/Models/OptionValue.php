<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;

    protected $fillable = ['option_id', 'package_id', 'value'];

    public function option()
    {
        return $this->belongsTo(PackageOption::class);
    }

    public function package()
    {
        return $this->belongsTo(ServicePackage::class);
    }
}
