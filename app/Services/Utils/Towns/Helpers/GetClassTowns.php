<?php

namespace App\Services\Utils\Towns\Helpers;

use ReflectionClass;
use Illuminate\Support\Facades\File;
use App\Services\Utils\Towns\Interfaces\ExcludeSelectInterface;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
class GetClassTowns
{

    public static function getClassesTowns($folderPath): array
    {

        $classes = [];

        foreach (File::allFiles($folderPath) as $file) {
            $filePath = $file->getRealPath();
            $className = self::getClassNameFromFile($filePath);

            if ($className) {
                $reflection = new ReflectionClass($className);

                if (
                    !$reflection->isAbstract() &&
                    !$reflection->implementsInterface(ExcludeSelectInterface::class) &&
                    !$reflection->implementsInterface(DevelopInterface::class)
                ) {
                    $classes[$reflection->getName()] = $reflection->getShortName();
                }
            }
        }

        return $classes;
    }

    private static function getClassNameFromFile($filePath)
    {

        $content = file_get_contents($filePath);
        $namespace = '';
        $className = '';

        if (preg_match('/namespace\s+(.+?);/', $content, $matches)) {
            $namespace = $matches[1];
        }

        if (preg_match('/class\s+(\w+)/', $content, $matches)) {
            $className = $matches[1];
        }

        return $namespace ? $namespace . '\\' . $className : null;
    }
}
