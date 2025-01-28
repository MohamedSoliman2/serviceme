<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class GovernoratesController extends Controller
{
    use ResponseTrait;
    public function index()
    {
        $governorates = Governorate::all();
        if ($governorates->isEmpty()) {
            return $this->returnErrorMessage('No governorates found', 404);
        }
        return $this->returnSuccess('Governorates fetched successfully', 200, $governorates);
    }
}
