<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicePostResource;
use App\Http\Resources\ServiceResource;
use App\Models\Governorate;
use App\Models\Service;
use App\Models\ServicePost;
use App\Traits\ResponseTrait;


class ServiceController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $services = Service::whereNull('parent_id')->with('subServices')->get();

        if ($services->isEmpty()) {
            return $this->apiResponse(false, "No services found", 200);
        }

        return $this->apiResponse(true, "Services fetched successfully", 200, ServiceResource::collection($services));
    }

    public function getServiceByGovernorateName($governorateName)
    {
        $services = Governorate::where('name', $governorateName)->first()->services;

        if ($services->isEmpty()) {
            return $this->apiResponse(false, "No services found", 200);
        }

        return $this->apiResponse(true, "Services fetched successfully", 200, ServiceResource::collection($services));
    }

    public function getSubServices($serviceId)
    {
        $subServices = Service::where('parent_id', $serviceId)->get();

        if ($subServices->isEmpty()) {
            return $this->apiResponse(false, "No sub services found", 200);
        }
        return $this->apiResponse(true, "Sub services fetched successfully", 200, ServiceResource::collection($subServices));
    }

    public function getServicePosts($serviceName)
    {
        $service = Service::where('name', $serviceName)->first();
        $servicePosts = $service->servicePosts;

        if ($servicePosts->isEmpty()) {
            return $this->apiResponse(false, "No service posts found", 200);
        }
        return $this->apiResponse(true, "Service posts fetched successfully", 200, ServicePostResource::collection($servicePosts));
    }
}
