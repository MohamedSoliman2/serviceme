<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use App\Traits\ResponseTrait;

class FaqController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $faqs = Faq::latest()->get();

        if ($faqs->isEmpty()) {
            return $this->apiResponse(false, "No FAQs found", 200);
        }

        return $this->apiResponse(
            true,
            "FAQs fetched successfully",
            200,
            FaqResource::collection($faqs)
        );
    }
}
