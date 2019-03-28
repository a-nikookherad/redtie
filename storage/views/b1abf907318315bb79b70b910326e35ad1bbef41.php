<?php $__env->startSection('title'); ?>
    404
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bg-danger alert alert-danger alert-dismissible">
        <span class="close">&times;</span>
        <p class="pr-4">
            page not found ERROR:404!
        </p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\redtie\App\views/404/404.blade.php */ ?>