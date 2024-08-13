<?php
namespace Iantoo\LaravelExcuses\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Iantoo\LaravelExcuses\Excuse;

class ExcuseCommand extends Command implements PromptsForMissingInput
{
    protected $signature = 'excuse:generate {category?}';
    protected $description = 'Generate a random excuse.';

    protected $excuse;

    public function __construct(Excuse $excuse){
        parent::__construct();
        $this->excuse = $excuse;
    }

    public function handle()
    {
        $category = $this->argument('category') ?? 'Work';
        $this->info('Excuse: '. $this->excuse->getRandomExcuse(ucfirst(strtolower(trim($category)))));
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'excuse' => ['Which excuse should we generate?', 'E.g. Work, School or Home'],
        ];
    }
}