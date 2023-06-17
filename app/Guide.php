<?php
/**
 * Created by PhpStorm.
 * User: odai
 * Date: 9/23/2019
 * Time: 1:00 PM
 */

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EncryptionTrait;

class Guide extends Model
{
    use EncryptionTrait;

    protected $fillable=['day'];

    protected $appends = ['id_hash', 'key', 'day', 'next_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
//    public function vidoeDetail(){
//       // return $this->hasMany()
//    }

    function getIdHashAttribute()
    {
        return $this->encrypt($this->id);
    }

    function getKeyAttribute()
    {
        return $this->attributes['day_en'];
    }

    public function getDayAttribute()
    {
        if (strtolower(\Carbon\Carbon::now()->englishDayOfWeek) == $this->day_en) {
            return Carbon::now()->format('d');
        }

        return \Carbon\Carbon::now()->next($this->day_en)->format('d');
    }

    public function getNextDateAttribute()
    {
      return Carbon::parse('this '. $this->day_en)->toDateString();
    }



}
