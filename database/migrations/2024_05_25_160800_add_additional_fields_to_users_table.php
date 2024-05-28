<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //ph $table->string('surname');
           // $table->date('date_of_birth');
            //$table->string('phone');
            //$table->string('address');
            //$table->string('license_number');
            //$table->string('golf_index');
            //$table->string('avatar')->nullable();
            //$table->boolean('is_admin')->default(0);
           // $table->string('password'); // Ajoute le champ password
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'surname', 'date_of_birth', 'phone', 'address', 
                'license_number', 'golf_index', 'avatar', 'is_admin',
                'password' // Supprime le champ password lors du rollback
            ]);
        });
    }
}
