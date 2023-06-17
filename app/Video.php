<?php

namespace App;
use App\Traits\EncryptionTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use EncryptionTrait;
    protected $with = ['videoDetail'];
    protected $fillable = ['link','video_details_id','episode','part','user-show','user_id','updated_id','active', 'at_home'];

    protected $appends = ['humans_date', 'id_hash', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function videoDetail(){
        return $this->belongsTo(VideoDetail::class, 'video_details_id');
     }

    public function getHumansDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    function getIdHashAttribute()
    {
        return $this->encrypt($this->id);
    }
    public function scopeActive($q)
    {
        return $q->where('active', 1);
    }

    public function getSlugAttribute()
    {
//        if ($this->videoDetail->category_id == 5) {
//            return route('site.showVideo', $this->videoDetail->slug .'-'. $this->id);
//        }
        return route('site.showVideo', $this->id . '-' . $this->videoDetail->slug);
    }

    public function scopeHome($q)
    {
        return $q->where('at_home', 1);
    }

    public function setLinkAttribute($value)
    {
        if (is_null($value)) return $this->attributes['link'] = '';

        if (strpos($value, 'youtube') > 0) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                $value,
                $match);

            $this->attributes['link'] = 'https://www.youtube.com/embed/' . $match[1] . '?autoplay=1';

        } elseif (strpos($value, 'dacast') > 0) {
            $this->attributes['link'] = $value;
        }
    }



}
