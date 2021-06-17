<?php

use function Pest\Laravel\postJson;

uses(Tests\TestCase::class);

    it('Reporting jalan dengan token', function() {
        $requestJWT = postJson('api/login', ['email' => 'arsyita@gmail.com', 'password' => 'rooted']);
        $token = $requestJWT->decodeResponseJson();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token['token']
        ])->get('api/transact');

        $response->assertStatus(200);
    });

    it('Tolak request bila tanpa token', function() {
        $response = $this->get('api/transact');
        $response->assertStatus(401); 
    });

    it('Bisa melakukan transaksi', function() {
        $requestJWT = postJson('api/login', ['email' => 'arsyita@gmail.com', 'password' => 'rooted']);
        $token = $requestJWT->decodeResponseJson();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token['token']
        ])->postJson('api/transact', [
            'nama' => 'sakila', 
            'harga' => 100000, 
            'alamat' => 'SDA', 
            'item' => [
                [
                    'id' => '60ca1e59f11000009f001889',
                    'kendaraan' => 'mobils',
                    'jumlah' => 3
                ],
                [
                    'id' => '60ca1e59f11000009f00188e',
                    'kendaraan' => 'motors',
                    'jumlah' => 3
                ]
            ]
        ]);

        $response->assertStatus(200);
    });