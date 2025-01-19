<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePost;
use App\Traits\image;
use Illuminate\Http\Request;

class ServicePostController extends Controller
{
    use image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicePosts=ServicePost::paginate(20);

        return view('admin.service-post.index',compact('servicePosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services=Service::all();
        return view('admin.service-post.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'service_id' => 'required|exists:services,id',
        ]);
        $data=$request->all();
        $data['image']=$this->saveimage($request,'image');
        ServicePost::create($data);
        return redirect()->route('service-posts.index')->with('success','تم إضافة المنشور بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicePost $servicePost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicePost $servicePost)
    {
        $services=Service::all();
        return view('admin.service-post.edit',compact('servicePost','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicePost $servicePost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'service_id' => 'required|exists:services,id',
        ]);
        $data=$request->all();
        $data['image']=$this->updateimage($request,'image',$servicePost->image);
        $servicePost->update($data);
        return redirect()->route('service-posts.index')->with('success','تم تعديل المنشور بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicePost $servicePost)
    {
        $servicePost->delete();
        if($servicePost->image){
            $this->deleteimage($servicePost->image);
        }
        return redirect()->route('service-posts.index')->with('success','تم حذف المنشور بنجاح');
    }
}
