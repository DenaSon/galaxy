<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $fillable = ['user_id','username','likes','rating','text','reply','parent_id','status'];
    public function commentable():MorphTo
    {
        return $this->morphTo();
    }
}
