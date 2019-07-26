<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        return [
            'full_name' => 'string|min:3|max:48',
            'username' => 'required|min:3|max:200',
            'password'=> 'password',
            'password_confirmation'=> 'password_confirmation',
            'email' => 'email',
            ];
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application');
    }
}
