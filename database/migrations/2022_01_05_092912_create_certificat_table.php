<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('certificat', function (Blueprint $table) {
            $table->id();
            $table->string('projectName')->nullable()->unique();
            $table->string('type')->nullable();
            $table->string('plateform')->nullable();
            $table->string('description', 555)->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->unsignedBigInteger('createdBy')->nullable();
            $table->foreign('createdBy')->references('id')->on('users');
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
        Schema::dropIfExists('certificat');
    }
}
