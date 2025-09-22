<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Database\Factories\AgentFactory;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agents';
    protected $fillable = ['name', 'email', 'address', 'phone', 'photo', 'status'];

    // protected static function AgentFactory()
    // {
    //     return AgentFactory::new();
    // }
}
