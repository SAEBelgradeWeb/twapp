<?php namespace App\Console\Commands;

use App\LatestTweets;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Repositories\EntriesInterface;


class FetchEntriesCommand extends Command {


    public $entriesRepo;
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'twapp:fetch';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This will fetch all entries from Twitter or other service';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(EntriesInterface $entriesInterface)
	{
        $this->entriesRepo = $entriesInterface;

		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $q = $this->option('query');
        $tweets = $this->entriesRepo->getLastEntries($q);
        if (count($tweets) < 1 ) return $this->info('no query results');
        $this->info('Command executed fine for ' . $q);

        $latest = LatestTweets::firstOrCreate(['keyword' => $q]);
        $latest->entries = json_encode($tweets);
        $latest->save();


	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
//			['query', InputArgument::REQUIRED, 'Query word you want to search for.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['query', null, InputOption::VALUE_REQUIRED, 'Query word you want to search for.', null],
		];
	}

}
