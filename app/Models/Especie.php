<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especie extends Model
{
    use HasFactory;
     use SoftDeletes;
    protected $guarded = array('id');

    public function familie()
    {
        return $this->belongsTo(Familie::class);
    }
    
    public function varietats()
    {
        return $this->hasMany(Varietat::class)->orderBy('name','asc');
    }
}
