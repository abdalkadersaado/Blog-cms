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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_image')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('status_password')->default(0);
            $table->text('bio')->nullable();
            $table->unsignedTinyInteger('receive_email')->default(0);

            //emirates id
            $table->string('emirates_id')->nullable();
            $table->integer('id_number')->nullable();
            $table->string('expiry_date')->nullable();
            // passport
            $table->string('passport_image')->nullable();
            $table->integer('passport_number')->nullable();
            $table->string('release_date')->nullable();
            $table->string('expiry_date_passport')->nullable();

            //معلومات الشركة company's Information
            $table->string('company_name')->nullable();
            $table->integer('license_number')->nullable();
            $table->string('Commercial_Register')->nullable();

            //contract Details
            $table->string('date_contract')->nullable();
            $table->string('contract_pdf')->nullable();
            $table->text('about_company')->nullable();
            $table->text('about_owner_company')->nullable();
            $table->text('partners_company')->nullable();
            //assign_editor
            $table->string('assign_editor')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
