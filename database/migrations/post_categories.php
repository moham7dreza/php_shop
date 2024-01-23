<?php

use Illuminate\Database\Schema\Blueprint;

try {
    Illuminate\Database\Capsule\Manager::schema()->create('post_categories', function (Blueprint $table) {
        $table->engine = 'innodb';
        $table->id();
        $table->string('name', 50)->fulltext();
        $table->string('description')->fulltext();
        $table->string('slug', 50)->nullable();
        $table->text('image')->nullable();
        $table->tinyInteger('status')->default(1)->index();
        $table->timestamps();
    });

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}