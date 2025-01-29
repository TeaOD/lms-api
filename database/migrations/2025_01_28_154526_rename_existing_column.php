/************************************************
*                                               *
*       This migration will rename a column     *
*       of an existing table in the database.   *
*                                               *                     
*************************************************/

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameExistingColumn extends Migration
{
    public function up()
    {
        Schema::table('tableName', function (Blueprint $table) {    // Replace tableName with the name of the table
            $table->renameColumn('OldName', 'NewName');  // Rename the column OldName to NewName
        });
    }
};
