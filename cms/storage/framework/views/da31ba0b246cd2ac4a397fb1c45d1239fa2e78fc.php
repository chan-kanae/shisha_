<?php $__env->startSection('content'); ?>
<div class="memofield">
    <form action="<?php echo e(url('post/input')); ?>" method="post" enctype="multipart/form-data" class="memo">
    <?php echo e(csrf_field()); ?>

        <h1 class="memotitle">Spot</h1>
        <input type="text" name="spot" class="input spot">
        <h1 class="memotitle">Flavor</h1>
        <div class="tabox">
            <textArea name="log" placeholder="フレーバーを書き留める" class="log" id="search"></textArea>
        </div>                
        <h1 class="memotitle">Feel</h1>
        <div class="tabox">
            <textArea name="feel" placeholder="感動を表現する" class="feel"></textArea>
        </div>
        <input type="submit" value="Save" class="btn btn-primary submit-btn">
    </form>
</div>

<script>
    $(window).on('load',function(){
        $(".tab2").attr("src","css/img/penf.png");
    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/shisha_/cms/resources/views/index.blade.php ENDPATH**/ ?>