<p align="center"><img src="https://i5.walmartimages.com/asr/c23634a3-c974-4c23-86ee-e390c4eb8d2c_1.0d7c67993806a3c81b465ed24dfaf68e.jpeg?odnHeight=2000&odnWidth=2000&odnBg=ffffff" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Cara Menggunakan

1. Extract File 
2. letakan di c: atau d: (bebas)
3. beri name folder dangan "cleaningart" (bebas juga sih)
4. buka cmd
5. pindah ke lokasi tempat file td di taruh (ex: cd /d d:\cleaningart)
6. ketik copy .env.example.env
7. terus buka file .env edit seperti dibawah :
	DB_DATABASE=cleaningart
	DB_USERNAME=root
	DB_PASSWORD=
	lainnya tetep terus save
8. terus buka xampp hidupin apache sm mySQL
9. klik admin di mySQL
10. terus buat database baru kasih nama db sama dengan nomor langkah 7, "cleaningart"  tanpa td petik
11. buka cmd lagi, ketik composer install (tunggu lama emang)
12. kalo udah ketik php artisan key:generate
13. php artisan migrate
14. php artisan serve
15. buka chrome (terserah sih), ketik http://localhost:8000/cleaningart
16. seleseai

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

