    <div class="container py-5">
        <h1 class="text-center">Tambah Data VidStream</h1>
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <form action="<?= BASEURL; ?>/video/store" method="post" enctype="multipart/form-data">
                    <div class=" mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control border border-dark" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="vid_type" class="form-label">Tipe</label>
                        <input type="text" class="form-control border border-dark" id="vid_type" name="vid_type">
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input class="form-control border border-dark" type="file" id="cover" name="cover">
                    </div>
                    <div class="mb-3">
                        <label for="vid_release" class="form-label">Tanggal Rilis</label>
                        <input type="date" class="form-control border border-dark" id="vid_release" name="vid_release">
                    </div>
                    <div class="mb-3">
                        <label for="episodes" class="form-label">Jumlah Episode</label>
                        <input type="number" class="form-control border border-dark border border-dark" id="episodes" name="episodes">
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Sinopsis</label>
                        <textarea class="form-control border border-dark" id="synopsis" rows="10" name="synopsis"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>