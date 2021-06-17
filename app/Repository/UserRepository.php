<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createUser(Request $data): array
    {
        try {
            
            $user = new User([
                'name' => $data->json('name'),
                'email' => $data->json('email'),
                'password' => bcrypt($data->json('password'))
            ]);
            
            $user->save();

            $result['message'] = "User berhasil dibuat !";
            $result['status'] = 200;

        } catch (\Exception $exception) {
            $result['message'] = $exception->getMessage();
            $result['status'] = 500;
        }


        return $result;
    }

    public function getUser(): User
    {
        return $this->User->get();
    }

    public function authenticateUser(array $credentials): string|bool
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return false;
            }
        } catch (JWTException $e) {
            return false;
        }

        return $token;
    }
}
