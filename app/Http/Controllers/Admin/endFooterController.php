<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\footerBox;
use App\Traits\image;
use Illuminate\Http\Request;

class endFooterController extends Controller
{
    use image;
 public function index(){
    $title="footer index";
    $description="Footer description";
    $footers=footerBox::paginate(20);
    return view('admin.endfooter.index',compact('footers','title','description'));
 }
 public function create(){
    $title="create footer";
    $description="create footer";
    return view('admin.endfooter.create',compact('title','description'));
 }
 public function store(Request $request){
    $request->validate(['title'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'photo'=>['required','image','file','mimes:png,jpg'],'phone'=>['required','numeric'],'link'=>['required','url','active_url']]);
    $image=$this->saveimage($request,'photo');
    footerBox::create(['name'=>$request->title,'desciption'=>$request->description,'image'=>$image,'page'=>$request->page,'phone'=>$request->phone,'link'=>$request->link]);
    return redirect()->route('end.admin.footer')->with('massage','تم اضافه فوتر بنجاح');
 }
 public function edit(string $id){
    $title="footer edit";
    $description="Footer description";
    $footer=footerBox::where('id',$id)->first();
    if($footer){
        return view('admin.endfooter.edit',compact('footer','title','description'));
    }else{
        return redirect()->route('end.admin.footer')->with('massage','لايوجد فوتر ');
    }
   
 }
 public function update(Request $request,string $id){
    $footer=footerBox::where('id',$id)->first();
    if($footer){
        $request->validate(['title'=>['required','string','min:5','max:40'],'description'=>['required','string','min:5','max:240'],'photo'=>['nullable','image','file','mimes:png,jpg'],'phone'=>['required','numeric'],'link'=>['required','url','active_url']]);
    $image=$footer->image;
    if($request->hasFile('photo')){
    $image=$this->updateimage($request,'photo',$footer->image);
    }
    $footer->update(['name'=>$request->title,'desciption'=>$request->description,'image'=>$image,'page'=>$request->page,'phone'=>$request->phone,'link'=>$request->link]);
    return redirect()->route('end.admin.footer')->with('massage','تم تعديل الفوتر بنجاح');}
    else{
        return redirect()->route('end.admin.footer')->with('massage','لايوجد فوتر ');
    }
 }
 public function delete(string $id){
    $footer=footerBox::where('id',$id)->first();
    if($footer){
        $this->deleteimage($footer->image);
$footer->delete();
return redirect()->route('end.admin.footer')->with('massage','تم حذف الفوتر بنجاح');
    }else{
        return redirect()->route('end.admin.footer')->with('massage','لايوجد فوتر ');
    }
 }
}
