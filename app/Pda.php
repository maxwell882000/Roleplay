<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pda extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'content'
    ];

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }
}
