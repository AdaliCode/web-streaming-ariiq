<div class="container py-5">
    <div class="row mt-3">
        <h1 class="text-uppercase">DRAMA KOREA</h1>
        <?php foreach ($data['data_video_streaming'] as $key => $dvs) : ?>
            <div class="col-md-4">
                <a href="<?= BASEURL; ?>/video/detail/<?= $dvs['id'] ?>" class="text-decoration-none text-dark">
                    <img src="<?= BASEURL; ?>/img/<?= $dvs["cover"] ?? 'attack-on-titan.jpg'; ?>" alt="" width="300"><br>
                    <?= $dvs['title']; ?>
                </a>
                <p><?= $dvs['vid_release']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="text-uppercase">Anime</h1>
    <h1 class="text-uppercase">Variety Show</h1>
</div>