<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\EncryptionTrait;

use Carbon\Carbon;
class Goal extends Model
{
    use EncryptionTrait;

    protected $fillable=['name','user_id','description','active'];
    protected $appends = ['humans_date','id_hash'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHumansDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    function getIdHashAttribute()
    {
        return $this->encrypt($this->id);
    }
    public function scopeActive($q)
    {
        return $q->where('active', 1);
    }
}
