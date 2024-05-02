<div class="container py-5">
    <div class="row mt-3">
        <h1 class="text-uppercase">DRAMA KOREA</h1>
        <?php foreach ($data['data_video_streaming'] as $key => $dvs) : ?>
            <div class="col-md-3">
                <a href="<?= BASEURL; ?>/video/detail/<?= $dvs['id'] ?>" class="text-decoration-none text-dark" style="font-size: 1.5vw;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                    <img src="<?= BASEURL; ?>/img/<?= $dvs["cover"] ?? 'attack-on-titan.jpg'; ?>" alt="" style="width: 100%;"><br>
                    <?= $dvs['title']; ?>
                </a>
                <p style="font-size: 1vw;font-family:'Times New Roman', Times, serif"><?= $dvs['vid_release']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="text-uppercase">Anime</h1>
    <h1 class="text-uppercase">Variety Show</h1>
</div>