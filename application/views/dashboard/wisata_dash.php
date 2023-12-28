<div class="konten">
    <div class="table">


        <h1>Data</h1>
        <table>
            <tr class="thead">
                <th>Tabel</th>
                <th>Jumlah Data</th>

            </tr>
            <?php foreach ($tables as $table) : ?>
            <tr>
                <td><?php echo $table['name']; ?></td>
                <td><?php echo $table['total_rows']; ?></td>
            </tr>
        <?php endforeach; ?>

        <tr class="total-row">
            <td style="font-weight:900;">Total</td>
            <td><?php
                $total = 0;
                foreach ($tables as $table) {
                    $total += $table['total_rows'];
                }
                echo $total;
            ?></td>
        </tr>
        </table>
    </div>

</div>

</body>

</html>