<?php namespace App\Http\Controllers;


use App\Repositories\EntriesInterface;
use Illuminate\Http\Request;
use App\Tweet;



class HomeController extends Controller {

    public $entriesRepo;

    public function __construct(EntriesInterface $entriesInterface){
        $this->entriesRepo = $entriesInterface;
    }

	public function index()
	{
        $q = "karleusa";
        $tweets = $this->entriesRepo->getLastEntries($q);
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
