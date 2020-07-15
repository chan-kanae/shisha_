<?php $__env->startSection('content'); ?>
    <div class="memofield">
        <form action="<?php echo e(url('search')); ?>" method="post" enctype="multipart/form-data" class="memo">
        <?php echo e(csrf_field()); ?>

            <h1 class="memotitle">Keyword</h1>
            <input type="text" name="keyword" class="input spot">
                <input type="submit" value="Search" class="btn btn-success submit-btn">
        </form>
    </div>
<script>
    $(window).on('load',function(){
        $(".searchi").attr("src","css/img/searchf.png");
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/shisha_/cms/resources/views/searchIndex.blade.php ENDPATH**/ ?>