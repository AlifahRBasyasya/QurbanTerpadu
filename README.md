# QurbanTerpadu
> Prototipe Web Qurban dengan metode Quick Win menggunakan dummy database.

## Software Requirement
* Windows
* XAMPP
* Aplikasi pengelolaan database (Cth: MySQL, phpMyAdmin, MariaDB), selanjutnya akan disebut DBMS

## Setup
1. Masuk ke dalam folder C:\xampp\htdocs
2. Clone repository ini di folder tersebut
3. Buat database baru pada DBMS Anda
4. Import qurbanterpadu.sql ke database baru yang sudah dibuat
5. Pada file index.php, profil.php, qurban.php, kontak.php ubah baris berikut
> $conn = mysqli_connect("localhost", "username", "password", "nama_database");
   
   sesuai dengan pengaturan DBMS Anda

## Cara Penggunaan
1. Buka XAMPP Control Panel (dapat dicari pada search bar Windows)
2. Klik "start" pada Apache
3. Ketikkan "localhost" pada browser Anda (tanpa tanda petik)
4. Klik folder QurbanTerpadu
5. Selamat mencoba

## Akun
Untuk saat ini hanya ada satu akun yang terdaftar pada database. Login pada prototipe web dapat dilakukan dengan:
```
Username: 1
Password: 12345
```
