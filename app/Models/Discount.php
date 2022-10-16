<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    public function incom(){
        return $this->hasMany(Incom::class, 'discount_id');
    }
}
