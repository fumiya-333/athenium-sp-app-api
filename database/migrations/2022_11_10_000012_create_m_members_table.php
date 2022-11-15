<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('m_members', function (Blueprint $table) {
            $table
                ->uuid('m_member_id')
                ->primary()
                ->comment('会員ID');
            $table->string('first_name')->comment('名');
            $table->string('last_name')->comment('姓');
            $table->string('first_name_kana')->comment('名（カナ）');
            $table->string('last_name_kana')->comment('姓（カナ）');
            $table->string('email')->comment('メールアドレス');
            $table
                ->string('birth_year')
                ->nullable()
                ->comment('生年月日（年） yyyy');
            $table
                ->string('birth_month')
                ->nullable()
                ->comment('生年月日（月）');
            $table
                ->string('birth_date')
                ->nullable()
                ->comment('生年月日（日）');
            $table
                ->string('address')
                ->nullable()
                ->comment('住所');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('m_members');
    }
};
