<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('subheading',50);
            $table->foreignId('productCategories_id')->constrained('productCategories');
            $table->text('description');
            $table->text('application');
            $table->text('composition');
            $table->string('applicationArea', 10);
            $table->string('purpose', 50);
            $table->string('targetAudience', 10);
            $table->float('price', 8, 2);
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
        Schema::dropIfExists('products');
    }
};
