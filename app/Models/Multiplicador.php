<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Multiplicador extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = array('id');
    
    public function municipi()
    {
        return $this->belongsTo(Municipi::class);
    }
    public function mostres()
    {
        return $this->hasMany(Mostre::class)->orderBy('id','desc');
    }
}
