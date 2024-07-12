<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPoints extends Model
{
    use HasFactory;
    protected $fillable = [
        'customerId',
        'serviceId',
        'points',
        'price',
    ];

    public function customer()
    {
      return $this->belongsTo(Customer::Class,'customerId');
    }

    public function service()
    {
      return $this->belongsTo(Service::Class,'serviceId');
    }
}
