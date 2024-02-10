<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Assuming you want to retrieve all settings
        $settings = Setting::all();

        return view('settings.index', compact('settings'));
    }

    public function indexApi()
    {
        $settings = Setting::all();

        $data = [];
        foreach ($settings as $setting) {
            $data[] = [
                'id' => $setting->id,
                'despositBonus' => $setting->despositBonus,
                'addImageUrl' => $setting->addImageUrl,
                'officesImageUrl' => $setting->officesImageUrl,
            ];
        }

        return response()->json($data);
    }

    // return only last despositBonus 
    public function lastDespositBonus()
    {
        $settings = Setting::all();
        $lastDespositBonus = $settings->last()->despositBonus;

        return response()->json($lastDespositBonus);
    }

    // return only last addImageUrl
    public function lastAddImageUrl()
    {
        $settings = Setting::all();
        $lastAddImageUrl = $settings->last()->addImageUrl;

        return response()->json($lastAddImageUrl);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $addImageUrl = null;
        $officesImageUrl = null;

        $this->validate($request, [
            'despositBonus' => 'required|integer',
        ]);

        if ($request->file('addImageUrl')) {
            $file = $request->file('addImageUrl');
            @unlink(public_path('upload/settings/addImageUrl'));
            $addImageUrl = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/settings/addImageUrl'), $addImageUrl);
        }
        if ($request->file('officesImageUrl')) {
            $file = $request->file('officesImageUrl');
            @unlink(public_path('upload/settings/officesImageUrl'));
            $officesImageUrl = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/settings/officesImageUrl'), $officesImageUrl);
        }

        $data = $request->only([
            'despositBonus'
        ]);
        if ($addImageUrl) {
            $data['addImageUrl'] = $addImageUrl;
        }
        if ($officesImageUrl) {
            $data['officesImageUrl'] = $officesImageUrl;
        }

        Setting::create($data);

        return redirect()->route('settings.index')->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $setting = Setting::findOrFail($id);

        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::findOrFail($id);

        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $addImageUrl = null;
        $officesImageUrl = null;
        $setting = Setting::findOrFail($id);
        $this->validate(
            $request,
            [
                'despositBonus' => 'required|integer',
                'addImageUrl' => 'nullable|url',
                'officesImageUrl' => 'nullable|url',
            ]
        );

        if ($request->hasFile('addImageUrl')) {
            $file = $request->file('addImageUrl');
            $set = $setting;
            $old_addImageUrl = $set->addImageUrl;
            if ($old_addImageUrl && file_exists(public_path('upload/settings/addImageUrl/' . $old_addImageUrl))) {
                @unlink(public_path('upload/settings/addImageUrl/' . $old_addImageUrl));
            }
            $addImageUrl = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/settings/addImageUrl'), $addImageUrl);
            $setting->update(['addImageUrl' => $addImageUrl]);
        }


        if ($request->hasFile('officesImageUrl')) {
            $file = $request->file('officesImageUrl');
            $set = $setting;
            $old_officesImageUrl = $set->officesImageUrl;
            if ($old_officesImageUrl && file_exists(public_path('upload/settings/officesImageUrl/' . $old_officesImageUrl))) {
                @unlink(public_path('upload/settings/officesImageUrl/' . $old_officesImageUrl));
            }
            $officesImageUrl = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/settings/officesImageUrl'), $officesImageUrl);
            $setting->update(['officesImageUrl' => $officesImageUrl]);
        }

        if ($addImageUrl) {
            $data['addImageUrl'] = $addImageUrl;
        }
        if ($officesImageUrl) {
            $data['officesImageUrl'] = $officesImageUrl;
        }

        $data = $request->only([
            'name', 'text', 'avater_url', 'starts', 'date'
        ]);
        $setting->update($data);

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully.');
    }
}
