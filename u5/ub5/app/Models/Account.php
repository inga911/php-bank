<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['client_id'];
    public $timestamps = false;

    public function client() 
    {
        return $this->belongsTo(Client::class);
    }
}
