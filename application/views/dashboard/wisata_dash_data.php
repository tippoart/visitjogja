<div class="konten">
    <div class="table">


        <h1>Wisata</h1>
        <a class="add_data" href="<?php echo base_url('visit/dashboard/wisata_dash_data/tambah_data_wisata') ?>">Tambah Data </a>
        <table>
            <tr class="thead">
                <th>Judul</th>
                <th>Tanggal</th>


                <th>Aksi</th>
            </tr>
            <?php foreach ($wisata as $item) : ?>
                <tr>
                    <td class="isi"><?php echo $item->judul; ?></td>
                    <td class="isi"><?php echo $item->tanggal; ?></td>

                    <td class=" isi bor">
                        <div class="det" style="display: flex; gap:10px;">
                            <a class="ubah" href="<?= base_url('visit/dashboard/wisata_dash_data/ubah_data_wisata/' . $item->idwisata) ?>">Ubah</a>

                            <a class="detail" href="<?= base_url('visit/dashboard/wisata_dash_data/detail_wisata/' . $item->idwisata) ?>">Detail</a>

                            <form style="border:none;" id="form<?= $item->idwisata ?>" method="post" action="<?= base_url('visit/delete_data_wisata/' . $item->idwisata) ?>" style="display: inline;">
                                <button style="border: none;" type="button" onclick="konfirmasiHapus('form<?= $item->idwisata ?>')" class="hapus">Hapus</button>
                            </form>

                        </div>


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