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
    Schema::create('calculations', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('target_name');
      $table->decimal('target_amount', 10, 2);
      $table->decimal('monthly_income', 10, 2);
      $table->decimal('personal_monthly_expenses', 10, 2);
      $table->decimal('dependents_cost', 10, 2);
      $table->decimal('monthly_emergency_fund_goal', 10, 2);
      $table->decimal('monthly_debt', 10, 2);
      $table->date('deadline');
      $table->enum('risk_level', ['low', 'medium', 'high']);
      $table->foreignId('user_id')->constrained();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('calculations');
  }
};
