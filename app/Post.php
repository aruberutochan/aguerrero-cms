<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Bnb\Laravel\Attachments\HasAttachment;
use Conner\Tagging\Taggable;
class Post extends Model
{
    use HasAttachment;
    use Taggable;

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
