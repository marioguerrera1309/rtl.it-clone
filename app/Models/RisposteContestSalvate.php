<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RisposteContestSalvate extends Model {
    protected $table = 'risposte_contest_salvate';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function account() {
        return $this->belongsTo('App\Models\Account', 'email');
    }
    public function risposteContest() {
        return $this->belongsTo('App\Models\RisposteContest', 'id_risposta');
    }
}