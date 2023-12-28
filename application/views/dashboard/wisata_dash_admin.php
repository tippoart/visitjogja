<div class="konten">
    <div class="table">


        <h1>Admin</h1>
        <a class="add_data" href="<?php echo base_url('visit/dashboard/wisata_dash_admin/tambah_data_admin') ?>">Tambah Data </a>
        <table>
            <tr class="thead">
                <th>Nama Pengguna Admin</th>
                <th>Email</th>
                <th>Kata Sandi</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($admin as $item) : ?>
                <tr>
                    <td><?php echo $item->usernameadmin; ?></td>
                    <td><?php echo $item->emailadmin; ?></td>
                    <td><?php echo $item->passadmin; ?></td>
                    <td> <a class="ubah" href="<?= base_url('visit/dashboard/dash_wisata_admin/ubah_data_admin/' . $item->idadmin) ?>">Ubah</a>
                        <form id="form<?= $item->idadmin ?>" method="post" action="<?= base_url('visit/delete_admin/' . $item->idadmin) ?>" style="display: inline;">
                            <button style="border: none;" type="button" onclick="konfirmasiHapus('form<?= $item->idadmin ?>')" class="hapus">Hapus</button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
<script>
    function konfirmasiHapus(formId) {
        Swal.fire({
            title: "Konfirmasi",
            text: "Anda yakin ingin menghapus data ini?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#dc3545", 
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Menghapus...",
                    text: "Tunggu sebentar",
                    icon: "info",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        setTimeout(() => {
                            document.getElementById(formId).submit();
                        }, 1000);
                    }
                });
            } 
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>