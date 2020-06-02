<?php $__env->startSection('content'); ?>
<!-- <body> -->
    <?php if($errors->any()): ?>
    <div class="errors">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="memofield">
        <form action="<?php echo e(url('/account/upload')); ?>" method="post" enctype="multipart/form-data" class="memo">
            <?php echo e(csrf_field()); ?>

            <h1 class="memotitle">Name</h1>
            <input type="text" name="name" class="input spot" value="<?php echo e($name); ?>">

            <!-- <h1 class="memotitle">Icon</h1>
            <div class="form-group">
                <input id="fileUploader" type="file" name="img" accept='image/*' enctype="multipart/form-data" multiple="multiple" required autofocus class="account">
            </div> -->
            <a href="hometl">
                <button type="button" class="btn btn-default submit-btn">Cancel</button>
            </a>
            <button type="submit" class="btn btn-primary submit-btn s-b-save">Save</button>
        </form>
    </div>
    
<!-- </body> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/shisha_/cms/resources/views/account.blade.php ENDPATH**/ ?>