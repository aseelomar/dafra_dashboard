<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\EncryptionTrait;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, HasRoles, EncryptionTrait;

    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','image','active'
    ];
    protected $guard_name = 'admin';

    protected $hidden = [ 'password', 'remember_token' ];

    protected $appends = [ 'humans_date','id_hash' ];

    protected $casts = [ 'email_verified_at' => 'datetime' ];


    public function parent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getHumansDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    function getIdHashAttribute()
    {
        return $this->encrypt($this->id);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
