<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Transact;
use App\Repository\TransactRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mobil;

class TransactRepository implements TransactRepositoryInterface
{
    protected $mobil;
    protected $transact;


    public function __construct(Mobil $mobil, Transact $transact)
    {
        $this->mobil = $mobil;
        $this->transact = $transact;
    }

    public function addTransact(Request $data): string|bool
    {
        try {
            foreach ($data->json('item') as $key => $part) {
                
                DB::collection($part['kendaraan'])
                ->where('_id', $part['id'])
                ->decrement('stok', $part['jumlah']);
            }

            $payload = $this->setDataPayload($data);
            $transact = $this->transact;
            $transact->fill($payload);

            $transact->save();
            $result = "Transaksi Berhasil !";
        } catch (\Exception $exception) {
            $result = $exception->getMessage();
        }

        return $result; 
    }

    public function getStok(string $id, string $kendaraan): ?int
    {
        $query = DB::collection($kendaraan)
        ->where('_id', $id)
        ->value('stok');
        return $query;
    }

    public function getTransact(): mixed
    {
    	return $this->transact->get();
    }

    protected function setDataPayload(Request $request)
    {
        return $request->all();
    }
}
