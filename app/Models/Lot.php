<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = array('id');
    
    public function varietat()
    {
        return $this->belongsTo(Varietat::class);
    }
    public function mostre()
    {
        return $this->belongsTo(Mostre::class);
    }
    public function packs()
    {
        return $this->hasMany(Pack::class);
    }
}
