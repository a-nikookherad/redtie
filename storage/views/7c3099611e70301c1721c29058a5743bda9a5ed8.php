<?php $__env->startSection('title'); ?>
<?php echo e('dashboard'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin' , \Illuminate\Support\Arr::except(get_defined_vars() , ['__data' , '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\redtie\App\Views/admin/dashboard.blade.php */ ?>