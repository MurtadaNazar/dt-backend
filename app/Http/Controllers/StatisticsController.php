<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistics;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = Statistics::all();

        return view('statistics.index', compact('statistics'));
    }

    public function indexApi()
    {
        $statistics = Statistics::all();
        $lastStatistics = $statistics->last();
        $data = [
            [
                'title' => 'Monthly Withdrawal',
                'value' => $lastStatistics->monthlyWithDrawal,
            ],
            [
                'title' => 'Monthly IB Withdrawal',
                'value' => $lastStatistics->monthlyIbWithDrawal,
            ],
            [
                'title' => 'Monthly Trading Range',
                'value' => $lastStatistics->monthlyTradingRange,
            ],
            [
                'title' => 'Monthly Active Client',
                'value' => $lastStatistics->monthlyActiveClient,
            ],
        ];

        return response()->json($data);
    }

    public function create()
    {
        return view('statistics.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'monthlyWithDrawal' => 'required|integer',
            'monthlyIbWithDrawal' => 'required|integer',
            'monthlyTradingRange' => 'required|integer',
            'monthlyActiveClient' => 'required|integer',
        ]);

        Statistics::create($validatedData);

        return redirect()->route('statistics.index')->with('success', 'Statistics created successfully.');
    }

    public function show(Statistics $statistics)
    {
        return view('statistics.show', compact('statistics'));
    }

    public function edit(Statistics $statistics)
    {
        return view('statistics.edit', compact('statistics'));
    }

    public function update(Request $request, Statistics $statistics)
    {
        $validatedData = $request->validate([
            'monthlyWithDrawal' => 'required|integer',
            'monthlyIbWithDrawal' => 'required|integer',
            'monthlyTradingRange' => 'required|integer',
            'monthlyActiveClient' => 'required|integer',
        ]);

        $statistics->update($validatedData);

        return redirect()->route('statistics.index')->with('success', 'Statistics updated successfully.');
    }

    public function destroy(Statistics $statistics)
    {
        $statistics->delete();

        return redirect()->route('statistics.index')->with('success', 'Statistics deleted successfully.');
    }
}
