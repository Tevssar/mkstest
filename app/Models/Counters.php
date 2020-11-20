<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counters extends Model
{
    use HasFactory;

    protected $fillable = ['articles_id', 'views', 'likes'];
}
