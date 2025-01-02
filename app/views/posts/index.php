<?php include_once APPROOT . '/views/inc/header.php'; ?>
<div class="row mt-4">
    <div class="col-md-6">
        <h2>Posts</h2>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>posts/add" class="btn btn-info float-right">Add Post</a>
    </div>

    <div class="p-2">
        <?php foreach($data as $post):?>
            <div class="card card-body">
                <span class="card-title"><?php echo $post->title ?></span>
                <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->id ?>" class="btn btn-dark">Read More</a>
            </div>
        <?php endforeach; ?>    
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.php'; ?>