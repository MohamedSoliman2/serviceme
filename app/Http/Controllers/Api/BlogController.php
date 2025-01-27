<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\blogPage;
use App\Models\footer;
use App\Models\footerBox;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ResponseTrait;
    public function index(){
        $blogs=Blog::get();
        $blogheader=blogPage::first();
        $blogheader->image=url('/').'/storage/app/public/'.$blogheader->image;
        $footer=footer::where('page','blog')->first();
        $footerBox=footerBox::where('page','blog')->get();

        $data['blogheader']=$blogheader;
        $data['blogs']=$blogs;
        $data['footer']=$footer;
        $data['footerBox']=$footerBox;
        return $this->apiResponse(
            true,
            "blog fetched successfully",
            200,
            $data
        );
    }
}
