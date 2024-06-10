<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pack extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = array('id');
    
    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }
    public function varietat()
    {
        return $this->belongsTo(Varietat::class);
    }
}
