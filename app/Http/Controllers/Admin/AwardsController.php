<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\awards;
use App\Traits\image;
use Illuminate\Http\Request;

class AwardsController extends Controller
{
    use image;
    public function index(){
       $awards=awards::paginate(15);
       $title="all awards";
       $description="all awards";
       return view('admin.awards.index',compact('awards','title','description'));
    }
    public function create(){
        $title="add award";
        $description="add award";
        return view('admin.awards.create',compact('title','description'));
    }
    public function store(Request $request){
    $request->validate(['title'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'photo'=>['required','image','file','mimes:png,jpg']]);
    $image=$this->saveimage($request,'photo');
    $all=array_merge($request->all(),['image'=>$image]);
    awards::create($all);
    return redirect()->route('admin.awards.index')->with('massage','تم اضافه الجائزه بنجاح');
    }
    public function edit(string $id){
        $awards=awards::where('id',$id)->first();
        if($awards){
            $title="edit award";
            $description="edit  award";
        return view('admin.awards.edit',compact('title','awards','description'));
        }else{
            return redirect()->route('admin.blog.index')->with('massage','هذا الرئي غير موجوده');
        }
            }
            public function update(Request $request,string $id){
                $request->validate(['title'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'photo'=>['nullable','image','file','mimes:png,jpg']]);
                $award=awards::where('id',$id)->first();
        if($award){    
            $all=$request->except('photo');
    if($request->hasFile('photo')){
        $image=$this->updateimage($request,'photo',$award->image);
        $all=array_merge($request->all(),['image'=>$image]);  
    }
    $award->update($all);
    return redirect()->route('admin.awards.index')->with('massage','تم تعديل الجائزه بنجاح');
        }else{
            return redirect()->route('admin.awards.index')->with('massage','هذه الجائزه غير موجوده');
        }
                    }
                    public function delete(string $id){
                        
                        $award=awards::where('id',$id)->first();
                        if($award){
                        $award->delete();
                        return redirect()->route('admin.awards.index')->with('massage','تم حذف الجائزه بنجاح');
                        }else{
                            return redirect()->route('admin.awards.index')->with('massage','هذه الجائزه غير موجوده');
                        }
                            }
    
}
