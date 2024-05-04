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
                        <th scope="row" class="text-center"><?= $i + $data['page_component'][2] ?></th>
                        <td align="center"><?= $dvs["title"]; ?></td>
                        <td align="center"><?= $dvs["vid_type"]; ?></td>
                        <td align="center"> <?= $dvs["vid_release"]; ?></td>
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
    <a href="<?= BASEURL; ?>/video/add">Tambah Data Video</a>
    <!-- page -->
    <?php if ($data['page_component'][0] > 1) :  ?>
        <div class="float-end">
            <!-- << -->
            <?php if ($data['page_component'][1] > 1) : ?>
                <a href="?page=<?= $data['page_component'][1] - 1; ?>">&lt;</a>
            <?php endif ?>

            <?php for ($i = 1; $i <= $data['page_component'][0]; $i++) : ?>
                <?php if ($i == $data['page_component'][1]) : ?>
                    <a href="?page=<?= $i; ?>" style="font-weight: bold;"><?= $i; ?></a>
                <?php else : ?>
                    <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                <?php endif ?>
            <?php endfor ?>

            <!-- >> -->
            <?php if ($data['page_component'][1] < $data['page_component'][0]) : ?>
                <a href="?page=<?= $data['page_component'][1] + 1; ?>">&gt;</a>
            <?php endif ?>
        </div>
    <?php endif; ?>
</div>