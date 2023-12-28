<div class="konten">
    <div class="table">
        <h1>Pengguna</h1>
        <a class="add_data" href="<?php echo base_url('visit/dashboard/dash_wisata_user/tambah_data_user') ?>">Tambah Data </a>
        <table>
            <tr class="thead">
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Kata Sandi</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($user as $item) : ?>
                <tr>

                    <td><?php echo $item->username; ?></td>
                    <td><?php echo $item->email; ?></td>
                    <td><?php echo $item->pass; ?></td>
                    <td>
                    <a class="ubah" href="<?= base_url('visit/dashboard/dash_wisata_user/ubah_data_user/' . $item->iduser) ?>">Ubah</a>
                    <form id="form<?= $item->iduser ?>" method="post" action="<?= base_url('visit/delete_user/' . $item->iduser) ?>" style="display: inline;">
                            <button style="border: none;" type="button" onclick="konfirmasiHapus('form<?= $item->iduser ?>')" class="hapus">Hapus</button>
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