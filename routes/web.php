<?php

use Activities\Admin\Content\PostCategory;
use Activities\Admin\Dashboard;

// index
uri('/admin', Dashboard::class, 'index');

// content
uri('/admin/post-category', PostCategory::class, 'index');


echo '404 - not found!!!';
exit;
