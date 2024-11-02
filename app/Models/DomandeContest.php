<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DomandeContest extends Model {
    protected $table = 'domande_contest';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function contest() {
        return $this->belongsTo('App\Models\Contest', 'contest');
    }
    public function risposteContest() {
        return $this->hasMany('App\Models\RisposteContest', 'id_domanda');
    }
}