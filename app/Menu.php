<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Link;

class Menu extends Model
{
    protected $fillable = ['name', 'css_class', 'css_id', 'description', 'region'];    
    protected $casts = [
        'parent_id' => 'int',
    ];
    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
