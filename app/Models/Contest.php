<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Contest extends Model {
    protected $table = 'contest';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function dateContest() {
        return $this->hasMany('App\Models\DateContest', 'id_contest');
    }
    public function domandeContest() {
        return $this->hasMany('App\Models\DomandeContest', 'contest');
    }
    public function contestSalvati() {
        return $this->hasMany('App\Models\ContestSalvati', 'id_contest');
    }
}