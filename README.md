<p align="center"><img src="https://www.gematsu.com/wp-content/uploads/2020/03/Genshin-Impact_2020_03-16-20_001.png" width="400"></p>
<h1 align="center" color:"#3498DB" >CLEANING ART</h1>

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
5. pindah ke lokasi tempat file td di taruh (ex: cd /d d:\cleaningart (sesuai lokasi path folder yang tadi))
6. ketik copy .env.example .env
7. terus buka file .env edit seperti dibawah :

	<p>DB_DATABASE=cleaningart</p>
	<p>DB_USERNAME=root</p>
	<p>DB_PASSWORD=</p>
    MAIL_MAILER=smtp
    <br>MAIL_HOST=smtp.googlemail.com
    <br>MAIL_PORT=465
    <br>MAIL_USERNAME=emailmu@gmail.com(mailmu)
    <br>MAIL_PASSWORD=passwordmulah
    <br>MAIL_ENCRYPTION=ssl
    <br>MAIL_FROM_ADDRESS=cleaningart@bussiness.id
    <br>MAIL_NAME_ADDRESS="CLEANING ART"

8. terus buka xampp hidupin apache sm mySQL
9. klik admin di mySQL
10. terus buat database baru kasih nama DB_DATABASE sama dengan nomor langkah 7, "cleaningart"  tanpa td petik
11. buka cmd lagi, ketik composer install (tunggu lama emang)
12. kalo udah ketik php artisan key:generate
13. php artisan migrate
14. php artisan db:seed
14. php artisan serve
15. buka chrome (terserah sih), ketik http://localhost:8000/



## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).
<br>Thank you for tutorial to the [Youtube](https://www.youtube.com/)!
<br>Thank you for references to [Stack Overflow](https://stackoverflow.com/)!
## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).


<p align="center"><img src="https://media1.tenor.com/images/e98a5d3d8a924d685e88361e93c5172a/tenor.gif?itemid=15792714" width="400"></p>
<p align="center">
