<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('address');
            $table->string('town');
            $table->string('county');
            $table->string('postcode');
            $table->string('telno');
            $table->text('notes')->nullable();
            $table->string('gravatar');
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
        Schema::dropIfExists('customers');
    }
}
