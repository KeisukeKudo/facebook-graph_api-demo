<?php

namespace App\Http\Controllers\API\GraphAPI;

use App\Http\Controllers\Controller;
use Crypto\API\Facebook\GraphAPI\MyProfileUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(MyProfileUseCase $useCase): JsonResponse
    {
        $response = $useCase->get();
        // TODO view model
        return response()->json($response);
    }
}
