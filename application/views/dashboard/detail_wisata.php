<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Wisata</title>
    <link rel="icon" href="<?php echo base_url('asset/img/logo.png') ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url('asset/style/data_add_style/detail_wisata.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pontano+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

</head>

<body>
    <section>
        <h1>Detail Data Wisata</h1>
        <div id="card_form" class="card text-bg-dark  p-4 ">

            <div class="card-body">
                <form action="<?= base_url('visit/aksi_ubah_wisata/' . $wisata->idwisata) ?>" method="post" id="add_wisata" class="row  needs-validation" novalidate enctype="multipart/form-data">
                    <div class="col-md-12 position-relative">
                        <label for="validationTooltip01" class="form-label">Judul</label>
                        <input name="judul" type="text" value="<?= $wisata->judul ?>" class="form-control" id="validationTooltip01" placeholder="Masukkan Judul" required disabled>

                    </div>
                    <div class="col-md-12  position-relative">
                        <label for="validationTooltip02" class="form-label">Tanggal</label>
                        <input name="tanggal" value="<?= $wisata->tanggal ?>" type="text" class="form-control" id="validationTooltip02" required disabled>

                    </div>
                    <div class="col-md-12 position-relative ">
                        <label for="validationTooltipUsername" class="form-label">Deskripsi</label>
                        <div class="input-group has-validation">

                            <textarea disabled name="deskripsi" type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" placeholder="Masukkan Deskripsi" required> <?= $wisata->deskripsi ?> </textarea>

                        </div>
                    </div>
                    <div class="col-md-12 position-relative ">
                        <label for="validationTooltip03" class="form-label">Isi</label>
                        <textarea disabled value="<?= $wisata->isi ?>" name="isi" type="text" class="form-control" placeholder="Masukkan Isi Lengkap Deskripsi" id="validationTooltip03" required>
                        <?= $wisata->isi ?> </textarea>

                    </div>

                    <div class="col-md-12 position-relative con ">
                        <label for="validationTooltip05" class="form-label"> Gambar utama</label>
                        <img style="position: relative; left:10%;" src=" <?= base_url('upload/' . $wisata->gambar); ?>">

                    </div>
                    <div class="col-md-12 position-relative con">
                        <label for="validationTooltip05" class="form-label">Gambar Konten</label>
                        <img style="position: relative; left:10%;" src=" <?= base_url('upload/' . $wisata->gambar_konten1); ?>">

                    </div>
                    <div class="col-md-12 position-relative con">
                        <label for="validationTooltip05" class="form-label">Gambar Konten</label>
                        <img style="position: relative; left:10%;" src=" <?= base_url('upload/' . $wisata->gambar_konten2); ?>">
                    </div>
                    <div class="col-md-12 position-relative con">
                        <label for="validationTooltip05" class="form-label"> Gambar Konten</label>
                        <img style="position: relative; left:10%;" src=" <?= base_url('upload/' . $wisata->gambar_konten3); ?>">
                    </div>


                    <?php if (isset($wisata->usernameadmin)) : ?>
                        <p style="text-align: center;">Di posting oleh : <?= $wisata->usernameadmin; ?></p>
                    <?php else : ?>
                        <p>Username admin tidak tersedia</p>
                    <?php endif; ?>


                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const passwordInput = document.getElementById('pass');
        const showPassIcon = document.getElementById('showPass');
        const hidePassIcon = document.getElementById('hidePass');

        showPassIcon.addEventListener('click', () => togglePassword(true));
        hidePassIcon.addEventListener('click', () => togglePassword(false));

        function togglePassword(showPassword) {
            passwordInput.type = showPassword ? 'text' : 'password';
            showPassIcon.style.display = showPassword ? 'none' : 'block';
            hidePassIcon.style.display = showPassword ? 'block' : 'none';
        }
    </script>
</body>

</html>