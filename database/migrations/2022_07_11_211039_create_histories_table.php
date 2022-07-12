<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->morphs('historyable');
            $table->string('changed_column');
            $table->text('changed_value_from')->nullable();
            $table->text('changed_value_to')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
