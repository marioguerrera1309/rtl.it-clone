<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Eventi extends Model {
    protected $table = 'eventi';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function dateEventi() {
        return $this->hasMany('App\Models\DateEventi', 'id_evento');
    }
    public function eventiSalvati() {
        return $this->hasMany('App\Models\EventiSalvati', 'id_evento');
    }
}