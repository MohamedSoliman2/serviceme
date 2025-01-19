<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use App\Traits\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Yaml\Yaml;

class TestmonialController extends Controller
{
    use image;
public function index(){
   $testmonials=Testimonials::paginate(15);
   $title="all testmonials";
   $description="all testmonials";
   return view('admin.testmonial.index',compact('testmonials','title','description'));
}
public function create(){
    $title="add testmonials";
    $description="add testmonials";
    return view('admin.testmonial.create',compact('title','description'));
}
public function store(Request $request){
$request->validate(['name'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'rating'=>['required','numeric','min:1','max:5'],'photo'=>['required','image','file','mimes:png,jpg']]);
$image=$this->saveimage($request,'photo');
$all=array_merge($request->all(),['image'=>$image]);
Testimonials::create($all);
return redirect()->route('admin.testmonial.index')->with('massage','تم اضافه الرئي بنجاح');
}
public function edit(string $id){
    $testmonial=Testimonials::where('id',$id)->first();
    if($testmonial){
        $title="edit testmonial";
        $description="edit  testmonial";
    return view('admin.testmonial.edit',compact('title','testmonial','description'));
    }else{
        return redirect()->route('admin.blog.index')->with('massage','هذا الرئي غير موجوده');
    }
        }
        public function update(Request $request,string $id){
            $request->validate(['name'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'rating'=>['required','numeric','min:1','max:5'],'photo'=>['nullable','image','file','mimes:png,jpg']]);
            $testmonial=Testimonials::where('id',$id)->first();
    if($testmonial){    
        $all=$request->except('photo');
if($request->hasFile('photo')){
    $image=$this->updateimage($request,'photo',$testmonial->image);
    $all=array_merge($request->all(),['image'=>$image]);  
}
$testmonial->update($all);
return redirect()->route('admin.testmonial.index')->with('massage','تم تعديل الرئي بنجاح');
    }else{
        return redirect()->route('admin.testmonial.index')->with('massage','هذا الرئي غير موجوده');
    }
                }
                public function delete(string $id){
                    
                    $testmonial=Testimonials::where('id',$id)->first();
                    if($testmonial){
                    $testmonial->delete();
                    return redirect()->route('admin.testmonial.index')->with('massage','تم حذف الرئي بنجاح');
                    }else{
                        return redirect()->route('admin.testmonial.index')->with('massage','هذه الرئي غير موجوده');
                    }
                        }
}
