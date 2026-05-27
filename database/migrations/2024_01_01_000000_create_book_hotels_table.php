<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('book_hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bh_hotel_id')->index()->nullable();
            $table->foreign('bh_hotel_id')->references('id')->on('hotels')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('bh_user_id')->index()->nullable();
            $table->foreign('bh_user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('bh_name', 255)->nullable();
            $table->string('bh_email', 100)->nullable();
            $table->string('bh_phone', 100)->nullable();
            $table->string('bh_address', 255)->nullable();
            $table->date('bh_check_in')->nullable();
            $table->date('bh_check_out')->nullable();
            $table->integer('bh_number_rooms')->default(1);
            $table->bigInteger('bh_price')->default(0);
            $table->text('bh_note')->nullable();
            $table->tinyInteger('bh_status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_hotels');
    }
}
