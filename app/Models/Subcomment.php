<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subcomment extends Model
{
    protected $table = 'sub_comments';
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'comment_id',
        'body',
        'photo',

    ];
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }
    public function comment()
    {
        return $this->belongsTo('App\models\Comment');
    }
}
