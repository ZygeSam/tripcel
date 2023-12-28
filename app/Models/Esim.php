<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esim extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function transactions(){
        return $this->hasMany(EsimOrders::class, 'esimIccid', 'esimIccid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
