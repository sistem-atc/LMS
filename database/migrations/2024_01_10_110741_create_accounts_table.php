<?php

use App\Enums\AccountType;
use App\Models\Costcenter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('description');
            $table->enum('type', array_column(AccountType::cases(), 'value'));
            $table->foreignIdFor(Costcenter::class)->constrained()->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
