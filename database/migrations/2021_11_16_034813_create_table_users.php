<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

# 创建的映射
class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建table_users表
        Schema::create('table_users', function (Blueprint $table) {
            $table->increments("id");
            $table->timestamps();
            $table->string('title') ->default('') ->comment('标题');
            $table->string('slug')->nullable() ->comment('盐值');;
            $table->text('body')->nullable() ->comment('body');;
            $table->string('image')->nullable()->comment('图片');;
            $table->integer('user_id') ->comment('关联到user表');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_users');
    }
}
