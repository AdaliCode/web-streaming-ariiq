<div class="container py-5">
    <h1 class="text-center">Ubah Data</h1>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <form action="<?= BASEURL; ?>/video/update/<?= $data['data_video_streaming']["id"]; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="1">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control border border-dark" id="title" name="title" value="<?= $data['data_video_streaming']["title"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="vid_type" class="form-label">Tipe</label>
                    <input type="text" class="form-control border border-dark" id="vid_type" name="vid_type" value="<?= $data['data_video_streaming']["vid_type"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input class="form-control border border-dark" type="file" id="cover" name="cover">
                </div>
                <div class=" mb-3">
                    <label for="vid_release" class="form-label">Tanggal Rilis</label>
                    <input type="date" class="form-control border border-dark" id="vid_release" name="vid_release" value="<?= $data['data_video_streaming']["vid_release"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="episodes" class="form-label">Jumlah Episode</label>
                    <input type="number" class="form-control border border-dark" id="episodes" name="episodes" value="<?= $data['data_video_streaming']["episodes"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Sinopsis</label>
                    <textarea class="form-control border border-dark" id="synopsis" rows="10" name="synopsis"><?= $data['data_video_streaming']["synopsis"]; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>