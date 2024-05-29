<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'store_information_id', 'day', 'start_time', 'end_time',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storeInformation()
    {
        return $this->belongsTo(StoreInformation::class);
    }

}
