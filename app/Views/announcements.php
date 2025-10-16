<?= $this->extend('template') ?>

<?= $this->section('title') ?>Announcements<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Announcements</h1>
        <?php if (session('isLoggedIn') && strtolower(session('role')) === 'admin'): ?>
            <a href="#" class="btn btn-primary">Add New Announcement</a>
        <?php endif; ?>
    </div>

    <?php if (empty($announcements)): ?>
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">No Announcements Yet</h4>
            <p>There are currently no announcements to display. Check back later for updates!</p>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($announcements as $announcement): ?>
                <div class="col-12 mb-3">
                    <div class="card bg-dark text-light border-secondary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <?= esc($announcement['title']) ?>
                            </h5>
                            <p class="card-text">
                                <?= esc($announcement['content']) ?>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Posted on: <?= date('F j, Y \a\t g:i A', strtotime($announcement['date_posted'])) ?>
                                </small>
                            </p>
                            <?php if (session('isLoggedIn') && strtolower(session('role')) === 'admin'): ?>
                                <div class="mt-2">
                                    <button class="btn btn-sm btn-outline-warning me-2">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?= $this->endSection() ?>
