<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $startDate = $request->input('start_date', now()->subDays(6)->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));

        // 1. Ambil data untuk tabel (tanpa grouping)
        $visitors = Visitor::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->latest()
            ->take(10)
            ->get();

        // 2. Ambil data untuk chart (query terpisah agar tidak konflik)
        $chartData = Visitor::selectRaw('DATE(created_at) as date, count(*) as count')
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $labels = $chartData->pluck('date');
        $dataPoints = $chartData->pluck('count');

        return view('admin.dashboard', compact('user', 'visitors', 'labels', 'dataPoints', 'startDate', 'endDate'));
    }
}