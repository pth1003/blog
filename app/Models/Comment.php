<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    public $table = 'comment';

    public $fillable = ['content', 'post_id', 'user_id'];
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
