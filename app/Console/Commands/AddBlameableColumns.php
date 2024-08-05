<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class AddBlameableColumns extends Command
{
    protected $signature = 'blameable:add-blameable-columns
        {model : The name of the model}';

    protected $description = 'add blameable columns to eloquent models, by default, created_by, updated_by, deleted_by and restored_by';

    public function handle()
    {
        $model = $this->argument('model');
        $table = (new $model)->getTable();
        $createdByAttribute = Config::get('blameable.column_names.createdByAttribute', 'created_by');
        $updatedByAttribute = Config::get('blameable.column_names.updatedByAttribute', 'updated_by');
        $deletedByAttribute = Config::get('blameable.column_names.deletedByAttribute', 'deleted_by');
        $restoredByAttribute = Config::get('blameable.column_names.restoredByAttribute', 'restored_by');
        if (!Schema::hasColumn($table, $createdByAttribute)
            && !Schema::hasColumn($table, $updatedByAttribute)
            && !Schema::hasColumn($table, $deletedByAttribute)
            && !Schema::hasColumn($table, $restoredByAttribute)) {
            Schema::table($table, function (Blueprint $table) {
                $table->blameable();
            });
        }
        $this->info("Blameable columns for `{$this->argument('model')}` created");
    }
}
