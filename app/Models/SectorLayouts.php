<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorLayouts extends Model
{
    use HasFactory;

    protected $fillable = ['sector_id', 'layout'];

    protected $casts = [
        'layout' => 'array',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
