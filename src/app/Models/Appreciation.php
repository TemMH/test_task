<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    
    protected $guarded = false;

    protected $table = 'appreciations';

    protected $fillable = ['sender_id', 'recipient_id', 'appreciation_type_id'];

        // Отношение с отправителем (User)
        public function sender()
        {
            return $this->belongsTo(User::class, 'sender_id');
        }
    
        // Отношение с получателем (User)
        public function recipient()
        {
            return $this->belongsTo(User::class, 'recipient_id');
        }
    
        // Отношение с типом благодарности (Appreciation_type)
        public function appreciationType()
        {
            return $this->belongsTo(Appreciation_type::class, 'appreciation_type_id');
        }
    
        public function comments()
        {
            return $this->hasMany(Comment::class, 'appreciation_id');
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
        
}
