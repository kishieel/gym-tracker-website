<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameWorkoutsToWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('workouts', 'workouts');
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropForeign('workouts_user_id_foreign');
            $table->dropForeign('workouts_exercise_id_foreign');

            $table->foreign('exercise_id', 'workouts_exercise_id_foreign')
                ->references('id')
                ->on('exercises')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('user_id', 'workouts_user_id_foreign')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('workouts', 'workouts');
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropForeign('workouts_user_id_foreign');
            $table->dropForeign('workouts_exercise_id_foreign');

            $table->foreign('exercise_id', 'workouts_exercise_id_foreign')
                ->references('id')
                ->on('exercises')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('user_id', 'workouts_user_id_foreign')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }
}
