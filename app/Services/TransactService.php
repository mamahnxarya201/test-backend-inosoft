<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\TransactRepository;
use Illuminate\Http\Request;

class TransactService
{
    protected TransactRepository $transactRepository;

    public function __construct(TransactRepository $transactRepository)
    {
        $this->transactRepository = $transactRepository;
    }

    public function beli(Request $data): string|bool
    {
        foreach ($data->json('item') as $key => $part) {
            $stokTersedia = $this->transactRepository->getStok($part['id'], $part['kendaraan']);
            if ($stokTersedia == null) {
                return $result = "Kendaraan tidak ditemukan !";
            } else if($stokTersedia >= $part['jumlah']) {
                $result = $this->transactRepository->addTransact($data);
                return $result;
            }else {
                return $result = "Stok tidak mencukupi !";
            }
        }
        
    }

    public function report(): mixed
    {
    	return $this->transactRepository->getTransact();
    }
}
