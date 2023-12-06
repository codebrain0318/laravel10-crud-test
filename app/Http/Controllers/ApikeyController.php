<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use Illuminate\Support\Facades\Auth;

class ApikeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apikeys = ApiKey::all();
        return view('dashboard', compact('apikeys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userid = Auth::id();
        $request->validate([
            'apikey' => 'required',
        ]);
        ApiKey::create([
            'userid' => $userid,
            'apikey' => $request->apikey,
        ]);
        return redirect()->route('apikeys.index')
        ->with('success','API Key created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $apikey = Apikey::find($id);
        return view('editkey', compact('apikey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $request->validate([
            'apikey' => 'required',
        ]);
        $apikey = Apikey::find($id);
        $apikey->update([
            'apikey' => $request->apikey,
        ]);

        return redirect()->route('apikeys.index')
            ->with('success', 'API Key updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apikey = Apikey::find($id);
        $apikey->delete();

        return redirect()->route('apikeys.index')
            ->with('success', 'API Key deleted successfully');
    }
}
