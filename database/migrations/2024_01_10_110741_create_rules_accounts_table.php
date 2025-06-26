<?php

use App\Models\Account;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rules_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignIdFor(Account::class, 'primary_account_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Account::class, 'counterparty_account_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('rules_accounts');
    }
};
