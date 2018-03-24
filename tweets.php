<?php 
error_reporting(E_ERROR | E_PARSE);
include("twitter/twitteroauth.php");
$consumer = "";
$consumertoken = "";
$tokens = "";
$tokensecret = "";
$twitter = new TwitterOAuth($consumer,$consumertoken,$tokens,$tokensecret);
?>
<html>
<body>
<form method = "post">
Search : <input name = "usermention" ></input>
</form>
<?php 
if(isset($_POST['usermention'])){
	$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['usermention'].'&result_type=recent&count=100');
	$post->strings = array();
	$f = 0;
	$r = 0;
		foreach($tweets as $tweet){
			//print_r($tweet);
			foreach($tweet as $t){

				if($t['text']!=null)
				array_push($post->strings, $t['text']);
				$f = $f + $t['favourite_count'];
				$r = $r + $t['retweet_count'];

			
			}

		}
		$post =  json_encode($post);
		$url = "http://ec2-13-126-228-105.ap-south-1.compute.amazonaws.com:8000/batch";
		$ch = curl_init( $url );
	
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	# Return response instead of printing.
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	# Send request.
	$result = curl_exec($ch);
	curl_close($ch);
	# Print response.
	echo "<pre>$result</pre>";

}
?>
</body>
</html>

