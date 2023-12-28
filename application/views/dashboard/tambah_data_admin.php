<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Admin</title>
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
        <h1>Tambah Data Admin</h1>
        <div class="card text-bg-dark mb-3 p-4 " style="max-width: 50rem; height:26rem; border-radius:15px;">

            <div class="card-body">
                <form action="<?= site_url('visit/aksi_tambah_admin') ?>" method="post" class="row g-3 needs-validation d-flex flex-column " novalidate>
                    <div class="col-md-12 position-relative">
                        <label for="validationTooltipUsername" class="form-label">Nama Pengguna</label>
                        <div class="input-group has-validation">
                            <input type="text" name="usernameadmin" id="username" class="form-control" placeholder="Masukkan nama pengguna" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip bg-transparent text-warning">
                                Mohon Untuk Mengisi username
                            </div>
                            <div class="valid-tooltip">
                                Sipp!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 position-relative">
                        <label for="validationTooltipUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            <input type="email" name="emailadmin" class="form-control" placeholder="Masukkan Email" id="validationTooltipEmail" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip bg-transparent text-warning">
                                Mohon Untuk Mengisi Email.
                            </div>
                            <div class="valid-tooltip">
                                Sipp!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="validationTooltipUsername" class="form-label">Kata Sandi</label>
                        <div class="input-group has-validation">
                            <input type="Password" name="passadmin" id="pass" class="form-control" placeholder="Masukkan Kata Sandi" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip bg-transparent text-warning">
                                Mohon Untuk Mengisi Password
                            </div>
                            <div class="valid-tooltip">
                                Sipp!
                            </div>
                            <i id="showPass" class='bx bxs-tired'></i>
                            <i id="hidePass" class='bx bxs-shocked'></i>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-secondary" onclick="confirmSubmission()" type="button">Kirim</button>
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
