<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incom extends Model
{
    use HasFactory;
    protected $table = 'incoms';
    protected $fillable = [
        'service_id',
        'salon_id',
        'price',
        'comment',
        'created_at',
        'updated_at'
    ];

    public function salon()
    {
        return $this->belongsTo(Salon::class,'salon_id');
    }
    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class,'discount_id');
    }
}
