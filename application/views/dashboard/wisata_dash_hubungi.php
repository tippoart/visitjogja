<div class="konten">
    <div class="table">


        <h1>Hubungi</h1>
        <table>
            <tr class="thead">
                <th>Nama Lengkap</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($hubungi as $item) : ?>
                <tr>
                    <td><?php echo $item->namalengkap; ?></td>
                    <td><?php echo $item->pesan; ?></td>
                    <td>
                        <form method="post" action="<?= base_url('visit/aksi_hapus_hubungi/' . $item->idhub) ?>" id="form<?= $item->idhub ?>">
                            <a href="#" onclick="konfirmasiHapus('form<?= $item->idhub ?>')" class="hapus" type="button">
                                Hapus
                            </a>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function konfirmasiHapus(formId) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>

</body>

</html>