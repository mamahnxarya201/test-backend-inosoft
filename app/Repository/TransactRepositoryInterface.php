<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Transact;
use Illuminate\Http\Request;

interface TransactRepositoryInterface
{
    public function addTransact(Request $data): string|bool;
    public function getStok(String $id, String $kendaraan): ?int;
    public function getTransact(): mixed;
}
