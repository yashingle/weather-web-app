<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="col col-md-8 col-sm-10 py-5 mx-auto">
        <div class="row mb-5">
            <div class="container">
                <div class="col">
                    <di class="row justify-content-center">
                        <img src="<?= base_url('assets/images/undraw_empty_xct9.svg') ?>" class="col-md-6 col-sm-12" />
                    </di>

                    <p class="h5 font-weight-bold text-center mt-2">Gagal memuat halaman</p>
                </div>

            </div>
        </div>

        <p class="font-weight-bold">Mohon lakukan refresh hingga halaman berhasil ditampilkan atau sebanyak maksimal 5 kali, dengan memberi jeda 5 detik setiap melakukan refresh. 🔃</p>

        <p>Jika sudah melakukan refresh berulang kali dan halaman tetap tidak ditampilkan, besar kemungkinan limit akses API telah tercapai. Kami menggunakan API dengan paket gratis yang mana aksesnya dibatas yaitu 150 request perhari. Mohon akses dihari lain. Mohon maaf atas ketidaknyamanannya. 🙏</p>
    </div>
</div>

<?php
    die();
?>
    
</body>
</html>