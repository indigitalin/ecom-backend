<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'business_name',
        'industry',
        'description',
        'address',
        'city',
        'state_id',
        'country_id',
        'plan_id',
        'status',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
  
}
