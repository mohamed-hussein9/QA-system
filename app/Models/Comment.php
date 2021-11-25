<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'photo'

    ];
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }
    public function post()
    {
        return $this->belongsTo('App\models\Post');
    }
    public function subComments()
    {
        return $this->hasMany('App\models\Subcomment', 'comment_id', 'id');
    }
}
