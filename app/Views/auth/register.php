<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
  <div class="col-md-6 col-lg-5">
    <div class="card border-0 shadow" style="background-color: #1c1c1c; border-radius: 12px;">
      <div class="card-body p-4">
        <h2 class="text-center mb-4" style="color: #00f2ea; font-weight: 600;">Create Account</h2>

        <?php if (session()->getFlashdata('register_error')): ?>
          <div class="alert alert-danger" role="alert">
            <?= esc(session()->getFlashdata('register_error')) ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('register') ?>" method="post">
          <div class="mb-3">
            <label for="name" class="form-label text-light">Name</label>
            <input type="text" class="form-control bg-dark text-light border-0" id="name" name="name" required
                   value="<?= esc(old('name')) ?>" placeholder="Enter your full name">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label text-light">Email</label>
            <input type="email" class="form-control bg-dark text-light border-0" id="email" name="email" required
                   value="<?= esc(old('email')) ?>" placeholder="Enter your email">
          </div>

          <div class="mb-3">
            <label for="role" class="form-label text-light">Role</label>
            <select class="form-select bg-dark text-light border-0" id="role" name="role" required>
              <?php $oldRole = strtolower((string) old('role')); ?>
              <option value="student" <?= $oldRole === 'student' ? 'selected' : '' ?>>Student</option>
              <option value="teacher" <?= $oldRole === 'teacher' ? 'selected' : '' ?>>Teacher</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label text-light">Password</label>
            <input type="password" class="form-control bg-dark text-light border-0" id="password" name="password" required
                   placeholder="Enter your password">
          </div>

          <div class="mb-3">
            <label for="password_confirm" class="form-label text-light">Confirm Password</label>
            <input type="password" class="form-control bg-dark text-light border-0" id="password_confirm"
                   name="password_confirm" required placeholder="Confirm your password">
          </div>

          <button type="submit" class="btn w-100 mt-2"
                  style="background-color: #ff0050; color: #fff; font-weight: 600; border-radius: 8px; transition: 0.3s;">
            Create Account
          </button>
        </form>

        <div class="text-center mt-4">
          <p class="mb-0 text-light">Already have an account?
            <a href="<?= base_url('login') ?>" style="color: #00f2ea; text-decoration: none;">Log in here</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* Smooth hover for button */
  button.btn:hover {
    background-color: #e6004c !important;
    transform: scale(1.02);
  }

  /* Form input focus effect */
  .form-control:focus, .form-select:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 242, 234, 0.3);
    border-color: #00f2ea;
  }
</style>
<?= $this->endSection() ?>
