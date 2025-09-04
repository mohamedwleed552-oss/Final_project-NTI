

<?php $__env->startSection('title', 'Posts List'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-start">All Posts</h2>
    <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">Create New Post</a>
    <?php endif; ?>
</div>

<?php if($posts->count() > 0): ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card text-start mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="text-decoration-none"><?php echo e($post->title); ?></a>
                </h5>
                <p class="card-text"><?php echo e(Str::limit($post->content, 200)); ?></p>
                
                <div class="mb-2">
                    <span class="badge bg-secondary"><?php echo e($post->category->name); ?></span>
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag"><?php echo e($tag->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <small class="text-muted">
                    By: <?php echo e($post->user->name); ?> | <?php echo e($post->created_at->diffForHumans()); ?>

                </small>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <div class="mt-4">
        <?php echo e($posts->links()); ?>

    </div>
<?php else: ?>
    <div class="alert alert-info text-start">
        <h4>No Posts Available</h4>
        <p>Be the first to create a post!</p>
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">Create Post</a>
        <?php endif; ?>
    </div>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/posts/index.blade.php ENDPATH**/ ?>