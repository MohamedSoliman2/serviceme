<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::paginate(15);
        $title="all blogs";
        $description="all  blogs";
        return view('admin.blog.index',compact('blogs','title','description'));
    }
    public function create(){
        $title="add blog";
        $description="add  blog";
        return view('admin.blog.create',compact('title','description'));
    }
    public function store(Request $request){
        $request->validate(['title'=>['required','min:3','max:200'],'description'=>['required']]);
        Blog::create($request->all());
return redirect()->route('admin.blog.index')->with('massage','تم انشاء المقاله بنجاح');
    }
    public function edit(string $id){
$blog=Blog::where('id',$id)->first();
if($blog){
    $title="edit blog";
    $description="edit  blog";
return view('admin.blog.edit',compact('title','blog','description'));
}else{
    return redirect()->route('admin.blog.index')->with('massage','هذه المقاله غير موجوده');
}
    }
    public function update(Request $request,string $id){
        $request->validate(['title'=>['required','min:3','max:200'],'description'=>['required']]);
        $blog=Blog::where('id',$id)->first();
        if($blog){
        $blog->update($request->all());
        return redirect()->route('admin.blog.index')->with('massage','تم تعديل المقاله بنجاح');
        }else{
            return redirect()->route('admin.blog.index')->with('massage','هذه المقاله غير موجوده');
        }
            }
            public function delete(string $id){
                
                $blog=Blog::where('id',$id)->first();
                if($blog){
                $blog->delete();
                return redirect()->route('admin.blog.index')->with('massage','تم حذف المقاله بنجاح');
                }else{
                    return redirect()->route('admin.blog.index')->with('massage','هذه المقاله غير موجوده');
                }
                    }
                    public function upload(Request $request ){
                        if($request->hasFile('upload')){
                            $originname=$request->file('upload')->getClientOriginalName();
                            $filename=pathinfo($originname,PATHINFO_FILENAME);
                            $extension=$request->file('upload')->getClientOriginalExtension();
                            $filename=$filename.'_'.time(). '.'.$extension;
                            $request->file('upload')->move('media',$filename);
                            //$url=asset('media/'.$filename);
                            $url=url('/').'/media/'.$filename;
                            return response()->json(['fileName'=>$filename,'uploaded'=>1,'url'=>$url]);
                        }
                            }
                        
}
