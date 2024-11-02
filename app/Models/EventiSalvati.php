<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EventiSalvati extends Model {
    protected $table = 'eventi_salvati';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function account() {
        return $this->belongsTo('App\Models\Account', 'email');
    }
    public function eventi() {
        return $this->belongsTo('App\Models\Eventi', 'id_evento');
    }
}