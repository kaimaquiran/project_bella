<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_type_name')->unique();
            $table->string('account_type_str')->unique();
            $table->timestamps();
        });

         // Populate account types
        $account_types_arr =  array(
            array(
                'account_type_name' => 'Administrator',
                'account_type_str' => 'admin',
                'created_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_type_name' => 'User',
                'account_type_str' => 'user',
                'created_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_type_name' => 'Project Manager',
                'account_type_str' => 'manager',
                'created_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_type_name' => 'Stakeholder',
                'account_type_str' => 'stakeholder',
                'created_at' => date('Y-m-d H:i:s')
            )
        );

        DB::table('account_type')->insert($account_types_arr);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_type');
    }
}
