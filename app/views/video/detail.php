<div class="container py-5">
    <div class="row">
        <div class="col-5">
            <img src="<?= BASEURL; ?>/img/<?= $data['data_video_streaming']["cover"] ?? 'attack-on-titan.jpg'; ?>" alt="" width="450">
        </div>
        <div class="col">
            <h1><?= $data["title"]; ?></h1>
            <p><?= $data['vid_release']; ?> | <?= $data['data_video_streaming']["vid_type"]; ?> | Episode : <?= $data['data_video_streaming']["episodes"]; ?></p>
            <hr>
            <p><?= $data['data_video_streaming']["synopsis"] ?></p>
            <hr>
            <p>Pemeran : <?= $data['data_video_streaming']["cast"]; ?></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>