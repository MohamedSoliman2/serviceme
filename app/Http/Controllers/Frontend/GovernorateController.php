<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governorates = Governorate::paginate(20);
        return view('admin.governorates.index', compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:governorates,name',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);

        Governorate::create($request->all());
        return redirect()->route('governorates.index')->with('success', 'تم إضافة المحافظه بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $governorate = Governorate::findOrFail($id);
        return view('admin.governorates.edit', compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:governorates,name,' . $id,
        ]);

        $governorate = Governorate::findOrFail($id);
        $governorate->update($request->all());
        return redirect()->route('governorates.index')->with('success', 'تم تعديل المحافظه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $governorate = Governorate::findOrFail($id);
        $governorate->delete();
        return redirect()->route('governorates.index')->with('success', 'تم حذف المحافظه بنجاح');
    }
}
