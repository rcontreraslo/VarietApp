<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mostre extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = array('id');
    
    public function varietat()
    {
        return $this->belongsTo(Varietat::class);
    }
    public function multiplicador()
    {
        return $this->belongsTo(Multiplicador::class);
    }
    public function lots()
    {
        return $this->hasMany(Lot::class)->orderBy('id','desc');
    }
}
