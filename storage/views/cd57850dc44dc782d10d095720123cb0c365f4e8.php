<?php $__env->startSection('title'); ?>
  home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(isset($name)): ?>
        <?php
        print_r($name);
        ?>
    <?php endif; ?>
    <br>
    <?php if(isset($family)): ?>
        <?php
            print_r($family);
        ?>
    <?php endif; ?>
    <br>
    <?php if(isset($age)&&count($age)>=1): ?>
        <?php $__currentLoopData = $age; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($item); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <br>
    <p>i am home</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.default", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\redtie\App\views/home/home.blade.php */ ?>