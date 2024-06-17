<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familie extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = array('id');
    
    
    public function especies()
    {
        return $this->hasMany(Especie::class)->orderBy('name','asc');
    }
}
