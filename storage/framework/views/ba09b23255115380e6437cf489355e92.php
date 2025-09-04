

<?php $__env->startSection('title', 'manage Categories '); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-4 text-start">
        <div class="card-header">
            <h5>Add New Category</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('dashboard.categories.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Add</button>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Category Name" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories List -->
    <div class="card text-start">
        <div class="card-header">
            <h5>Categories List</h5>
        </div>
        <div class="card-body">
            <?php if($categories->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Posts Count</th>
                                <th>Created At</th>
                                <th class="text-start">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('dashboard.categories.delete', $category->id)); ?>"
                                            onsubmit="return confirm('Are you sure you want to delete this category?')"
                                            class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td><?php echo e($category->posts_count); ?></td>
                                    <td><?php echo e($category->created_at->diffForHumans()); ?></td>
                                    <td class="text-start"><?php echo e($category->name); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted">No categories available.</p>
            <?php endif; ?>
        </div>
    </div>

< <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/dashboard/categories.blade.php ENDPATH**/ ?>