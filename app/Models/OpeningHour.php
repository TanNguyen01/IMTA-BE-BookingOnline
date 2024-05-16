<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    use HasFactory;
    protected $fillable =[
        'store_information_id',
        'day',
        'opening_time',
        'closing_time',
    ];


    public function storeInformation()
    {
        return $this->belongsTo(StoreInformation::class, 'store_information_id');
    }
}