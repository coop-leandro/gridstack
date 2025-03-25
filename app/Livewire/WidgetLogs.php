<?php

namespace App\Livewire;

use App\Models\WidgetLog;
use Livewire\Component;

class WidgetLogs extends Component
{
    public function render()
    {
        $logs = WidgetLog::orderBy('usage_count', 'desc')->get();
        return view('livewire.widget-logs', compact('logs'));
    }
}
