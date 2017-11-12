<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class Link extends Model
{
    protected $fillable = ['name', 'css_class', 'css_id', 'url', 'weight'];    
    protected $casts = [
        'menu_id' => 'int',
    ];
    public function menu() {
        return $this->belongTo(Menu::class);
    }
}
