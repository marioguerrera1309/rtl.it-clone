<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Nazioni extends Model {
    protected $table = 'nazioni';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function account()
    {
        return $this->hasMany('App\Models\Account', 'nazione');
    }
}