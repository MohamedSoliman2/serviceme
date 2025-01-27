<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\locationHeader;
use App\Models\locationPost;
use App\Traits\image;
use Illuminate\Http\Request;

class locationPageController extends Controller
{
    use image;
   public function index(){
    $post=locationHeader::first();
    return view('admin.location.index',compact('post'));
   }
   public function edit(){
    $post=locationHeader::first();
    if($post){
    return view('admin.location.edit',compact('post'));
}else{
     return redirect()->route('home');
}
 
   }
   public function update(Request $request,){
    $request->validate([
        'title'=>'required|string|max:255',
        'description'=>'required|string',
        'image'=>'nullable|image',
    ]);

    $post=locationHeader::first();

    if($request->hasFile('image')){
        $path=$this->updateimage($request,'image',$post->image);
    }

    $post->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$path ?? $post->image,
    ]);
    return redirect()->route('admin.locationheader.index')->with('success','تم تعديل المنشور بنجاح');
   }


   public function indexDescription()
   {
       $blogs = locationPost::paginate(15);
       $title = "all location posts";
       $description = "all  location posts";
       return view('admin.description.index', compact('blogs', 'title', 'description'));
   }

   public function createDescription()
   {
       $title = "add location post";
       $description = "add  location post";
       return view('admin.description.create', compact('title', 'description'));
   }
   public function storeDescription(Request $request)
   {
       $request->validate(['description' => ['required'],'header'=>['required','string','min:3','max:250']]);
       locationPost::create($request->all());
       return redirect()->route('admin.location.description.index')->with('massage', 'تم انشاء المنشور بنجاح');
   }
   public function editDescription(string $id)
   {
       $blog = locationPost::where('id', $id)->first();
       if ($blog) {
           $title = "edit location post";
           $description = "edit  location post";
           return view('admin.description.edit', compact('title', 'blog', 'description'));
       } else {
           return redirect()->route('admin.location.description.index')->with('massage', 'هذا المنشور غير موجوده');
       }
   }

   public function updateDescription(Request $request, string $id)
   {
       $request->validate([ 'description' => ['required']]);
       $blog = locationPost::where('id', $id)->first();
       if ($blog) {
           $blog->update($request->all());
           return redirect()->route('admin.location.description.index')->with('massage', 'تم تعديل المنشور بنجاح');
       } else {
           return redirect()->route('admin.location.description.index')->with('massage', 'هذا المنشور غير موجوده');
       }
   }

   public function deleteDescription(string $id)
   {

       $blog = locationPost::where('id', $id)->first();
       if ($blog) {
           $blog->delete();
           return redirect()->route('admin.location.description.index')->with('massage', 'تم حذف المقاله بنجاح');
       } else {
           return redirect()->route('admin.location.description.index')->with('massage', 'هذه المقاله غير موجوده');
       }
   }

}
