<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    //
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $fillable = ['nip','namadosen'];
    
    public function mhsnya(){
    	return $this->hasMany('App\mhs','nipdosenwali');
    }
    public static $rules = array(
    		'nip'=>'required|min:2',
    		'namadosen'=>'required|min:3'
    		
    );
}
