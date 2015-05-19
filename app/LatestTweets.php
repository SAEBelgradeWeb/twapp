<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LatestTweets extends Model {

    protected $fillable = ['keyword', 'entries', 'created_at', 'updated_at'];

	//

}
