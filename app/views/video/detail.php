    <div class="container py-5 text-center">
        <h1><?= $data['data_video_streaming']["title"]; ?></h1>

        <img src="<?= BASEURL; ?>/img/<?= $retVal = ($data['data_video_streaming']["cover"] != null) ? $data['data_video_streaming']["cover"] : 'attack-on-titan.jpg'; ?>" alt="" width="200">
        <div class="row mt-3">
            <?php  ?>
            <p><?= $data['data_video_streaming']["synopsis"] ?></p>
            <p>Tipe Video : <?= $data['data_video_streaming']["vid_type"]; ?></p>
            <p>Episode : <?= $data['data_video_streaming']["episodes"]; ?></p>
            <p>Tanggal Rilis : <?= date("d M, Y", strtotime($data['data_video_streaming']["vid_release"])); ?></p>
            <p>Pemeran : <?= $data['data_video_streaming']["cast"]; ?></p>
            <?= $data['data_video_streaming']["cover"]; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>