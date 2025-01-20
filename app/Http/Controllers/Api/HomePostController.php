<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomePostResource;
use App\Models\Home;
use App\Traits\ResponseTrait;

class HomePostController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $posts = Home::latest()->get();

        if ($posts->isEmpty()) {
            return $this->apiResponse(false, "No home posts found", 200);
        }

        return $this->apiResponse(
            true,
            "Home posts fetched successfully",
            200,
            HomePostResource::collection($posts)
        );
    }
}
