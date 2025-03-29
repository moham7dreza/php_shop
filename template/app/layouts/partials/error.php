<?php
if (flash('validation_error')) { ?>

    <div class="alert alert-danger">
        <h6><?= flash('validation_error') ?></h6>
    </div>

<?php }
?>