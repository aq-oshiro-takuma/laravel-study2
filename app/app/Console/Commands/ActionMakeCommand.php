<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Input\InputOption;

class ActionMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:action';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Action Controller';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Action';

    /**
     * Execute the console command.
     *
     * @return void
     * @throws FileNotFoundException
     */
    public function handle(): void
    {
        $name_input = 'Http/Controllers/' . $this->getNameInput() . 'Action';
        $name = $this->qualifyClass($name_input);
        $usecase_name_input = 'Usecases/' . $this->getNameInput() . 'Usecase';
        $usecase_name = $this->qualifyClass($usecase_name_input);
        $responder_name_input = 'Http/Responders/' . $this->getNameInput() . 'Responder';
        $responder_name = $this->qualifyClass($responder_name_input);


        $path = $this->getPath($name);

        if ($this->checkFileExists($name_input)) {
            return;
        }

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildActionClass($name, $usecase_name, $responder_name)));

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
     * Build the class with the given name.
     *
     * @param string $name
     * @param string $usecase_name
     * @param string $responder_name
     * @return string
     *
     * @throws FileNotFoundException
     */
    protected function buildActionClass(string $name, string $usecase_name, string $responder_name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceActionNamespace($stub, $name, $usecase_name, $responder_name)->replaceActionClass($stub, $name, $usecase_name, $responder_name);
    }

    protected function getStub()
    {
        if ($this->option('usecase')) {
            return __DIR__ . '/stubs/action_with_usecase.stub';
        }

        return __DIR__ . '/stubs/action.stub';
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @param string $usecase_name
     * @param string $responder_name
     * @return $this
     */
    protected function replaceActionNamespace(&$stub, string $name, string $usecase_name, string $responder_name)
    {
        $stub = str_replace(
            ['DummyNamespace', 'DummyUsecaseNamespace', 'DummyResponderNamespace', 'DummyRootNamespace', 'NamespacedDummyUserModel'],
            [$this->getNamespace($name), $this->getNamespace($usecase_name), $this->getNamespace($responder_name), $this->rootNamespace(), $this->userProviderModel()],
            $stub
        );

        return $this;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @param string $usecase_name
     * @param string $responder_name
     * @return string
     */
    protected function replaceActionClass($stub, string $name, string $usecase_name, string $responder_name): string
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);
        $usecase_class = str_replace($this->getNamespace($usecase_name) . '\\', '', $usecase_name);
        $responder_class = str_replace($this->getNamespace($responder_name) . '\\', '', $responder_name);

        return str_replace(
            ['DummyClass', 'DummyUsecaseClass', 'DummyResponderClass'],
            [$class, $usecase_class, $responder_class],
            $stub);
    }

    /**
     * InputOption???????????????????????????????????????????????????????????????????????????
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            // InputOption?????????????????????????????????????????????????????????????????????
            // ?????????
            // @param string                        $name        ??????????????????
            // @param string|array|null             $shortcut    ????????????????????????????????????
            // @param int|null                      $mode        ???????????????????????????(self::VALUE_NONE???self::VALUE_REQUIRED???self::VALUE_OPTIONAL??????????????????)
            // @param string                        $description ????????????????????????
            // @param string|string[]|int|bool|null $default     ???????????????????????????(??????????????????????????????self::VALUE_NONE???????????????????????????????????????)
            ['usecase', 'u', InputOption::VALUE_NONE, 'make usecase class']
        ];
    }
}
