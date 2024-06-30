<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $guarded = false;

    protected $table = 'assessments';

    protected $fillable = ['comment_id', 'sender_id', 'status'];


        // Отношение с отправителем (User)
        public function sender()
        {
            return $this->belongsTo(User::class, 'sender_id');
        }

        // Отношение с типом комментария (Comment)
        public function comment()
        {
            return $this->belongsTo(Comment::class, 'comment_id');
        }
    

}
