<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\TransactService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TransactController extends Controller
{
    protected TransactService $transactService;

    public function __construct(TransactService $transactService)
    {
        $this->transactService = $transactService;
    }

    public function addTransact(Request $request): JsonResponse
    {
        $validator = Validator::make(json_decode($request->getContent(), true), [
           'nama' => 'required',
           'harga' => 'required|integer',
           'alamat' => 'required',
           'item' => 'required|array',
           'item.*.id' => 'required|string',
           'item.*.kendaraan' => 'required|string', Rule::in(['mobils', 'motors']),
           'item.*.jumlah' => 'required|int',
        ]);

        if ($validator->passes()) {
            try {
                $result['status'] = 200;
                $result['Message'] =  $this->transactService->beli($request);
            } catch (\Exception $exception) {
                $result = [
                    'status' => 500,
                    'error' => $exception->getMessage()
                ];
            }
        } else {
            $result['status'] = 400;
            $result['Message'] = $validator->errors();

            // Return harus setelah validasi bila tidak
            // maka akan melanjutkan kodingan dan meng Overwriter array result
            // Yang nantinya akan menjadi return
            return response()->json($result, 400);
        }
        
         return response()->json($result, $result['status']);
    }

    public function reportTransact(): JsonResponse
    {
        $report = $this->transactService->report();
        return response()->json(['Report Hasil Transaksi' => $report]);
    }
}
