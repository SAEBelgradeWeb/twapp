<?php namespace App\Http\Controllers;


use App\LatestTweets;
use App\Repositories\EntriesInterface;
use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Support\Facades\Artisan;


class HomeController extends Controller {

    public $entriesRepo;

    public function __construct(EntriesInterface $entriesInterface){
        $this->entriesRepo = $entriesInterface;
    }

	public function index($q)
	{


        $tweetsObj = LatestTweets::where('keyword' , $q)->first();
        if (!$tweetsObj) {
            Artisan::call('twapp:fetch', array('--query' =>  $q));
        }
        $tweetsObj = LatestTweets::where('keyword' , $q)->first();
        $tweets = json_decode($tweetsObj->entries);

		return view('home', compact('tweets'));
	}

    public function postTweet(Request $request)
    {

        $id = $request->get('id');
        $type = $request->get('type');
        $tweet = Tweet::find($id);
        if(!$tweet) {
            $tweet = new Tweet;
            $tweet[$type] = 1;
        }
        $tweet->id = $request->get('id');
        $tweet->text = $request->get('text');
        $tweet->increment($type);
        $tweet->save();
        return $request->all();
    }



}
