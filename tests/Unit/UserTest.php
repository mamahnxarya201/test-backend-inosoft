<?php

uses(Tests\TestCase::class);

    it('Validasi user input', function() {
        $response = $this->postJson('api/register', []);
        $response->assertStatus(400);
    });

    it('Bisa Register User baru', function() {
        $response = $this->postJson('api/register', ['name' => 'Taylor Swift', 'email' => 'swift@gmail.com', 'password' => 'rooted']);
        $response->assertStatus(200);
    });

    it('Bisa login menggunakan user credentials dan mendapatkan token', function() {
        $response = $this->postJson('api/login', ['email' => 'swift@gmail.com', 'password' => 'rooted']);
                         
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
                'token' => true,
        ]);
    });

    it('Email User harus unique', function() {
        $response = $this->postJson('api/register', ['name' => 'Taylor Swift', 'email' => 'swift@gmail.com', 'password' => 'rooted']);
        $response->assertStatus(500);
    });
    


