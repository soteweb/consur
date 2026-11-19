<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\Lead;
use App\Models\Setting;
use App\Models\Vehicle;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        $totalVehicles = Vehicle::count();
        $availableVehicles = Vehicle::available()->count();
        $newVehiclesCount = Vehicle::available()->newVehicles()->count();
        $usedVehiclesCount = Vehicle::available()->usedVehicles()->count();
        $totalInventoryValueUsd = Vehicle::available()->sum('price_usd');

        $totalLeads = Lead::count();
        $newLeadsCount = Lead::where('status', 'nuevo')->count();
        $leadsTodayCount = Lead::whereDate('created_at', today())->count();

        $recentLeads = Lead::with('vehicle')->latest()->take(5)->get();
        $recentVehicles = Vehicle::with(['brand', 'category'])->latest()->take(5)->get();
        $recentLogs = ActivityLog::with('user')->latest()->take(6)->get();

        return view('livewire.admin.dashboard', compact(
            'totalVehicles',
            'availableVehicles',
            'newVehiclesCount',
            'usedVehiclesCount',
            'totalInventoryValueUsd',
            'totalLeads',
            'newLeadsCount',
            'leadsTodayCount',
            'recentLeads',
            'recentVehicles',
            'recentLogs'
        ));
    }
}
