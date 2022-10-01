<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;
    protected $table = 'salons';
  
    public function booking(){
        return $this->hasMany(Booking::class,'salon_id');
    }
    public function incom(){
        return $this->hasMany(Incom::class,'salon_id');
    }
}
