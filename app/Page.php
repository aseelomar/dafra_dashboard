<?php

namespace App;
use App\Traits\EncryptionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    use EncryptionTrait;

    protected $fillable = ['name','slug','content','user_id'];
    protected $appends = ['id_hash'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($page){
            $page->slug = str_slug($page->name, '-', config('locale'));
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function getIdHashAttribute()
    {
        return $this->encrypt($this->id);
    }

    public function getContentAttribute()
    {
        if (App::getLocale() == 'ar') {
            return $this->attributes['content'];
        } else {
            return $this->content_en;
        }
    }

    public function getNameAttribute()
    {
        if (App::getLocale() == 'ar') {
            return $this->attributes['name'];
        } else {
            return $this->name_en;
        }
    }


}
