<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3">
                <div class="card-body">
                    <h1 class="text-center">Halaman Registrasi</h1>
                    <form action="<?= BASEURL; ?>/register/register" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control border border-dark" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control border border-dark" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Konfirmasi password</label>
                            <input type="password" class="form-control border border-dark" name="password2" id="password2">
                        </div>
                        <button type="submit" class="btn btn-primary">Registrasi</button>
                    </form>
                    <p class="mt-3">Sudah Login? Segeralah Lakukan <a href="<?= BASEURL; ?>/login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>