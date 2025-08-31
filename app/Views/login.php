<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-2">
    <div class="col-md-6 col-lg-5">
        <h1 class="text-center mb-4" style="color:#00f2ea;">Sign In</h1>

        <?php if (session()->getFlashdata('register_success')): ?>
            <div class="alert alert-success text-center" role="alert">
                <?= esc(session()->getFlashdata('register_success')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('login_error')): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= esc(session()->getFlashdata('login_error')) ?>
            </div>
        <?php endif; ?>

        <div class="card border-0" style="background:#1c1c1c; box-shadow:0px 3px 10px rgba(0,0,0,0.6); border-radius:12px;">
            <div class="card-body p-4">
                <form action="<?= base_url('login') ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email</label>
                        <input type="email" class="form-control bg-dark text-white border-secondary" 
                               id="email" name="email" required value="<?= esc(old('email')) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <input type="password" class="form-control bg-dark text-white border-secondary" 
                               id="password" name="password" required>
                    </div>
                    <button type="submit" 
                            class="btn w-100" 
                            style="background:#ff0050; color:#fff; border-radius:20px; font-weight:500; transition:0.3s;">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <p class="text-center mt-3 text-white small">
            Don't have an account? 
            <a href="<?= base_url('register') ?>" style="color:#00f2ea;">Register</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>
