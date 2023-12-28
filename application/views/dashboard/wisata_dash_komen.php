<div class="konten">
    <div class="table">


        <h1>Komentar</h1>
        <table>
            <tr class="thead">
                <th>Nama Pengguna</th>
                <th>Wisata</th>
                <th>Komentar</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($komentar as $item) : ?>
                <tr>
                    <td><?php echo $item->username; ?></td>
                    <td><?php echo $item->wisata_judul; ?></td>
                    <td><?php echo $item->komentar; ?></td>
                    <td>

                        <form method="post" action="<?= base_url('visit/delete_komen/' . $item->idkomen) ?>" id="form<?= $item->idkomen ?>">
                            <a href="#" onclick="konfirmasiHapus('form<?= $item->idkomen ?>')" class="hapus">
                                Hapus
                            </a>
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