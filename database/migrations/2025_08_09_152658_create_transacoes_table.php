<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('transacoes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // para linkar com usuário
        $table->string('descricao');
        $table->decimal('valor', 10, 2);
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
