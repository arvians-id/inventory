<?= $this->extend('main/auth/authLayout/indexLayout') ?>
<?= $this->section('konten') ?>
<section id="wrapper">
    <div class="login-register" style="background-image:url(/template/adminwrap/assets/images/background/login-register.jpg);">
        <div class="login-box card shadow-sm">
            <div class="card-body">
                <form action="/masuk/login" method="post">
                    <?= csrf_field() ?>
                    <h3 class="box-title m-b-20">Masuk</h3>
                    <?php if (session()->getFlashdata('sukses')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('sukses') ?>
                        </div>
                    <?php elseif (session()->getFlashdata('gagal')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('gagal') ?>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="col-xs-12">
                            <input class="form-control <?= $validation->hasError('username') ? 'border-danger' : '' ?>" name="username" value="<?= old('username') ?>" type="text" placeholder="username">
                            <small class="text-danger"><?= $validation->getError('username') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <input class="form-control <?= $validation->hasError('password') ? 'border-danger' : '' ?>" name="password" type="password" placeholder="password">
                            <div class="input-group-append">
                                <a type="button" id="showPassword" class="input-group-text bg-transparent"><i class="fas fa-eye-slash"></i></a>
                            </div>
                        </div>
                        <small class="text-danger"><?= $validation->getError('password') ?></small>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-md btn-info" type="submit">Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    const inputPassword = document.querySelector('[name="password"]');
    // Show Hide Password
    const resetPassword = () => {
        inputPassword.setAttribute('type', 'password');
        document.querySelector('#showPassword').innerHTML = '<i class="fas fa-eye-slash"></i>';
    }
    const showPassword = (show, idPassword) => {
        if (idPassword.getAttribute('type') == 'password') {
            idPassword.setAttribute('type', 'text');
            show.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            idPassword.setAttribute('type', 'password');
            show.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }
    }
    document.querySelector('#showPassword').addEventListener('click', function() {
        showPassword(this, inputPassword);
    })
</script>
<?= $this->endSection() ?>