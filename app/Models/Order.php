<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable =  [
        'name',
        'details',
        'notes',
        'status',
        'customer_id',
     ];

     public function status()
     {
        if ($this->status == 0) {
            $result = 'initiated' ;
        }
        elseif($this->status == 1){
            $result = 'engage' ;
        }
        elseif($this->status == 2){
            $result = 'processing' ;
        }
        elseif($this->status == 3){
            $result = 'in-progress' ;
        }
        elseif($this->status == 4){
            $result = 'completed' ;
        }
        else {
            $result = 'delivered' ;
        }

        return $result ;

     }

     public function customer()
     {
         return $this->belongsTo(Customer::class,'customer_id');
     }

}
