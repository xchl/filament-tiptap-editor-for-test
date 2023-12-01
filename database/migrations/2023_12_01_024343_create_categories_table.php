<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', static function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false)->default('')->comment('标签名称');
            $table->string('slug', 255)->nullable(false)->default('')->comment('标签别名');
            $table->string('icon', 255)->nullable(false)->default('')->comment('icon');
            $table->string('description', 255)->nullable(false)->default('')->comment('标签描述');
            $table->integer('order')->nullable(false)->default(0)->comment('排序');
            $table->tinyInteger('is_show', false, true)->nullable(false)->default(0)->comment('是否显示');
            $table->integer('operator_id',false,true)->nullable(false)->default(0)->comment('操作人');
            $table->timestamps();
            $table->nestedSet();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
