<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\footer;
use App\Models\footerBox;
use App\Models\Location;
use App\Models\locationHeader;
use App\Models\locationPost;
use App\Models\Service;
use App\Models\Testimonials;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class LocationController extends Controller
{use ResponseTrait;
    public function index(){
        $header=locationHeader::first();
        if($header){
            $header->image=url('/').'/../storage/app/public/'.$header->image;
        }
        $posts=locationPost::get();
        $testmonils=Testimonials::take(4)->get();
        foreach($testmonils as $test){
            $test->image=url('/').'/../storage/app/public/'.$test->image;
        }
        $services=Service::with('governorate')->take(4)->get();
        foreach($services as $service){
            $service->image=url('/').'/../storage/app/public/'.$service->image;
        }
        $footer=footer::where('page','location')->first();
        $footerBox=footerBox::where('page','location')->get();
        $faqs=Faq::take(4)->get();
        $data['header']=$header;
        $data['posts']=$posts;
        $data['testmonils']=$testmonils;
        $data['services']=$services;
        $data['faqs']=$faqs;
        $data['footer']=$footer;
        $data['footebox']=$footerBox;
        return $this->apiResponse(
            true,
            "blog fetched successfully",
            200,
            $data
        );


    }
}
