<?php include_once APPROOT . '/views/inc/header.php'; ?>

<div class="mt-5">
    <h2><?php echo $data->title ?></h2>
</div>
<div class="border rounded p-3">
    <?php echo $data->content; ?>
</div>
<?php include_once APPROOT . '/views/inc/footer.php'; ?>