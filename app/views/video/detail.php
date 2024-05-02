<div class="container py-5">
    <div class="row">
        <figure class="col-3">
            <img src="<?= BASEURL; ?>/img/<?= $data['data_video_streaming']["cover"] ?? 'attack-on-titan.jpg'; ?>" alt="" style="width: 100%;">
        </figure>
        <div class="col">
            <h1><?= $data["title"]; ?></h1>
            <p><?= $data['vid_release']; ?> | <?= $data['data_video_streaming']["vid_type"]; ?> | Episode : <?= $data['data_video_streaming']["episodes"]; ?></p>
            <hr>
            <p><?= $data['data_video_streaming']["synopsis"] ?></p>
            <hr>
            <p>Pemeran : <?= $data['data_video_streaming']["cast"]; ?></p>
        </div>
    </div>
    <hr>
    <figure class="row">
        <video width="75%" src="<?= BASEURL; ?>/vid/video.mp4" controls>
        </video>
    </figure>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>