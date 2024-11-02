<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ContestSalvati extends Model {
    protected $table = 'contest_salvati';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function account() {
        return $this->belongsTo('App\Models\Account', 'email');
    }
    public function contest() {
        return $this->belongsTo('App\Models\Contest', 'id_contest');
    }
}