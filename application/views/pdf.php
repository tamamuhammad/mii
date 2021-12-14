<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
</head>

<body>
    <h3>Daftar Alumni MII Banyuurip 01</h3>
    <hr>
    <ul style="list-style: none">
        <?php if ($masuk) { ?>
            <li>Tahun Masuk : <?= $masuk ?></li>
        <?php }
        if ($keluar) { ?>
            <li>Tahun Lulus : <?= $keluar ?></li>
        <?php } ?>
    </ul>
    <table border="1">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nama Ayah</th>
            <th scope="col">Nama Ibu</th>
            <?php if (!$masuk) { ?>
                <th scope="col">Tahun Masuk</th>
            <?php }
            if (!$keluar) { ?>
                <th scope="col">Tahun Lulus</th>
            <?php } ?>
            <th scope="col">Tanggal Input</th>
        </tr>
        <?php
        $i = 1;
        foreach ($admin as $u) :
        ?>
            <tr>
                <th><?= $i++; ?></th>
                <td><?= $u['nis'] ?></td>
                <td><?= $u['nama'] ?></td>
                <td><?= $u['jns_kel'] ?></td>
                <td><?= $u['tempat_lahir'] ?></td>
                <td><?= $u['tgl_lahir'] ?></td>
                <td><?= $u['alamat'] ?></td>
                <td><?= $u['nama_ayah'] ?></td>
                <td><?= $u['nama_ibu'] ?></td>
                <?php if (!$masuk) { ?>
                    <td><?= $u['tahun_masuk'] ?></td>
                <?php }
                if (!$keluar) { ?>
                    <td><?= $u['tahun_keluar'] ?></td>
                <?php } ?>
                <td><?= $u['tgl_input'] ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>

</html>