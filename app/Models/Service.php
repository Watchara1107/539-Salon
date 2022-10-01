<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
   
    public function booking(){
        return $this->hasMany(Booking::class,'service_id');
    }
    public function incom(){
        return $this->hasMany(Incom::class,'service_id');
    }
}
