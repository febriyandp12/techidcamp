<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); //Login menggunakan OAuth By Google
            $table->string('avatar')->nullable(); //Avatar bersifat optional (defaultnya tidak ada)
            $table->string('occupation')->nullable(); //occupation bersifat optional (defaultnya belum ada)
            $table->boolean('is_admin')->default(false); //bersifat boolean, default false, karena kebanyakan yg regis adalah user
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            //Agar migrate yang dibuat pada file yang sama berhasil gunakan
            //Script : php artisan migrate:fresh
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
