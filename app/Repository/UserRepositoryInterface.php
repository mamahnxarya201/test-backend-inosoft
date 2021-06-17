<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function createUser(Request $data): array;
    public function getUser(): User;
    public function authenticateUser(array $credentials): string|bool;
}
