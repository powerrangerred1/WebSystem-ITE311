<?= $this->extend('template') ?>

<?= $this->section('title') ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Admin Dashboard</h1>
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
        Welcome, <?= esc($user_name ?? 'Admin') ?>!<br>
        <small class="text-muted">Email: <?= esc($user_email ?? '') ?> | Role: <?= esc($role ?? '') ?></small>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="h2 mb-0 text-primary"><?= (int)($totalUsers ?? 0) ?></div>
                    <div class="text-muted">Total Users</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="h2 mb-0 text-warning"><?= (int)($totalTeachers ?? 0) ?></div>
                    <div class="text-muted">Teachers</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="h2 mb-0 text-success"><?= (int)($totalStudents ?? 0) ?></div>
                    <div class="text-muted">Students</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="h2 mb-0 text-info"><?= (int)($totalAdmins ?? 0) ?></div>
                    <div class="text-muted">Admins</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white fw-bold">Recent Users</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($recentUsers)): foreach ($recentUsers as $user): ?>
                            <tr>
                                <td><?= esc($user['name'] ?? '') ?></td>
                                <td><?= esc($user['email'] ?? '') ?></td>
                                <td><span class="badge bg-secondary text-capitalize"><?= esc($user['role'] ?? '') ?></span></td>
                                <td><?= isset($user['created_at']) ? date('M d, Y', strtotime($user['created_at'])) : 'N/A' ?></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="4" class="text-center text-muted">No recent users.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Admin Dashboard</h5>
            <p class="card-text">Welcome to your admin dashboard! Here you can manage users, view system statistics, and access administrative functions.</p>

            <div class="mt-4">
                <h6>Quick Actions:</h6>
                <div class="d-flex gap-2 mt-2 flex-wrap">
                    <a href="/announcements" class="btn btn-primary">View Announcements</a>
                    <button class="btn btn-secondary" disabled>Manage Users (Coming Soon)</button>
                    <button class="btn btn-secondary" disabled>System Settings (Coming Soon)</button>
                    <button class="btn btn-secondary" disabled>View Reports (Coming Soon)</button>
                </div>
            </div>

            <div class="mt-4">
                <h6>Administration:</h6>
                <div class="d-flex gap-2 mt-2 flex-wrap">
                    <button class="btn btn-warning" disabled>Create Announcement (Coming Soon)</button>
                    <button class="btn btn-info" disabled>Manage Courses (Coming Soon)</button>
                    <button class="btn btn-success" disabled>User Statistics (Coming Soon)</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
