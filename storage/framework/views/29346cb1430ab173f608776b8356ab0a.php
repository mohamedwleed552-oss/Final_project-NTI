

<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body text-start">
        <h1 class="card-title"><?php echo e($post->title); ?></h1>
        <div class="mb-3">
            <span class="badge bg-secondary"><?php echo e($post->category->name); ?></span>
            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge bg-info text-dark"><?php echo e($tag->name); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <p class="card-text"><?php echo e($post->content); ?></p>
        <small class="text-muted">
            By: <?php echo e($post->user->name); ?> | <?php echo e($post->created_at->diffForHumans()); ?>

        </small>
    </div>
</div>

<!-- Comments Section -->
<div class="mt-4 text-start">
    <h4>Comments (<?php echo e($post->comments->count()); ?>)</h4>
    
    <?php if(auth()->guard()->check()): ?>
        <div class="card mt-3">
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('posts.comments.store', $post->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="content" class="form-label">Add a Comment</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
    
    <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text"><?php echo e($comment->content); ?></p>
                <small class="text-muted">
                    By: <?php echo e($comment->user->name); ?> | <?php echo e($comment->created_at->diffForHumans()); ?>

                </small>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php if($post->comments->count() == 0): ?>
        <p class="text-muted mt-3">No comments yet.</p>
    <?php endif; ?>
</div>

<div class="mt-4 text-start">
    <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary">Back to Posts</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/posts/show.blade.php ENDPATH**/ ?>