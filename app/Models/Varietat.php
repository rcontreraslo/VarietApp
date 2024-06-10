<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Varietat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = array('id');
    
    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
    public function mostres()
    {
        return $this->hasMany(Mostre::class)->orderBy('id','desc');
    }
    public function lots()
    {
        return $this->hasMany(Lot::class)->orderBy('id','desc');
    }
    public function persone()
    {
        return $this->belongsTo(Persone::class)->orderBy('perCognoms','asc');;
    }
}
