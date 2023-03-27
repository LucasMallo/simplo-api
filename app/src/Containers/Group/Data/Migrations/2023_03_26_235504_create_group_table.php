<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {     
        Schema::create('group', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('_created')->useCurrent();
            $table->timestamp('_updated')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('_deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group');
    }
}
