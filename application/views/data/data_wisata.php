<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Jogja</title>
    <link rel="icon" href="<?php echo base_url('asset/img/logo.png') ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url('asset/style/data_wisata.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pontano+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body style=" background-color:  #212121; box-shadow: none; overflow-x:hidden;" >

    <div class="head">
        <?php if ($wisata) : ?>
            <img class="bg" src="<?= base_url('upload/' . $wisata->gambar); ?>" alt="">

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

                <h2 data-aos="zoom-out-right"><?= $wisata->judul; ?></h2>
                <div class="img" data-aos="zoom-out-down">
                    <img src="<?= base_url('upload/' . $wisata->gambar); ?>" alt="">
                    <img src="<?= base_url('upload/' . $wisata->gambar_konten1); ?>" alt="">
                    <img src="<?= base_url('upload/' . $wisata->gambar_konten2); ?>" alt="">
                    <img src="<?= base_url('upload/' . $wisata->gambar_konten3); ?>" alt="">
                </div>

            </div>
    </div>
    <p data-aos="fade-up"
     data-aos-duration="2000" class="artikel">
        <?= nl2br($wisata->isi); ?>

    </p>

<?php endif; ?>
<section data-aos="zoom-out-left">
    <?php if ($komentar) : ?>
        <div class="komen">
            <h3>Komentar</h3>
            <?php foreach ($komentar as $komen) : ?>
                <?php if ($komen->idwisata == $wisata->idwisata) : ?>
                    <div class="userkomen">
                        <p> <?= $komen->username; ?></p>
                        <p class="isikomen"><?= $komen->komentar; ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <form action="<?= site_url('visit/aksi_tambah_komen') ?>" method="post" enctype="multipart/form-data">
                <textarea name="komen" id="" placeholder="Isi Komentar Anda..."></textarea>
                <button type="submit">Kirim</button>
                <input type="hidden" name="idwisata" value="<?= $wisata->idwisata; ?>">
            </form>
        </div>
    <?php endif; ?>
</section>


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