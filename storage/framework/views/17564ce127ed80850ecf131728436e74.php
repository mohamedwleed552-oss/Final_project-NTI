

<?php $__env->startSection('title', '  Create new Post '); ?>

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card text-start">

            <div class="card-header">

                <h4>Create Post</h4>

            </div>

            <div class="card-body">

                <form method="POST" action="<?php echo e(route('posts.store')); ?>">

                    <?php echo csrf_field(); ?>

                    <div class="mb-3">

                        <label for="title" class="form-label">Title</label>

                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" required>

                    </div>

                    

                    <div class="mb-3">

                        <label for="content" class="form-label">Content</label>

                        <textarea class="form-control" id="content" name="content" rows="10" required><?php echo e(old('content')); ?></textarea>

                    </div>

                    

                    <div class="mb-3">

                        <label for="category_id" class="form-label">Category</label>

                        <select class="form-control" id="category_id" name="category_id" required>

                            <option value="">Select Category</option>

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>

                                    <?php echo e($category->name); ?>


                                </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                    </div>

                    

                    <div class="mb-3">

                        <label class="form-label">Tags</label>

                        <div class="row">

                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-md-4">

                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>" id="tag<?php echo e($tag->id); ?>"

                                            <?php echo e(is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'checked' : ''); ?>>

                                        <label class="form-check-label" for="tag<?php echo e($tag->id); ?>">

                                            <?php echo e($tag->name); ?>


                                        </label>

                                    </div>

                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Create Post</button>

                    <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary">Cancel</a>

                </form>

            </div>

        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/posts/create.blade.php ENDPATH**/ ?>