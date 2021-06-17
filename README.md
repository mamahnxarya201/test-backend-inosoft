<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"> <a href="https://pestphp.com/" target="_blank"><img src="https://pestphp.com/assets/img/small-logo.gif" width="400"></a></a></p>


## Requirement

- PHP 8.0

- MongoDB 4.2

## Untuk Penggunaan Dengan Docker

- Docker Desktop

- Docker Compose (untuk linux)

- WSL2 (untuk windows) dengan instalasi php versi apapun

## Instalasi

1. Jalankan Command
  > composer install --ignore-platform-reqs

2. Setelah itu ganti host DB dengan 'localhost'

3. Buat database dengan nama 'laravel_sail'

4. Lakukan migrasi database dan seed data untuk stok mobil dan motor
  >  php artisan:migrate fresh --seed

5. Ubah ObjectID yang berada di file tests\Unit menjadi sesuai dengan objek mobils dan motors yang ada di database
  ``` postJson('api/transact', [
            'nama' => 'sakila', 
            'harga' => 100000, 
            'alamat' => 'SDA', 
            'item' => [
                [
                    // Ganti ID ini dengan id yang ada di Database
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
  ```

6. Lakukan Testing menggunakan PHP PEST
      - Untuk Windows
        > .\vendor\bin\pest 
      - Untuk OS berbasis *NIX
        > ./vendor/bin/pest

7. Jalankan project seperti biasa setelah test 
  > php artisan serve

### Untuk Docker

1. Jalankan Command
  > composer install --ignore-platform-reqs

2. Setelah itu ganti host DB dengan 'mongo'

3. Buat database dengan nama 'laravel_sail'

4. Jalankan container docker 
      - Untuk Windows
        > .\vendor\bin\sail up 
      - Untuk OS berbasis *NIX
        > ./vendor/bin/sail up

5. Setelah menjalankan command diatas. Project laravel sudah berjalan dan diakses melalui localhost seperti biasa \
  untuk port project laravel dan database dll dapat dilihat di file docker-Compose.yml di bagian PORT untuk setiap service


6. Setelah itu jalankan migrasi test dll seperti biasa hanya saja ditambahkan prefix seperti ini di setiap Command
      - Untuk Windows
        > .\vendor\bin\sail [command] 
      - Untuk OS berbasis *NIX
        > ./vendor/bin/sail [command]
    
    contoh :
      - Untuk Windows
        > .\vendor\bin\sail php artisan migrate:fresh --seed 
      - Untuk OS berbasis *NIX
        > ./vendor/bin/sail php artisan migrate:fresh --seed 

## API Usage

  ### Endpoint Untuk User 

  - api/register \
      Metode POST dengan menggunakan Body JSON
    ``` 
    {
        "name"     : "Taylor Swift", 
        "email"    : "swift@gmail.com", 
        "password" : "rooted"
    }
     ``` 
  - api/login \
      Metode POST dengan menggunakan Body JSON
    ``` 
    {
        "email"    : "swift@gmail.com", 
        "password" : "rooted"
    }
     ```

    ### Endpoint Untuk Transact 

  - api/transact \
      Metode GET harus dengan token yang di paasangkan ke Header \
      Berguna untuk melihat laporan penjualan
      ```
        "Authorization" : "Bearer token"
      ```
  - api/transact \
      Metode POST dengan menggunakan Body JSON
      Pastikan id mobil dan jumlah yang akan di POST tidak melebihi stok mobil dan kendaraaan yang ada di database \
      Ketika proses transaksi berhasil maka jumlah stok di database akan berulang
    ``` 
    {
      "nama" :"sakila", 
      "harga" : 100000, 
      "alamat" : 'SDA', 
      "item" : {
                  [
                      // Ganti ID ini dengan id yang ada di Database
                      "id"        : "60ca1e59f11000009f001889",
                      "kendaraan" : "mobils",
                      "jumlah"    : 3
                  ],
                  [
                      "id"        : '60ca1e59f11000009f00188e',
                      "kendaraan" : 'motors',
                      "jumlah"    : 3
                  ]   
            }
    }
     ```









  

  

  

