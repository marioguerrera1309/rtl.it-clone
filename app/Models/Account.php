<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Account extends Model {
    protected $table = 'account';
    protected $primaryKey = 'email';
    public $timestamps = false;
    protected $autoIncrement = false;
    protected $keyType = 'string';
    public function nazioni() {
        return $this->belongsTo('App\Models\Nazioni', 'nazione');
    }
    public function risposteContestSalvate() {
        return $this->hasMany('App\Models\RisposteContestSalvate', 'email');
    }
    public function contestSalvati() {
        return $this->hasMany('App\Models\ContestSalvati', 'email');
    }
    public function eventiSalvati() {
        return $this->hasMany('App\Models\EventiSalvati', 'email');
    }
    public function preferiti() {
        return $this->hasMany('App\Models\Preferiti', 'email');
    }
}