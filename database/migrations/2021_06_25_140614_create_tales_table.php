<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tales', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('contents');
            $table->boolean('active')->default(false);
            $table->string('background_color',7)->default('#FFFFFF');
            $table->string('font_color',7)->default('#000000');
            //$table->unsignedBigInteger('user_owner');
            //$table->foreign('user_owner')->references('id')->on('users')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('categories_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tales');
    }
}
