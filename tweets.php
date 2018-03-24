<?php 
include("twitter/twitteroauth.php");
$consumer = "SbphYDy0W1ZKjcauZhT1fcuL9";
$consumertoken = "rjd7MhWAmQbRB7cwSvDL46MrE8oGS4szWGUowVbJiYm8KnJcbp";
$tokens = "584645402-ea5lAbHopMZDh3lxicxsU8Mi9rqxrwcFgGP7hsIg";
$tokensecret = "goSu5xzAjguw33W1txTRkTdQynI9BbqOkJyP5kkCgYYfd";
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
		foreach($tweets as $tweet){
			//print_r($tweet);
			foreach($tweet as $t){
				
				array_push($post->strings, $t['text']);

			
			}

		}
		echo json_encode($post);
		
}
?>
</body>
</html>

