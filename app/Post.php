<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Bnb\Laravel\Attachments\HasAttachment;
use Lecturize\Taxonomies\Traits\HasTaxonomies;
class Post extends Model
{
    use HasAttachment;
    use HasTaxonomies;
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
