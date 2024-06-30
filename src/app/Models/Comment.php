<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = false;

    protected $table = 'comments';

    protected $fillable = ['appreciation_id', 'sender_id', 'comment_text'];

    // Отношение с отправителем (User)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Отношение с благодарностью (Appreciation)
    public function appreciation()
    {
        return $this->belongsTo(Appreciation::class, 'appreciation_id');
    }
}
