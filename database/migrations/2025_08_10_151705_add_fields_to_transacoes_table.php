<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transacoes', function (Blueprint $table) {
            $table->string('cpf')->nullable();
            $table->string('documento')->nullable();
            $table->enum('status', ['Em processamento', 'Aprovada', 'Negada'])->default('Em processamento');
            $table->softDeletes();  // adiciona coluna deleted_at para soft delete
        });
    }

    public function down()
    {
        Schema::table('transacoes', function (Blueprint $table) {
            $table->dropColumn(['cpf', 'documento', 'status', 'deleted_at']);
        });
}

};
