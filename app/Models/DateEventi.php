<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DateEventi extends Model {
    protected $table = 'date_eventi';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function eventi() {
        return $this->belongsTo('App\Models\Eventi', 'id_evento');
    }
}