<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\EncryptionTrait;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable=['key','value','active'];

    use EncryptionTrait;

    protected $appends = ['id_hash'];

    function getIdHashAttribute()
    {
        return $this->encrypt($this->id);
    }


}
