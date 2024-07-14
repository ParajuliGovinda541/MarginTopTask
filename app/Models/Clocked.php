<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clocked extends Model
{
    use HasFactory;

    protected $table = 'clocked_times';

    protected $fillable = [
'user_id','start_datetime','end_datetime'
    ];
}
