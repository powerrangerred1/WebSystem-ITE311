<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-2">
    <div class="col-md-7 col-lg-6">
        <h1 class="text-center mb-4" style="color:#00f2ea;">Create Account</h1>

        <?php if (session()->getFlashdata('register_error')): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= esc(session()->getFlashdata('register_error')) ?>
            </div>
        <?php endif; ?>

        <div class="card border-0" style="background:#1c1c1c; box-shadow:0px 3px 10px rgba(0,0,0,0.6); border-radius:12px;">
            <div class="card-body p-4">
                <form action="<?= base_url('register') ?>" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Name</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary" 
                               id="name" name="name" required value="<?= esc(old('name')) ?>">
                    </div>
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
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label text-white">Confirm Password</label>
                        <input type="password" class="form-control bg-dark text-white border-secondary" 
                               id="password_confirm" name="password_confirm" required>
                    </div>
                    <button type="submit" 
                            class="btn w-100" 
                            style="background:#ff0050; color:#fff; border-radius:20px; font-weight:500; transition:0.3s;">
                        Create Account
                    </button>
                </form>

                <!-- Already have an account? -->
                <div class="text-center mt-3">
                    <p class="mb-0 text-white">
                        Already have an account? 
                        <a href="<?= base_url('login') ?>" style="color:#00f2ea;">Log in here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
