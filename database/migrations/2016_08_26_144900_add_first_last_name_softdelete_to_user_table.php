<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstLastNameSoftdeleteToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function(Blueprint $table)
        {
            $table->softDeletes();
            $table->string('first_name')->after('name')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->integer('age')->after('last_name')->default(0);
        });
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropSoftDeletes();
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('age');
        });
        Schema::table('users', function(Blueprint $table)
        {
            $table->string('name')->after('id')->nullable();
        });
    }
}
