<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\footer;
use App\Models\footerBox;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use ResponseTrait;
    public function index(){
        $about=About::get();
        $footer=footer::where('page','about')->first();
        $footerBox=footerBox::where('page','about')->get();
        $data['about']=$about;
        $data['footer']=$footer;
        $data['footerbox']=$footerBox;
        return $this->apiResponse(
            true,
            "about page fetched successfully",
            200,
            $data
        );
    }
}
