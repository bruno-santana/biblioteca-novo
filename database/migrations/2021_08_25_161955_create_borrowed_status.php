<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('libro_id');
            $table->enum('status',['DISPONIVEL','EMPRESTADO','ATRASADO']);
            $table->timestamps();

            $table->foreign('libro_id')->references('id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowed_status');
    }
}
