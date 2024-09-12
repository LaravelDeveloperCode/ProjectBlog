<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id'); //unsigned o demekdirki bu integer alani minimum sifir ala biler(cunki integer menfi bir deyerde ala biler)
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->integer('hit')->default(0); //Bu baxis sayisi ucundur
            $table->integer('status')->default(0)->comment('0:pasif 1:aktif');
            $table->string('slug');
            $table->softDeletes();  // softDeletes bu özellik, bir kaydı veritabanından tamamen silmek yerine, "silinmiş" olarak işaretler.
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')    //CAtegories cedvelindeki "id" articles cedvelindeki "category_id" ile bagla
                  ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
