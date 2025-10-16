<?= $this->extend('template') ?>

<?= $this->section('title') ?>Teacher Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Teacher Dashboard</h1>
        <div>
            <a href="/announcements" class="btn btn-primary me-2">View Announcements</a>
            <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="alert alert-info" role="alert">
        Welcome, <?= esc($user_name ?? 'Teacher') ?>!<br>
        <small class="text-muted">Email: <?= esc($user_email ?? '') ?> | Role: <?= esc($role ?? '') ?></small>
    </div>

    <?php if (isset($error)): ?>
        <div class="alert alert-warning" role="alert">
            <strong>Notice:</strong> <?= esc($error) ?>
        </div>
    <?php endif; ?>



    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Teacher Dashboard</h5>
            <p class="card-text">Welcome to your teacher dashboard! Here you can manage your courses, view student submissions, and track your teaching activities.</p>

            <div class="mt-4">
                <h6>Quick Actions:</h6>
                <div class="d-flex gap-2 mt-2 flex-wrap">
                    <a href="/announcements" class="btn btn-primary">View Announcements</a>
                    <button class="btn btn-secondary" disabled>Manage Courses (Coming Soon)</button>
                    <button class="btn btn-secondary" disabled>View Students (Coming Soon)</button>
                    <button class="btn btn-secondary" disabled>Grade Submissions (Coming Soon)</button>
                </div>
            </div>

            <div class="mt-4">
                <h6>Teaching Tools:</h6>
                <div class="d-flex gap-2 mt-2 flex-wrap">
                    <button class="btn btn-info" disabled>Create Assignment (Coming Soon)</button>
                    <button class="btn btn-success" disabled>View Reports (Coming Soon)</button>
                    <button class="btn btn-warning" disabled>Course Materials (Coming Soon)</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
