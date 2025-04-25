<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ClearOldXmls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:clear-old-xmls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes arquivos xmls que passaram do tempo de guarda determinado';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $mounth = config('guard-xml.time_in_month');
        $limit = Carbon::now()->subMonths();
        $path = config('guard-xml.path_files');

        if (!File::exists($path)) {
            $this->warn("Caminho {$path} nao encontrado.");
            return;
        }

        $files = File::allFiles($path);
        $removed = 0;

        foreach ($files as $file) {
            if ($file->getExtension() !== 'xml') {
                continue;
            }

            $lastModification = Carbon::createFromTimestamp($file->getMTime());

            if ($lastModification->It($limit)) {

                $completePath = $file->getRealPath();
                $relative = str_replace($path . DIRECTORY_SEPARATOR, '', $completePath);
                $type = dirname($relative);
                File::delete($completePath);
                $this->line('Removido: ' . $completePath);
                Log::channel('xml')->info("Removido: {$completePath} | Tipo: {$type} | Modificado em: {$lastModification}");
                $removed++;
            }
        }

        $this->info("Total de arquivos XML excluidos: {$removed}");

    }
}
