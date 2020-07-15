<?php $__env->startSection('content'); ?>
    <div class="sdarea" id="sdarea">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if( $myuserid==$post->user_id ): ?>
            <div class="sdbox" id="<?php echo e($post->id); ?>">
                <div class="iconbox">
                    <form action="<?php echo e(url('person')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="log_userid" value="<?php echo e($post->user->id); ?>">
                        <button type="submit" class="submitButton">
                            <img src="<?php echo e($post->user->icon_url); ?>" class="icon">
                        </button>
                    </form>
                </div>

                <div class="sdchild">
                    <div class="sdinfo">
                        <form action="<?php echo e(url('person')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="log_userid" value="<?php echo e($post->user->id); ?>">
                            <button type="submit" class="submitButton">
                                <div class="uname"><?php echo e($post->user->name); ?></div>
                            </button>
                        </form>
                        <form action="<?php echo e(url('postedit'.$post->id)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="edit">
                            </button>
                        </form>
                        <form action="<?php echo e(url('post/delete/'.$post->id)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button type="submit" class="delete btn-dell" onClick="deletePost(this);">
                            </button>
                        </form>
                        <form action="<?php echo e(url('/bookmark')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                            <button type="submit" class="bukuma" >
                            </button>
                        </form>
                    </div>
                    <div class="uspot"><?php echo e($post->spot); ?> にて</div>
                    <div class="ulog"><?php echo e($post->log); ?></div>
                    <div class="ufeel"><?php echo e($post->feel); ?></div>
                    <div class="udate"><?php echo e($post->created_at); ?></div>
                </div>
            </div>
        <?php else: ?>
            <div class="sdbox" id="<?php echo e($post->id); ?>">
            <div class="iconbox">
                <?php if( $post->user->icon_url == null ): ?>
                    <form action="<?php echo e(url('person')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="log_userid" value="<?php echo e($post->user->id); ?>">
                        <button type="submit" class="submitButton">
                            <div class="uicon"></div>
                        </button>
                    </form>
                <?php else: ?>
                <form action="<?php echo e(url('person')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="log_userid" value="<?php echo e($post->user->id); ?>">
                    <button type="submit" class="submitButton">
                        <img src="<?php echo e($post->user->icon_url); ?>" class="icon">
                    </button>
                </form>
                <?php endif; ?>
            </div>
                <div class="sdchild">
                    <div class="sdinfo">
                        <form action="<?php echo e(url('person')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="log_userid" value="<?php echo e($post->user->id); ?>">
                            <button type="submit" class="submitButton">
                                <div class="uname"><?php echo e($post->user->name); ?></div>
                            </button>
                        </form>

                        <form action="<?php echo e(url('/bookmark')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                            <button type="submit" class="bukuma" >
                            </button>
                        </form>

                    </div>
                    <div class="uspot"><?php echo e($post->spot); ?> にて</div>
                    <div class="ulog"><?php echo e($post->log); ?></div>
                    <div class="ufeel"><?php echo e($post->feel); ?></div>
                    <div class="udate"><?php echo e($post->created_at); ?></div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    $(window).on('load',function(){
        $(".tab1").attr("src","css/img/homee.png");
    });

    // 投稿削除確認
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/shisha_/cms/resources/views/hometl.blade.php ENDPATH**/ ?>