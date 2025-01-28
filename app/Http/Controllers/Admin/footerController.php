<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\footer;
use App\Traits\image;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class footerController extends Controller
{
    use image;
 public function index(string $type){
    $title="footer index";
    $description="Footer description";
    $footer=footer::where('page',$type)->first();
    return view('admin.footer.index',compact('footer','title','description','type'));
 }
 public function create(string $type){
    $title="create footer";
    $description="create footer";
    return view('admin.footer.create',compact('title','description','type'));
 }
 public function store(Request $request,string $type){
    $request->validate(['title'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'photo'=>['required','image','file','mimes:png,jpg']]);
    $image=$this->saveimage($request,'photo');
    footer::create(['header'=>$request->title,'description'=>$request->description,'image'=>$image,'page'=>$type]);
    return redirect()->route('admin.footer',$type)->with('massage','تم اضافه فوتر بنجاح');
 }
 public function edit(Request $request,string $type){
    $title="footer edit";
    $description="Footer description";
    $footer=footer::where('page',$type)->first();
    if($footer){
        return view('admin.footer.edit',compact('footer','title','description','type'));
    }else{
        return redirect()->route('admin.footer',$type)->with('massage','لايوجد فوتر ');
    }
   
 }
 public function update(Request $request,string $type){
    $footer=footer::where('page',$type)->first();
    if($footer){
    $request->validate(['title'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'photo'=>['nullable','image','file','mimes:png,jpg']]);
    $image=$footer->image;
    if($request->hasFile('photo')){
    $image=$this->updateimage($request,'photo',$footer->image);
}
    $footer->update(['header'=>$request->title,'description'=>$request->description,'image'=>$image]);
    return redirect()->route('admin.footer',$type)->with('massage','تم تعديل الفوتر بنجاح');}
    else{
        return redirect()->route('admin.footer',$type)->with('massage','لايوجد فوتر ');
    }
 }
}
