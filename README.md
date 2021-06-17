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

5. Lakukan Testing menggunakan PHP PEST
      - Untuk Windows
        > .\vendor\bin\pest 
      - Untuk OS berbasis *NIX
        > ./vendor/bin/pest

6. Jalankan project seperti biasa setelah test 
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






  

  

  

