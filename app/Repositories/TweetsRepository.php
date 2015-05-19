<?php namespace App\Repositories;

use Guzzle\Http\Client;
use Guzzle\Plugin\Oauth\OauthPlugin;
use App\Repositories\EntriesInterface;

class TweetsRepository implements EntriesInterface {

    public function getLastEntries($q)
    {
        $twitter_client = new Client('https://api.twitter.com/{version}', array(
            'version' => '1.1'
        ));

        $twitter_client->addSubscriber(new OauthPlugin(array(
            'consumer_key'  => env('CONSUMER_KEY', false),
            'consumer_secret' => env('CONSUMER_SECRET', false),
            'token'       => env('TOKEN', false),
            'token_secret'  => env('TOKEN_SECRET', false)
        )));

        $request = $twitter_client->get('search/tweets.json');
        $request->getQuery()->set('q', $q);
        $request->getQuery()->set('exclude', 'retweets');
        $response = $request->send();
        $tweets = json_decode($response->getBody());
        return $tweets->statuses;
    }
}