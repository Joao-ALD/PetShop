<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class breed extends Model
{
    // use HasFactory;
    protected $fillable = ['breed', 'specie_id', 'description'];

    public function specie()
    {
        return $this->belongsTo(specie::class);
    }
}