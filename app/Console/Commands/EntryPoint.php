<?php

namespace App\Console\Commands;

use Filament\Facades\Filament;
use Illuminate\Console\Command;

class EntryPoint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:entry-point';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command by create new entry point for the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $selectedPanel = $this->choice(
            'Select the module to create an entry point for',
            collect(Filament::getPanels())->keys()->toArray(),
            0
        );

        $models = collect(Filament::getPanel($selectedPanel)->getResources())
            ->map(fn($resource) => $resource::getModel())
            ->unique()
            ->values();

        $labels = $models->map(fn($model, $index) => class_basename($model))->toArray();

        $selectedModel = $this->choice(
            'Select the model to create an entry point for',
            $labels,
            0
        );

        $classPath = app_path("EntryPoints/$selectedModel.php");
        $stubPath = app_path('stubs/entry-point.stub');

        if (file_exists($classPath)) {
            $this->warn("Entry point for $selectedModel already exists.");
            return Command::FAILURE;
        }

        $stub = file_get_contents($stubPath);

        $content = str_replace(
            ['{{ class }}'],
            [$selectedModel],
            $stub
        );

        file_put_contents($classPath, $content);

        $this->info("Entry point class {$selectedModel} created successfully at: {$classPath}");

        return Command::SUCCESS;

    }
}
