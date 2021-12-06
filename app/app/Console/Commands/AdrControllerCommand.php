<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AdrControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:controller-adr {className} {--u|usecase}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new controller with adr pattern';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'adr-controller';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $name = $this->argument('className');


        $this->call("make:responder", [
            'name' => $name
        ]);
        $this->call("make:action", [
            'name' => $name,
            '-u' => $this->option('usecase')
        ]);

        if (!$this->option('usecase')) {
            return;
        }

        $usecaseError = $this->call('make:usecase', [
            'name' => $name
        ]);
    }
}
