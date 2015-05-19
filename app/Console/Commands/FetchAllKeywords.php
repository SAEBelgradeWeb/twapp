<?php namespace App\Console\Commands;

use App\LatestTweets;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FetchAllKeywords extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'twapp:fetchall';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This will fetch all keywords in database';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$latests= LatestTweets::all();

        foreach($latests as $latest) {
            $this->call('twapp:fetch', array('--query' =>  $latest->keyword));
        }

        $this->info('Done.');
	}



}
