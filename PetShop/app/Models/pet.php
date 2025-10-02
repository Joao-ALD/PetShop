<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    // use HasFactory;
    protected $fillable = ['name', 'age', 'breed_id', 'owner_id'];

    public function breed()
    {
        return $this->belongsTo(breed::class);
    }

    public function owner()    
    {
        return $this->belongsTo(owner::class);
    }
}
