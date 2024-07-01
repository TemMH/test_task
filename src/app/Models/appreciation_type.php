<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appreciation_type extends Model
{
    use HasFactory;

    public function appreciations_user()
{
    return $this->hasMany(Appreciation::class);
}

}
