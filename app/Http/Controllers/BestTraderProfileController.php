<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BestTraderProfile;

class BestTraderProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $traders = BestTraderProfile::all();

        return view('traders.index', compact('traders'));
    }


    public function indexApi()
    {
        $traders = BestTraderProfile::all();

        $data = [];
        foreach ($traders as $trader) {
            $data[] = [
                $trader->balance
            ];
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('traders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = null;
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'balance' => 'required|integer|min:0',
            ]
        );
        // Handle image upload
        if ($request->file('imgurl')) {
            $file = $request->file('imgurl');
            @unlink(public_path('upload/trader_images'));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/trader_images'), $filename);
        }
        // Create user data
        $data = $request->only([
            'name', 'balance'
        ]);

        if ($filename) {
            $data['imgurl'] = $filename;
        }

        BestTraderProfile::create($data);

        return redirect(route('traders.index'))
            ->with('success', 'trader profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     */
    public function show(string $id)
    {
        $trader = BestTraderProfile::findOrFail($id);

        return view('traders.show', compact('trader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     */
    public function edit(string $id)
    {
        $trader = BestTraderProfile::findOrFail($id);

        return view('traders.edite', compact('trader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $filename = null;
        $traders = BestTraderProfile::findOrFail($id);

        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'balance' => 'required|integer|min:0',
                'imgurl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );
        if ($request->hasFile('imgurl')) {
            $file = $request->file('imgurl');

            // Get the existing best trader profile
            $bestTraderProfile = $traders;

            // Get the existing image filename
            $oldImage = $bestTraderProfile->imgurl;

            // Delete the existing image file if it exists
            if ($oldImage && file_exists(public_path('upload/trader_images/' . $oldImage))) {
                @unlink(public_path('upload/trader_images/' . $oldImage));
            }

            // Generate a unique filename for the new image
            $filename = date('YmdHi') . $file->getClientOriginalName();

            // Move the uploaded file to the public storage
            $file->move(public_path('upload/trader_images'), $filename);

            // Update the 'imgurl' field with the new filename
            $bestTraderProfile->update(['imgurl' => $filename]);
        }
        // Create user data
        $data = $request->only([
            'name', 'balance', 'imgurl'
        ]);

        if ($filename) {
            $data['imgurl'] = $filename;
        }

        $traders->update($data);

        return redirect(route('traders.index'))
            ->with('success', 'trader profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $traders = BestTraderProfile::findOrFail($id);
        $traders->delete();

        return redirect(route('traders.index'))
            ->with('success', 'trader profile deleted successfully.');
    }
}
