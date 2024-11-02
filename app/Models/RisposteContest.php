<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RisposteContest extends Model {
    protected $table = 'risposte_contest';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function domandeContest() {
        return $this->belongsTo('App\Models\DomandeContest', 'id_domanda');
    }
    public function risposteContestSalvate() {
        return $this->hasMany('App\Models\RisposteContestSalvate', 'id_risposta');
    }
}