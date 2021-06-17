<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $data): string|bool
    {
//        $validator = Validator::make($data, [
//            'email' => 'required',
//            'description' => 'required'
//        ]);
//
//        if($validator->fails()){
//            throw new InvalidArgumentException($validator->errors()->first());
//        }

        $result = $this->userRepository->authenticateUser($data);

        return $result;
    }

    public function register(Request $data): array
    {
        return $this->userRepository->createUser($data);
    }
}
