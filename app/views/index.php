<div class="container py-5">
    <h1 class="text-center">Daftar List VidStream</h1>
    <div class="row mt-3">
        <table class="table table-bordered border-dark table-striped">
            <thead align="center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Tanggal Rilis</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($data['data_video_streaming'] as $key => $dvs) : ?>
                    <tr>
                        <!-- <th scope="row"><?= $i + $awalData ?></th> -->
                        <th scope="row"><?= $i ?></th>
                        <td align="center"><?= $dvs["title"]; ?></td>
                        <td align="center"><?= $dvs["vid_type"]; ?></td>
                        <td align="center"> <?= date("d M, Y", strtotime($dvs["vid_release"])); ?></td>
                        <td align="center">
                            <!-- hrefnya menuju controller, bukan view, view diurus controlller -->
                            <a href="<?= BASEURL; ?>/video/detail/<?= $dvs['id'] ?>" class="text-decoration-none text-dark">Detail</a>
                            <?php if (isset($_SESSION["login"])) : ?>
                                | <a href="video/edit/<?= $dvs["id"]; ?>" class="text-decoration-none text-warning">Ubah</a> |
                                <a href="video/delete/<?= $dvs["id"]; ?>" onclick="return confirm('yakin?');" class="text-decoration-none text-danger">Hapus</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($_SESSION["login"])) : ?>
        <a href="<?= BASEURL; ?>/video/add">Tambah Data Video</a>
    <?php endif; ?>
</div>