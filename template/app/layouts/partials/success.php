<?php
if (flash('success')) { ?>

    <div class="alert alert-success">
        <h6><?= flash('success') ?></h6>
    </div>

<?php }
?>