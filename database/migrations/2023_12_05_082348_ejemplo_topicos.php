<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MigrateToNewDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Obtener el nombre de todas las tablas en la base de datos original
        $tables = DB::connection('auto-vex')->getDoctrineSchemaManager()->listTableNames();

        // Iterar sobre cada tabla y copiar la estructura y los datos a la nueva base de datos
        foreach ($tables as $table) {
            Schema::connection('topicos1')->create($table, function ($newTable) use ($table) {
                // Obtener la estructura de la tabla original
                $columns = DB::connection('auto-vex')->getDoctrineSchemaManager()->listTableDetails($table)->getColumns();

                // Crear las columnas en la nueva tabla
                foreach ($columns as $column) {
                    $newTable->{$column->getName()}($column->getType()->getName());
                }
            });

            // Copiar los datos de la tabla original a la nueva tabla
            DB::connection('topicos1')->table($table)->insert(
                DB::connection('auto-vex')->table($table)->get()->toArray()
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Puedes agregar lógica para revertir la migración si es necesario
    }
}
