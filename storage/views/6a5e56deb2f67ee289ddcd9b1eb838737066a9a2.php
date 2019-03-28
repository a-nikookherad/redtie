<?php $__env->startSection('title'); ?>
    index
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    hello world
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\redtie\App\views/index.blade.php */ ?>