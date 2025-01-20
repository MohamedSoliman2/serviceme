<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about=About::get();
        $title="About page";
        $description="About page";
        return view('admin.about.index',compact('about','title','description'));
    }
    public function create(){
        $title="control About";
        $description="control About";
        return view('admin.about.create',compact('title','description'));
    }
    public function store(Request $request){
        $request->validate(['description'=>['required']]);
        About::create($request->all());
return redirect()->route('admin.about.index')->with('massage','تم انشاء صفحه عنا بنجاح');
    }
    public function edit(string $id){
$about=About::first();
if($about){
    $title="control About";
    $description="control About";
return view('admin.about.edit',compact('title','about','description'));
}else{
    return redirect()->route('admin.about.index')->with('massage','هذه الصفحه غير موجوده');
}
    }
    public function update(Request $request,string $id){
        $request->validate(['description'=>['required']]);
        $about=About::where('id',$id)->first();
        if($about){
        $about->update($request->all());
        return redirect()->route('admin.about.index')->with('massage','تم تعديل الصفحه بنجاح');
        }else{
            return redirect()->route('admin.about.index')->with('massage','هذه الصفحه غير موجوده');
        }
            }
            public function delete(string $id){
                
                $about=About::where('id',$id)->first();
                if($about){
                $about->delete();
                return redirect()->route('admin.about.index')->with('massage','تم حذف الصفحه بنجاح');
                }else{
                    return redirect()->route('admin.about.index')->with('massage','هذه الصفحه غير موجوده');
                }
                    }
                  
}
