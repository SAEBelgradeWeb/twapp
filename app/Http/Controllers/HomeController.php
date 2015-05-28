<?php namespace App\Http\Controllers;


use App\LatestTweets;
use App\Repositories\EntriesInterface;
use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Input;


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
    public function search()
    {
        $query=Input::get('query');

        $tweetsObj = LatestTweets::where('keyword' , $query)->first();
        if (!$tweetsObj) {
            Artisan::call('twapp:fetch', array('--query' =>  $query));
        }
        $tweetsObj = LatestTweets::where('keyword' , $query)->first();
        $tweets = json_decode($tweetsObj->entries);

        return view('search', compact('tweets'));
    }
    public function nav($q)
    {


        $tweetsObj = LatestTweets::where('keyword' , $q)->first();
        if (!$tweetsObj) {
            Artisan::call('twapp:fetch', array('--query' =>  $q));
        }
        $tweetsObj = LatestTweets::where('keyword' , $q)->first();
        $tweets = json_decode($tweetsObj->entries);

        return view('search', compact('tweets'));
    }

    public function goodBad(){
        $goodTweets = Tweet::orderBy('good')->get();
        $badTweets = Tweet::orderBy('bad')->get();

        return view('index', compact('goodTweets','badTweets'));

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
