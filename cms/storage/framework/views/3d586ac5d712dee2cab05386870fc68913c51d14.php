<?php $__env->startSection('content'); ?>
<div class="memofield">
    <form action="<?php echo e(url('post/update')); ?>" method="POST" enctype="multipart/form-data" class="memo">
        <?php echo e(csrf_field()); ?>

        <h1 class="memotitle">Spot</h1>
        <input type="text" name="spot" class="input spot" value="<?php echo e($post->spot); ?>">
        <h1 class="memotitle">Flavor</h1>
        <div class="tabox">
            <textArea name="log" placeholder="フレーバーを書き留める" class="log"><?php echo e($post->log); ?></textArea>
        </div>
        <h1 class="memotitle">Feel</h1>
        <div class="tabox">
            <textArea name="feel" placeholder="感動を表現する" class="feel"><?php echo e($post->feel); ?></textArea>
        </div>
        <input type="hidden" name="id" value="<?php echo e($post->id); ?>"> 
        <input type="submit" value="Save" class="btn btn-primary submit-btn">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/shisha_/cms/resources/views/edit.blade.php ENDPATH**/ ?>