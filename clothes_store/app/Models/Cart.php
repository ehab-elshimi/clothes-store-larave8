<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'product_title',
        'price',
        'quantity'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}