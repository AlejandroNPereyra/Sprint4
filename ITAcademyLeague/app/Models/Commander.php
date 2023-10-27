<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commander extends Model
{
    protected $primaryKey = 'commander_ID';
    
    protected $fillable = ['commander_name', 'description', 'email'];

    use HasFactory;

}
