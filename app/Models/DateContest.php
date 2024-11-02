<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DateContest extends Model {
    protected $table = 'date_contest';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function contest() {
        return $this->belongsTo('App\Models\Contest', 'id_contest');
    }
}