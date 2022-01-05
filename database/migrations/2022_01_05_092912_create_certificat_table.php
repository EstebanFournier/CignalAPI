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
            $table->string('projectName')->unique();
            $table->string('type');
            $table->string('plateform');
            $table->string('description', 555);
            $table->date('startDate');
            $table->date('endDate');
//            $table->file('file');
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
