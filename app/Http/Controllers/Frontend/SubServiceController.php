<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Traits\image;

class SubServiceController extends Controller
{
    use image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subservices = Service::whereNotNull('parent_id')->with('parent')->paginate(20);

        return view('admin.sub-services.index', compact('subservices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::whereNull('parent_id')->get();
        return view('admin.sub-services.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_id' => 'required',
            'image' => 'required',
        ]);

        $path = $this->saveImage($request, 'image');

        $subservice = new Service();
        $subservice->name = $request->name;
        $subservice->description = $request->description;
        $subservice->parent_id = $request->parent_id;
        $subservice->image = $path;
        $subservice->save();

        return redirect()->route('sub-services.index')->with('success', 'تم اضافة الخدمه الفرعية بنجاح');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $subservice = Service::find($id);
        $services = Service::whereNull('parent_id')->get();
        return view('admin.sub-services.edit', compact('subservice', 'services'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_id' => 'required',
            'image' => 'required',
        ]);

        $subservice = Service::find($id);

        if ($request->hasFile('image')) {
            $path = $this->updateimage($request, 'image', $subservice->image);
        }

        $subservice->update([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'image' => $path ?? $subservice->image,
        ]);

        return redirect()->route('sub-services.index')->with('success', 'تم تعديل الخدمه الفرعية بنجاح');
    }


    public function destroy(string $id)
    {
        $subservice = Service::find($id);
        $this->deleteImage($subservice->image);
        $subservice->delete();
        return redirect()->route('sub-services.index')->with('success', 'تم حذف الخدمه الفرعية بنجاح');
    }
}
