<?php $__env->startSection('title'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?><?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="mt-5">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
<div class="container mt-3">

    <div class="container mt-5">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card shadow-sm">
                    <div class="card-body" style="width: 18rem;">
                            <img src="<?php echo e(asset('storage/'.$product->img)); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <form action="<?php echo e(route('basket.add')); ?>" method="post" enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>
                                    <input id="product_id" type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                                    <a href="<?php echo e(route('product.show',['product'=>$product->slug])); ?>" class="btn btn"><?php echo e($product->name); ?></a>
                                    <p class="card-text"><?php echo e($product->description); ?></p>
                                    <button type="submit" class="btn btn-primary">В корзину</button>
                                </form>
                            </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/posts/index.blade.php ENDPATH**/ ?>