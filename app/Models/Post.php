<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\models\Comment;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'body', 'photo'

    ];
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
