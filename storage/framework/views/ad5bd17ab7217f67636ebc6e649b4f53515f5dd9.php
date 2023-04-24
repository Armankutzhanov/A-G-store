<?php $__env->startSection('title'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?><?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



    <div class="container">
        <main class="form-signin w-100 m-auto">

            <form method="post" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <h1 class="h3 mb-3 mt-3 fw-normal text-center">Авторизация</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control mb-3" id="password" name="password">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>

            </form>
        </main>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/user/login.blade.php ENDPATH**/ ?>