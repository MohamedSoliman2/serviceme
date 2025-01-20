<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Traits\image;
use Illuminate\Http\Request;

class HomePostsController extends Controller
{
    use image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Home::orderBy('id','desc')->paginate(20);
        return view('admin.home-posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $this->saveImage($request, 'home-posts');
        Home::create($data);
        return redirect()->route('home-posts.index')->with('success', 'تم اضافه المنشور بنجاح');
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
        $post = Home::find($id);
        return view('admin.home-posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'nullable|image',
        ]);

        $post=Home::find($id);

        if($request->hasFile('image')){
            $path=$this->updateimage($request,'image',$post->image);
        }

        $post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$path ?? $post->image,
        ]);
        return redirect()->route('home-posts.index')->with('success','تم تعديل المنشور بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Home::findOrFail($id);
        if ($post->image) {
            $this->deleteImage($post->image);
        }
        $post->delete();
        return redirect()->route('home-posts.index')->with('success', 'تم حذف المنشور بنجاح');
    }
}
