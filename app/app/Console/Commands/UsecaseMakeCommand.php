<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class UsecaseMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:usecase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Usecase';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Usecase';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $name_input = 'Usecases/' . $this->getNameInput() . 'Usecase';
        $name = $this->qualifyClass($name_input);

        $path = $this->getPath($name);

        if ($this->checkFileExists($name_input)) {
            return;
        }

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));

        $this->info($this->type . ' created successfully.');
    }

    /**
     * Check the file already exists.
     *
     * @param string $name_input
     * @return bool
     */
    private function checkFileExists(string $name_input): bool
    {
        // First we will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((!$this->hasOption('force') ||
                !$this->option('force')) &&
            $this->alreadyExists($name_input)) {
            $this->error($this->type . ' already exists!');

            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/usecase.stub';
    }
}
