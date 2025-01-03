<?php include_once APPROOT . '/views/inc/header.php'; ?>

<div class="mt-5">
    <h2><?php echo $data->title ?></h2>
</div>
<div class="border rounded p-3 m-2">
    <?php echo $data->content; ?>
</div>
<?php if($data->user_id == $_SESSION['user_id']): ?>
    <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data->id ?>" class="btn btn-info">Edit</a>
    <a href="<?php echo URLROOT ?>/posts/delete/<?php echo $data->id ?>" class="btn btn-danger">Delete</a>
<?php endif; ?>
<?php include_once APPROOT . '/views/inc/footer.php'; ?>