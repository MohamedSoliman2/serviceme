<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index(){
        $term=Term::get();
        $title="terms page";
        $description="terms page";
        return view('admin.terms.index',compact('term','title','description'));
    }
    public function create(){
        $title="control About";
        $description="control About";
        return view('admin.terms.create',compact('title','description'));
    }
    public function store(Request $request){
        $request->validate(['description'=>['required']]);
        Term::create($request->all());
return redirect()->route('admin.terms.index')->with('massage','تم انشاء صفحه عنا بنجاح');
    }
    public function edit(string $id){
$term=Term::first();
if($term){
    $title="control terms";
    $description="control terms";
return view('admin.terms.edit',compact('title','term','description'));
}else{
    return redirect()->route('admin.terms.index')->with('massage','هذه الصفحه غير موجوده');
}
    }
    public function update(Request $request,string $id){
        $request->validate(['description'=>['required']]);
        $terms=Term::where('id',$id)->first();
        if($terms){
        $terms->update($request->all());
        return redirect()->route('admin.terms.index')->with('massage','تم تعديل الصفحه بنجاح');
        }else{
            return redirect()->route('admin.terms.index')->with('massage','هذه الصفحه غير موجوده');
        }
            }
            public function delete(string $id){
                
                $terms=Term::where('id',$id)->first();
                if($terms){
                $terms->delete();
                return redirect()->route('admin.terms.index')->with('massage','تم حذف الصفحه بنجاح');
                }else{
                    return redirect()->route('admin.terms.index')->with('massage','هذه الصفحه غير موجوده');
                }
                    }
}
