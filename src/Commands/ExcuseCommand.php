<?php
namespace Iantoo\LaravelExcuses\Commands;

use Illuminate\Console\Command;
use Iantoo\LaravelExcuses\Excuse;

class ExcuseCommand extends Command
{
    protected $signature = 'excuse:generate {category?}';
    protected $description = 'Generate a random excuse.';

    protected $excuse;

    public function handle()
    {
        $category = $this->argument('category') ?? 'Work';
        $this->info('Excuse: '. $this->excuse->getRandomExcuse($category));
    }
}