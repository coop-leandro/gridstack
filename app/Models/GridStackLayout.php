<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GridStackLayout extends Model
{
    protected $fillable = ['guest_id', 'layout'];

    protected $casts = [
        'layout' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
