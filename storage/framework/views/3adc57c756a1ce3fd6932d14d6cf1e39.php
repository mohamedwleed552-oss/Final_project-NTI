

<?php $__env->startSection('title', 'manage tags '); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="<?php echo e(route('dashboard.index')); ?>" class="btn btn-secondary">Back to Dashboard</a>
        <h2 class="fw-bold">Manage Tags</h2>
    </div>
    <!-- Add Tag Form -->
    <div class="card-header text-start">
        <h5 class="text-start">Add New Tag</h5>
    </div>
    <div class="card mb-4">
        <div class="card-header text-start">
            <h5 class="text-start">Add New Tag</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('dashboard.tags.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Add</button>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Tag Name" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Tags List -->
    <div class="card">
        <div class="card-header">
            <h5>Tags List</h5>
        </div>
        <div class="card-body">
            <?php if($tags->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped text-start">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Posts Count</th>
                                <th>Created At</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('dashboard.tags.delete', $tag->id)); ?>"
                                            onsubmit="return confirm('Are you sure you want to delete this tag?')" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td><?php echo e($tag->posts_count); ?></td>
                                    <td><?php echo e($tag->created_at->diffForHumans()); ?></td>
                                    <td><?php echo e($tag->name); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted">No tags available.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/dashboard/tags.blade.php ENDPATH**/ ?>