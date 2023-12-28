<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Jogja</title>
    <link rel="icon" href="<?php echo base_url('asset/img/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('asset/style/wisata.css') ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pontano+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


</head>

<body style=" background-color:  #212121; box-shadow: none; overflow-x:hidden;">
    <div class="head">
        <nav class="text ">
            <p>VISIT<span>JOGJA</span></p>
            <ul id="menu-list" class="hidden">
                <li class="gayis">
                    <a href="<?php echo base_url() ?>visit/index">Beranda</a>

                </li>
                <li class="gayis">
                    <a href="#">Wisata</a>
                    <hr>
                </li>

                <a class="keluar" href="<?php echo base_url() ?>visit/logout">Keluar</a>

            </ul>
            <a id="menu" href="#"><i class='bx bx-menu'></i></a>
        </nav>
        <div class="konten">
            <div class="card1 z-2 d-flex " data-aos="zoom-out">
                <?php if ($wisata) : ?>
                    <?php $item = $wisata[5]; ?>
                    <div class="kontenutama">

                        <h3><?= $item->judul; ?></h3>
                        <p class="berburu"><?= nl2br($item->deskripsi); ?></p>

                        <a href="<?php echo base_url('visit/data_wisata/' . $item->idwisata) ?>">
                            <button>Selengkapnya...</button>
                        </a>

                    </div>
                    <img src="<?= base_url('upload/' . $item->gambar_konten1); ?>" alt="">

            </div>


        </div>
    </div>

    <?php $item = $wisata[0]; ?>
    <div class="section ">
        <div class="img1" data-aos="zoom-out-right">
            <a href="<?php echo base_url('visit/data_wisata/' . $item->idwisata) ?>">
                <img src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
            </a>
            <h4><?= $item->judul; ?></h4>
            <hr>
            <p class="tanggal"><?= $item->tanggal; ?></p>
        </div>
        <div class="section2">
            <div class="imgkedua" id="card1" data-aos="zoom-out-left">
                <?php $item = $wisata[1]; ?>
                <div class="imgkedua1">
                    <a href="<?php echo base_url('visit/data_wisata/' . $item->idwisata) ?>">
                        <img src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                    </a>
                    <h5 class="titlewis">Gunung Kendil</h5 class="titlewis">
                    <hr>
                    <p><?= $item->tanggal; ?></p>
                </div>

                <div class="imgkedua1">
                    <?php $item = $wisata[2]; ?>
                    <a href="<?php echo base_url('visit/data_wisata/' . $item->idwisata) ?>">
                        <img src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                    </a>
                    <h5 class="titlewis">Puncak Segoro</h5 class="titlewis">
                    <hr>
                    <p><?= $item->tanggal; ?></p>
                </div>
            </div>

            <div class="imgkedua" id="card2" data-aos="zoom-out-left">
                <div class="imgkedua1">
                    <?php $item = $wisata[3]; ?>
                    <a href="<?php echo base_url('visit/data_wisata/' . $item->idwisata) ?>">
                        <img src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                    </a>
                    <h5 class="titlewis">Tebing Gunung Gajah</h5 class="titlewis">
                    <hr>
                    <p><?= $item->tanggal; ?></p>
                </div>

                <div class="imgkedua1">
                    <?php $item = $wisata[4]; ?>
                    <a href="<?php echo base_url('visit/data_wisata/' . $item->idwisata) ?>">
                        <img src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                    </a>

                    <h6 class="titlewis" style="z-index: 1;">Ayunan Langit Watujaran </h6 class="titlewis">
                    <hr>
                    <p><?= $item->tanggal; ?></p>

                </div>
            </div>

        </div>

    </div>
<?php endif; ?>


<?php foreach ($wisata as $wisata_item) : ?>
    <?php if ($wisata_item->idwisata > 11) : ?>
        <div class="main" data-aos="zoom-out-up">
            <div class="main1">
                <img src="<?= base_url('upload/' . $wisata_item->gambar); ?>" alt="">
                <div class="artikel">
                    <h4><?= $wisata_item->judul; ?></h4>
                    <p><?= $wisata_item->tanggal; ?> <span><?= $wisata_item->usernameadmin; ?></span></p>
                    <p class="pesona"><?= $wisata_item->deskripsi; ?></p>
                    <a href="<?php echo base_url('visit/data_wisata/' . $wisata_item->idwisata) ?>">selengkapnya...</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>


<footer data-aos="fade-up-right">
    <div class="main1">
        <div class="logo">
            <p>VISIT</p>
            <h2>JOGJA</h2>
        </div>
        <div class="kotak">
            yy
        </div>
    </div>

    <div class="link">
        <ul>
            <li><a href="<?php echo base_url() ?>visit/index" class="beranda">Beranda</a></li>
            <li><a href="<?php echo base_url() ?>visit/wisata">Wisata</a></li>
            <li><a href="<?php echo base_url() ?>visit/logout">Logout</a></li>
        </ul>
        <div class="kotak">
            yy
        </div>
    </div>
    <hr>
    <form action="<?= site_url('visit/aksi_tambah_hubungi_wisata') ?>" method="post">
        <h2>Hubungi Kami !</h2>
        <input type="text" name="namalengkap" id="namalengkap" placeholder="Nama Lengkap">
        <textarea name="pesan" id="pesan" placeholder="Pesan..."></textarea>
        <button>Kirim</button>
    </form>


</footer>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>



<script src="<?php echo base_url('asset/js/nav.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>