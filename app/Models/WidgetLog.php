<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WidgetLog extends Model
{
    use HasFactory;

    protected $fillable = ['widget_index', 'usage_count'];

    public static function logUsage($widgetIndex)
    {
        self::updateOrCreate(
            ['widget_index' => $widgetIndex],
            ['usage_count' => DB::raw('usage_count + 1')] 
        );
    }
}
