<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    
    protected $guarded = false;

    protected $table = 'appreciations';

    protected $fillable = ['sender_id', 'recipient_id', 'appreciation_type_id'];
    
}
