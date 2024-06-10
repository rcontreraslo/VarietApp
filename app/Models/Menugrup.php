<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menugrup extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = array('id');
    
    public function menus()
    {
        return $this->hasMany(Menu::class)->where('active',1)->orderBy('order');;
    }
    
}
