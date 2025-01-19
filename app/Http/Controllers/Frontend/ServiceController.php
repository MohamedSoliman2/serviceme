<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Governorate;
use App\Traits\image;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=Service::whereNull('parent_id')->paginate(20);
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates=Governorate::all();

        return view('admin.services.create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'required|image',
            'governorate_id'=>'required|exists:governorates,id',
        ]);

        $path = $this->saveimage($request, 'image');

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'governorate_id' => $request->governorate_id,
            'image' => $path
        ]);

        return redirect()->route('services.index')->with('success', 'تم إضافة الخدمة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service=Service::find($id);
        $governorates=Governorate::all();
        return view('admin.services.edit',compact('service','governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'nullable|image',
            'governorate_id'=>'required|exists:governorates,id',
        ]);
        $service=Service::find($id);

        if($request->hasFile('image')){
            $path=$this->updateimage($request,'image',$service->image);
        }

        $service->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'governorate_id'=>$request->governorate_id,
            'image'=>$path ?? $service->image,
        ]);
        return redirect()->route('services.index')->with('success','تم تعديل الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service=Service::find($id);
        $this->deleteimage($service->image);
        $service->delete();
        return redirect()->route('services.index')->with('success','تم حذف الخدمة بنجاح');
    }
}
