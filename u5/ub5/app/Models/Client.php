<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Client extends Model
{
    use HasFactory;

    const SORT = [
        'default' => 'No sort',
        'name_asc' => 'By name A-Z',
        'name_desc' => 'By name Z-A',
        'surname_asc' => 'By surname A-Z',
        'surname_desc' => 'By surname Z-A',
    ];
    const PER = [
        '10' => '10 per page',
        '17' => '17 per page',
        '33' => '33 per page',
        '3' => 'tiny view',
    ];

    
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
