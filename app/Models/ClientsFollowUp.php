<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsFollowUp extends Model
{
    use HasFactory;

    protected $table = 'clients_follow_up'; 
    protected $fillable = [
        'ar_name',
        'email',
    ];
}
