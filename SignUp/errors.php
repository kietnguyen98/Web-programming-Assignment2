<?php if (count($error) > 0): ?>
        <?php foreach ($error as $e): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $e; ?></strong></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        <?php endforeach ?>
    </div>
<?php endif ?>
