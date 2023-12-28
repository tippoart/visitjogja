<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Jogja</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/style/ind.css') ?>">
    <link rel="icon" href="<?php echo base_url('asset/img/logo.png') ?>" type="image/x-icon">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pontano+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body style=" background-color:  #212121; overflow-x:hidden;">
    <div class="head">
        <nav class="text ">
            <p>VISIT<span>JOGJA</span></p>
            <ul id="menu-list" class="hidden">
                <li id="gayis">
                    <a href="#">Beranda</a>
                    <hr>
                </li>
                <li><a href="<?php echo base_url() ?>visit/wisata_not_login">Wisata</a></li>


                <a class="keluar" href="<?php echo base_url() ?>visit/login">Masuk</a>

            </ul>
            <a id="menu" href="#"><i class='bx bx-menu'></i></a>
        </nav>
        <div class="konten">
            <p>Be anazed at Every Step</p>
            <div class="visit">
                <p>VISIT</p>
                <h3>JOGJA</h3>
            </div>

            <p class="des">
                Lakukan perjalanan menakjubkan dimulai dari Jogja, salah satu permata<br>Indonesia yang mempesona. Jelajahi kekayaan budaya yang tak tertandingi,<br>
                merasakan keindahan warisan bersejarah yang memikat hati.
            </p>
            <a href="<?php echo base_url('visit/wisata_not_login') ?>">
                <button>Jelajahi Sekarang</button>
            </a>
        </div>
    </div>
    <?php if ($wisata) : ?>
        <?php $item = $wisata[6]; ?>
        <div class="imgkonten">
            <div class="data" data-aos="fade-up" data-aos-anchor-placement="top-center">
                <div class="img">
                    <img src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                    <img src="<?= base_url('upload/' . $item->gambar_konten2); ?>" alt="">
                </div>
                <div class="img2">
                    <img src="<?= base_url('upload/' . $item->gambar_konten1); ?>" alt="">
                </div>
            </div>

            <div class="artikel" data-aos="fade-down-left">
                <h4><?= nl2br($item->judul); ?></h4>
                <p class="berburu"><?= nl2br($item->deskripsi); ?></p>

                <a href="<?php echo base_url('visit/data_wisata_not_login/' . $item->idwisata) ?>">
                    <button>Selengkapnya...</button>
                </a>

            </div>
        </div>

        <div class="populer">
            <h2 data-aos="zoom-out-up">Tempat Wisata Populer</h2>
            <hr data-aos="zoom-out-up">
            <div class="img" >
                <div class="cardimg" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <?php $item = $wisata[7]; ?>
                    <div class="judul">
                        <h5>Eksotis Pantai Kayu Arum</h5>
                        <p><?= nl2br($item->tanggal); ?></p>
                        <a href="<?php echo base_url('visit/data_wisata_not_login/' . $item->idwisata) ?>">
                            <button>Selengkapnya...</button>
                        </a>
                    </div>
                    <img class="mx-auto" src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                </div>

                <div class="cardimg" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <?php $item = $wisata[8]; ?>
                    <div class="judul">
                        <h5>Gumuk Barchan</h5>
                        <p><?= nl2br($item->tanggal); ?></p>
                        <a href="<?php echo base_url('visit/data_wisata_not_login/' . $item->idwisata) ?>">
                            <button>Selengkapnya...</button>
                        </a>
                    </div>
                    <img class="mx-auto" src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                </div>

                <div class="cardimg" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <?php $item = $wisata[9]; ?>
                    <div class="judul">
                        <h5>Pantai Glagah</h5>
                        <p><?= nl2br($item->tanggal); ?></p>

                        <a href="<?php echo base_url('visit/data_wisata_not_login/' . $item->idwisata) ?>">
                            <button>Selengkapnya...</button>
                        </a>
                    </div>
                    <img class="mx-auto" src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                </div>

                <div class="cardimg" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <?php $item = $wisata[10]; ?>
                    <div class="judul">
                        <h5>Ledok Sambi</h5>
                        <p><?= nl2br($item->tanggal); ?></p>

                        <a href="<?php echo base_url('visit/data_wisata_not_login/' . $item->idwisata) ?>">
                            <button>Selengkapnya...</button>
                        </a>
                    </div>
                    <img class="mx-auto" src="<?= base_url('upload/' . $item->gambar); ?>" alt="">
                </div>

            </div>
        </div>
    <?php endif ?>

    <div class="quote" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <img src="<?php echo base_url('asset/img/petik.png') ?>" alt="">
        <h1>Alexander Sattler</h1>
        <p>Saya lebih suka memiliki sedikit dan melihat dunia <br>
            daripada memiliki dunia, tapi melihat sedikit darinya.</p>
    </div>

    <footer data-aos="fade-up" data-aos-anchor-placement="center-bottom">
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
                <li><a href="<?php echo base_url() ?>visit/index_not_login" class="beranda">Beranda</a></li>
                <li><a href="<?php echo base_url() ?>visit/wisata_not_login">Wisata</a></li>
                <li><a href="<?php echo base_url() ?>visit/login">Masuk</a></li>
            </ul>
            <div class="kotak">
                yy
            </div>
        </div>
        <hr>
        <form method="post" action="<?php echo base_url() ?>visit/login">
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