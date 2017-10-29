<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'summary'];
    
    protected $casts = [
        'user_id' => 'int',
    ];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
