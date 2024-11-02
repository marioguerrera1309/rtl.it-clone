<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Preferiti extends Model {
    protected $table = 'preferiti';
    protected $primaryKey = 'id_preferito';
    public $timestamps = false;
    public function account() {
        return $this->belongsTo('App\Models\Account', 'email');
    }
}