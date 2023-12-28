<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Wisata</title>
    <link rel="icon" href="<?php echo base_url('asset/img/logo.png') ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url('asset/style/data_add_style/tambah_all.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pontano+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

</head>

<body>
    <section>
        <h1>Ubah Data Wisata</h1>
        <div id="card_form" class="card text-bg-dark mb-3 p-4 ">

            <div class="card-body">
                <form action="<?= base_url('visit/aksi_ubah_wisata/' . $wisata->idwisata) ?>" method="post" id="add_wisata" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                    <div class="col-md-5 position-relative">
                        <label for="validationTooltip01" class="form-label">Judul</label>
                        <input name="judul" type="text" value="<?= $wisata->judul ?>" class="form-control" id="validationTooltip01" placeholder="Masukkan Judul" required>
                        <div class="valid-tooltip">
                            Siip!
                        </div>
                        <div class="invalid-tooltip bg-transparent text-warning ">
                            Mohon Masukkan Judul
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip02" class="form-label">Tanggal</label>
                        <input name="tanggal" value="<?= $wisata->tanggal ?>" type="date" class="form-control" id="validationTooltip02" required>
                        <div class="valid-tooltip ">
                            Siip!
                        </div>
                        <div class="invalid-tooltip bg-transparent text-warning ">
                            Mohon Masukkan Tanggal
                        </div>
                    </div>
                    <div class="col-md-5 position-relative">
                        <label for="validationTooltipUsername" class="form-label">Deskripsi</label>
                        <div class="input-group has-validation">

                            <textarea name="deskripsi" type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" placeholder="Masukkan Deskripsi" required> <?= $wisata->deskripsi ?> </textarea>
                            <div class="invalid-tooltip bg-transparent text-warning ">
                                Mohon Masukkan Deskripsi
                            </div>
                            <div class="valid-tooltip ">
                                Siip!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip03" class="form-label">Isi</label>
                        <textarea value="<?= $wisata->isi ?>" name="isi" type="text" class="form-control" placeholder="Masukkan Isi Lengkap Deskripsi" id="validationTooltip03" required>
                        <?= $wisata->isi ?> </textarea>
                        <div class="invalid-tooltip bg-transparent text-warning">
                            Mohon Masukkan Isi
                        </div>
                        <div class="valid-tooltip ">
                            Siip!
                        </div>
                    </div>

                    <div class="col-md-11 position-relative">
                        <label for="validationTooltip05" class="form-label">Pilih Gambar utama</label>
                        <label style="position: relative; left:10%; "> File Sebelumnya : <?= $wisata->gambar ?></label>
                        <input value="xaxa" name="gambar" style="width: 106.5%;" type="file" class="form-control" id="validationTooltip05" required multiple>
                        <div class="invalid-tooltip bg-transparent text-warning">
                            Pilih Gambar Terlebih Dahulu
                        </div>
                        <div class="valid-tooltip ">
                            Siip!
                        </div>
                    </div>
                    <div class="col-md-11 position-relative">
                        <label for="validationTooltip05" class="form-label">Pilih Gambar Konten</label>
                        <label style="position: relative; left:10%;">File sebelumnya : <?= $wisata->gambar_konten1 ?></label>
                        <input value="<?= $wisata->gambar_konten1 ?>" name="gambar_konten1" style="width: 106.5%;" type="file" class="form-control" id="validationTooltip05" required multiple>
                        <div class="invalid-tooltip bg-transparent text-warning">
                            Pilih Gambar Terlebih Dahulu
                        </div>
                        <div class="valid-tooltip ">
                            Siip!
                        </div>
                    </div>
                    <div class="col-md-11 position-relative">
                        <label for="validationTooltip05" class="form-label">Pilih Gambar Konten</label>
                        <label style="position: relative; left:10%;">File sebelumnya : <?= $wisata->gambar_konten2 ?></label>
                        <input name="gambar_konten2" style="width: 106.5%;" type="file" class="form-control" id="validationTooltip05" required multiple>
                        <div class="invalid-tooltip bg-transparent text-warning">
                            Pilih Gambar Terlebih Dahulu
                        </div>
                        <div class="valid-tooltip ">
                            Siip!
                        </div>
                    </div>
                    <div class="col-md-11 position-relative">
                        <label for="validationTooltip05" class="form-label">Pilih Gambar Konten</label>
                        <label style="position: relative; left:10%;">File sebelumnya : <?= $wisata->gambar_konten3 ?></label>
                        <input name="gambar_konten3" style="width: 106.5%;" type="file" class="form-control" id="validationTooltip05" required multiple>
                        <div class="invalid-tooltip bg-transparent text-warning">
                            Pilih Gambar Terlebih Dahulu
                        </div>
                        <div class="valid-tooltip ">
                            Siip!
                        </div>
                    </div>


                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">pilih nama admin untuk di post</label>
                        <select name="idadmin" class="form-select" id="validationTooltip04" required>

                            <?php foreach ($admin as $admin_option) : ?>
                                <option value="<?php echo $admin_option->idadmin; ?>">
                                    <?php echo $admin_option->usernameadmin; ?>
                                </option>

                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-tooltip bg-transparent text-warning">
                            Mohon Pilih Admin
                        </div>
                        <div class="valid-tooltip ">
                            Siip!
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-secondary"type="button" onclick="confirmSubmission()">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function confirmSubmission() {
            const form = document.querySelector('form');
            if (form.checkValidity()) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin ingin menyimpan data?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            } else {
                Swal.fire({
                    title: 'Opps',
                    text: 'Mohon isi semua kolom dengan benar!',
                    icon: 'warning'
                });
            }
        }
    </script>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

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