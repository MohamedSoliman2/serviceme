<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TermsResource;
use App\Models\TermsAndConditions;
use App\Traits\ResponseTrait;

class TermsController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $terms = TermsAndConditions::first();

        if (!$terms) {
            return $this->apiResponse(false, "Terms and conditions not found", 404);
        }

        return $this->apiResponse(
            true,
            "Terms and conditions fetched successfully",
            200,
            new TermsResource($terms)
        );
    }
}
