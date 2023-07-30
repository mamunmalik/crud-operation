<?php

namespace Mamunmalik\CrudOperation;

use Illuminate\Console\Command;
use Mamunmalik\CrudOperation\CrudOperationService;

class CrudOperationCommand extends Command
{

    /**
     * The console command description.
     *
     * @var string
     */
    protected $signature = 'make:crud {name : Model (Singular), e.g User, Post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all Crud operations with a single command';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        CrudOperationService::MakeController($name);
        $this->info($name . 'Controller created successfully');
        CrudOperationService::MakeModel($name);
        $this->info($name . ' model created successfully');
        CrudOperationService::MakeRequest($name);
        $this->info($name . 'Request created successfully');
        CrudOperationService::MakeMigration($name);
        $this->info($name . ' migration created successfully');
        CrudOperationService::MakeRoute($name);
        $this->info($name . ' resource route created successfully');
        CrudOperationService::MakeView($name);
        $this->info('All views created successfully');
    }
}
