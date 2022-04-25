<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert', function (Blueprint $table) {
            $table->id();
            $table->date('dateAlert');
            $table->string('nameAlert');
            $table->unsignedBigInteger('certificat_id')->nullable();
            $table->foreign('certificat_id')->references('id')->on('certificat');
            $table->string('description', 555);
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
        Schema::dropIfExists('alert');
    }
}
