

<?php $__env->startSection('title', 'Dashboard '); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-end align-items-center mb-4">
        <h2>Dashboard</h2>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body text-center">
                    <h3><?php echo e($stats['posts']); ?></h3>
                    <p>Posts</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <h3><?php echo e($stats['categories']); ?></h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body text-center">
                    <h3><?php echo e($stats['tags']); ?></h3>
                    <p>Tags</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body text-center">
                    <h3><?php echo e($stats['users']); ?></h3>
                    <p>Users</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card text-start">
                <div class="card-body">
                    <h5>Site Management</h5>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <a href="<?php echo e(route('dashboard.categories')); ?>" class="btn btn-outline-primary w-100">Manage
                                Categories</a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo e(route('dashboard.tags')); ?>" class="btn btn-outline-success w-100">Manage Tags</a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo e(route('dashboard.posts')); ?>" class="btn btn-outline-warning w-100">Manage Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/dashboard/index.blade.php ENDPATH**/ ?>