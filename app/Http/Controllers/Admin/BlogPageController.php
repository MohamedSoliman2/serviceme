<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blogPage;
use App\Traits\image;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    use image;
    public function index()
    {
        $blogs = blogPage::get();
        $title = "all blogs";
        $description = "all  blogs";
        return view('admin.blogpage.index', compact('blogs', 'title', 'description'));
    }

    public function create()
    {
        $title = "add blog";
        $description = "add  blog";
        return view('admin.blogpage.create', compact('title', 'description'));
    }
    public function store(Request $request)
    {
        $request->validate(['photo' => ['required','file','image','mimes:png,jpg'],'title'=>['required','string','min:3','max:200']]);
        $image=$this->saveimage($request,'photo');
        $all=array_merge($request->all(),['image'=>$image]);
        blogPage::create($all);
        return redirect()->route('admin.blog.page.index')->with('massage', 'تم انشاء المقاله بنجاح');
    }
    public function edit(string $id)
    {
        $blog = blogPage::where('id', $id)->first();
        if ($blog) {
            $title = "edit blog";
            $description = "edit  blog";
            return view('admin.blogpage.edit', compact('title', 'blog', 'description'));
        } else {
            return redirect()->route('admin.blog.page.index')->with('massage', 'هذه المقاله غير موجوده');
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['photo' => ['nullable','file','image','mimes:png,jpg'],'title'=>['required','string','min:3','max:200']]);
        $blog = blogPage::where('id', $id)->first();
        if ($blog) {
            if($request->hasFile('photo')){
$image=$this->updateimage($request,'photo',$blog->image);
            }else{
                $image=$blog->image;
            }
            $all=array_merge($request->all(),['image'=>$image]);
            $blog->update($all);
            return redirect()->route('admin.blog.page.index')->with('massage', 'تم تعديل المقاله بنجاح');
        } else {
            return redirect()->route('admin.blog.page.index')->with('massage', 'هذه المقاله غير موجوده');
        }
    }

  
}
