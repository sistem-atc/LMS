<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

trait Blameable
{

    public static function bootBlameable()
    {
        static::checkBlameableColumns();

        static::creating(function ($model) {
            $createdByAttribute = Config::get('blameable.column_names.createdByAttribute', 'created_by');
            $model->$createdByAttribute = Auth::id();
        });

        static::updating(function ($model) {
            $updatedByAttribute = Config::get('blameable.column_names.updatedByAttribute', 'updated_by');
            $model->$updatedByAttribute = Auth::id();
        });

        if (static::usesSoftDelete()) {
            static::deleting(function ($model) {
                $deletedByAttribute = Config::get('blameable.column_names.deletedByAttribute', 'deleted_by');
                $model->$deletedByAttribute = Auth::id();
                $model->save();
            });
        }

        if (static::usesSoftDelete()) {
            static::restoring(function ($model) {
                $restoredByAttribute = Config::get('blameable.column_names.restoredByAttribute', 'restored_by');
                $model->$restoredByAttribute = Auth::id();
                $model->save();
            });
        }
    }

    public static function checkBlameableColumns()
    {
        $table = (new static)->getTable();
        $createdByAttribute = Config::get('blameable.column_names.createdByAttribute', 'created_by');
        $updatedByAttribute = Config::get('blameable.column_names.updatedByAttribute', 'updated_by');
        $deletedByAttribute = Config::get('blameable.column_names.deletedByAttribute', 'deleted_by');
        $restoredByAttribute = Config::get('blameable.column_names.restoredByAttribute', 'restored_by');
        if (
            !Schema::hasColumn($table, $createdByAttribute)
            && !Schema::hasColumn($table, $updatedByAttribute)
            && !Schema::hasColumn($table, $deletedByAttribute)
            && !Schema::hasColumn($table, $restoredByAttribute)
        ) {
            //
        }
    }

    public static function addBlameableColumns()
    {
        $table = (new static)->getTable();
        $createdByAttribute = Config::get('blameable.column_names.createdByAttribute', 'created_by');
        $updatedByAttribute = Config::get('blameable.column_names.updatedByAttribute', 'updated_by');
        $deletedByAttribute = Config::get('blameable.column_names.deletedByAttribute', 'deleted_by');
        $restoredByAttribute = Config::get('blameable.column_names.restoredByAttribute', 'restored_by');
        if (
            !Schema::hasColumn($table, $createdByAttribute)
            && !Schema::hasColumn($table, $updatedByAttribute)
            && !Schema::hasColumn($table, $deletedByAttribute)
            && !Schema::hasColumn($table, $restoredByAttribute)
        ) {
            Schema::table($table, function (Blueprint $table) {
                $table->blameable();
            });
        }
    }

    public function creator()
    {
        $userModel = Config::get('blameable.models.user', User::class);
        return $this->belongsTo($userModel, 'created_by', 'id');
    }

    public function editor()
    {
        $userModel = Config::get('blameable.models.user', User::class);
        return $this->belongsTo($userModel, 'updated_by', 'id');
    }

    public function deletor()
    {
        $userModel = Config::get('blameable.models.user', User::class);
        return $this->belongsTo($userModel, 'deleted_by', 'id');
    }


    public function restorer()
    {
        $userModel = Config::get('blameable.models.user', User::class);
        return $this->belongsTo($userModel, 'restored_by', 'id');
    }

    protected static function usesSoftDelete()
    {
        static $softDelete;

        if (is_null($softDelete)) {
            $instance = new static;
            return $softDelete = method_exists($instance, 'bootSoftDeletes');
        }

        return $softDelete;
    }
}
