<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duel extends Model {

    protected $primaryKey = 'duel_ID';
    
    use HasFactory;

    protected $fillable = [

        'date',
        'celebrated_at',
        'winner_ID',
        'loser_ID',
        'winner_mana_used',
        'loser_mana_used',
        
    ];
    
}
