

<?php $__env->startSection('title', 'manage posts '); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4 text-start">
        <a href="<?php echo e(route('dashboard.index')); ?>" class="btn btn-secondary">Back to Dashboard</a>
        <h2>Manage Posts</h2>
    </div>
    <div class="card-body">
        <?php if($posts->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-sm btn-info">View</a>
                                    <form method="POST" action="<?php echo e(route('dashboard.posts.delete', $post->id)); ?>"
                                        onsubmit="return confirm('Are you sure you want to delete this post?')" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td><?php echo e($post->user->name); ?></td>
                                <td><?php echo e($post->category->name); ?></td>
                                <td><?php echo e($post->created_at->diffForHumans()); ?></td>
                                <td>
                                    <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="text-decoration-none">
                                        <?php echo e(Str::limit($post->title, 50)); ?>

                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <?php echo e($posts->links()); ?>

            </div>
        <?php else: ?>
            <p class="text-muted">No posts available.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/dashboard/posts.blade.php ENDPATH**/ ?>