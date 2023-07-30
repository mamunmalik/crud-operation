<?php

namespace Mamunmalik\CrudOperation;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class CrudOperationService
{

    protected static function GetStubs($type)
    {
        return file_get_contents(base_path("resources/crud-operation/") . $type . ".stub");
    }

    protected static function GetViewStubs($type)
    {
        return file_get_contents(base_path("resources/crud-operation/views/") . $type . ".stub");
    }

    /**
     * @param $name
     * This will create controller from stub file
     */
    public static function MakeController($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],

            CrudOperationService::GetStubs('controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $template);
    }

    /**
     * @param $name
     * This will create model from stub file
     */
    public static function MakeModel($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            CrudOperationService::GetStubs('model')
        );

        file_put_contents(app_path("/Models/{$name}.php"), $template);
    }

    /**
     * @param $name
     * This will create Request from stub file
     */
    public static function MakeRequest($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            CrudOperationService::GetStubs('request')
        );

        if (!file_exists($path = app_path('/Http/Requests/')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $template);
    }

    /**
     * @param $name
     * This will create migration using artisan command
     */
    public static function MakeMigration($name)
    {
        $template = str_replace(
            ['{{modelNamePluralLowerCase}}'],
            [strtolower(Str::plural($name))],
            CrudOperationService::GetStubs('migration')
        );

        file_put_contents(database_path("/migrations/") . date('Y_m_d_His') . '_create_' . strtolower(Str::plural($name)) . '_table.php', $template);
        // Artisan::call('make:migration create_' . strtolower(Str::plural($name)) . '_table --create=' . strtolower(Str::plural($name)));
    }

    /**
     * @param $name
     * This will create route in web.php file
     */
    public static function MakeRoute($name)
    {
        $path_to_file  = base_path('routes/web.php');
        $append_route = 'Route::resource(\'' . Str::plural(strtolower($name)) . "', '{$name}Controller'); \n";
        File::append($path_to_file, $append_route);
    }

    /**
     * @param $name
     * This will create view from stub file
     */
    public static function MakeView($name)
    {
        $viewMethods = ["index", "create", "edit", "show"];
        foreach ($viewMethods as $key => $value) {
            $template = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                ],
                [
                    $name,
                    strtolower(Str::plural($name)),
                    strtolower($name)
                ],
                CrudOperationService::GetViewStubs($value)
            );

            if (!file_exists($path = base_path("resources/views/" . strtolower(Str::plural($name)) . "/")))
                mkdir($path, 0777, true);

            file_put_contents(base_path("resources/views/" . strtolower(Str::plural($name)) . "/" . $value  . ".blade.php"), $template);
        }
    }
}
