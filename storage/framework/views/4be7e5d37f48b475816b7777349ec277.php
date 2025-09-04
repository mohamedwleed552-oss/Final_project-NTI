<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Posts Website'); ?> - <?php echo $__env->yieldContent('subtitle',); ?> ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
        }

        .card {
            margin-bottom: 20px;
        }

        .tag {
            background-color: #e9ecef;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            margin: 2px;
            display: inline-block;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-end w-100">
            <!-- Links -->
            <div class="navbar-nav d-flex flex-row">
                <?php if(auth()->guard()->check()): ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link nav-link ms-3" style="border: none;">Logout</button>
                    </form>
                    <a class="nav-link ms-3" href="<?php echo e(route('posts.create')); ?>">Create Post</a>
                <?php else: ?>
                    <a class="nav-link ms-3" href="<?php echo e(route('login')); ?>">Login</a>
                    <a class="nav-link ms-3" href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
            </div>

            <!-- Posts Website -->
            <a class="navbar-brand ms-3" href="<?php echo e(route('home')); ?>">Posts Website</a>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mt-4">
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\Users\nourw\Desktop\test\resources\views/layouts/app.blade.php ENDPATH**/ ?>