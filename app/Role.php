<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Role extends \Spatie\Permission\Models\Role
{

    protected $appends = [ 'description' ];


    public function getDescriptionAttribute()
    {
        if (App::getLocale() == 'ar') {
            return $this->description_ar;
        } else {
            return $this->description_en;
        }
    }
}
