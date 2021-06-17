<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userServices)
    {
        $this->userService = $userServices;
    }

    public function registerUser(Request $request): JsonResponse
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                $result['status'] = 400;
                $result['Message'] = $validator->errors();
            

            // Return harus setelah validasi bila tidak
            // maka akan melanjutkan kodingan dan meng Overwriter array result
            // Yang nantinya akan menjadi return
            return response()->json($result, 400);
        }

        $result = $this->userService->register($request);
        return response()->json($result, $result['status']);
        
    }

    public function loginUser(Request $request): JsonResponse
    {
        $validator = Validator::make(json_decode($request->getContent(), true), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $result['status'] = 400;
            $result['Message'] = $validator->errors();

            // Return harus setelah validasi bila tidak
            // maka akan melanjutkan kodingan dan meng Overwriter array result
            // Yang nantinya akan menjadi return
            return response()->json($result, 400);
        }
        // Get key with data value
        $credentials = $request->only('email', 'password');
        try {
            $result = ['status' => 200];
            $result['token'] = $this->userService->login($credentials);
            if ($result['token'] == false) {
                $result = ['status' => 401];
                $result['Message'] = 'Error user credentials not found !';
            }
        } catch (\Exception $exception) {
            $result = [
                'status' => 500,
                'error' => $exception->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function getUser(): JsonResponse
    {
        $user = auth('api')->user();
        return response()->json(['user' => $user], 201);
    }
}
