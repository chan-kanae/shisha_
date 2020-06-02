<?php $__env->startSection('content'); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="sdarea" id="sdarea">
    <?php $__currentLoopData = $myposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mypost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="sdbox" id="<?php echo e($mypost->id); ?>">
                <div class="iconbox">
                    <form action="<?php echo e(url('person')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="log_userid" value="<?php echo e($mypost->user->id); ?>">
                        <button type="submit" class="">
                            <img src="<?php echo e($mypost->user->icon_url); ?>" class="icon">
                        </button>
                    </form>
                </div>
            <div class="sdchild">
                <div class="sdinfo">
                    <form action="<?php echo e(url('person')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="log_userid" value="<?php echo e($mypost->user->id); ?>">
                            <button type="submit" class="">
                                <div class="uname"><?php echo e($mypost->user->name); ?></div>
                            </button>
                        </form>
                    <form action="<?php echo e(url('post/edit/'.$mypost->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="edit">
                        </button>
                    </form>
                    <form action="<?php echo e(url('post/delete/'.$mypost->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                        <button type="submit" class="delete btn-dell" onClick="deletePost(this);">
                        </button>
                    </form>
                    <form action="<?php echo e(url('/bookmark')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="bukuma" >
                        </button>
                    </form>
                </div>
                <div class="uspot"><?php echo e($mypost->spot); ?> にて</div>
                <div class="ulog"><?php echo e($mypost->log); ?></div>
                <div class="ufeel"><?php echo e($mypost->feel); ?></div>
                <div class="udate"><?php echo e($mypost->created_at); ?></div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    // メニューバー色変更
    $(window).on('load',function(){
        $(".mpi").attr("src","css/img/humann.png");
    });

    $( function() {
        $(".btn-dell").click( function() {
            if( confirm ("本当に削除しますか？") ) {
            } else {
            return false;
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/shisha_/cms/resources/views/mypage.blade.php ENDPATH**/ ?>