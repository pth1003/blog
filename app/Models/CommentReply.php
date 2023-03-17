<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommentReply extends Model
{
    use HasFactory;

    public $table = 'comment_reply';

    public $fillable = ['content', 'comment_id', 'user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
