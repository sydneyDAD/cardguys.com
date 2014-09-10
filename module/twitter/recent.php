<?php
 
/**
 * TWITTER FEED PARSER
 * 
 * @version	1.1.1
 * @author	Jonathan Nicol
 * @link	http://f6design.com/journal/2010/10/07/display-recent-twitter-tweets-using-php/
 * 
 * Notes:
 * We employ caching because Twitter only allows their RSS feeds to be accesssed 150
 * times an hour per user client.
 * --
 * Dates can be displayed in Twitter style (e.g. "1 hour ago") by setting the 
 * $twitter_style_dates param to true.
 * 
 * Credits:
 * Hashtag/username parsing based on: http://snipplr.com/view/16221/get-twitter-tweets/
 * Feed caching: http://www.addedbytes.com/articles/caching-output-in-php/
 * Feed parsing: http://boagworld.com/forum/comments.php?DiscussionID=4639
 */
 
function display_latest_tweets(
	$twitter_user_id,
	$cache_file = './twitter.txt',
	$cache_file1 = './twitter1.txt',
	$cache_file2 = './twitter2.txt',
	$tweets_to_display = 3,
	$ignore_replies = false,
	$twitter_wrap_open = '<div class=new_tweet_cont>', //title
	//$twitter_wrap_open = '<h2>Latest tweets</h2><ul id="twitter">',
	//$twitter_wrap_close = '</ul>',
	$twitter_wrap_close = '</div>',
	$tweet_wrap_open = '<span class="tweet_status">',
	$meta_wrap_open = '</span><span class="tweet_meta"> ',
	$meta_wrap_close = '</span>',
	$tweet_wrap_close = '',
	//$date_format = 'g:i A M jS',
	$date_format = 'm/d/y',
	$twitter_style_dates = false){
 
	// Seconds to cache feed (1 hour).
	$cachetime = 60*60;
	// Time that the cache was last filled.
	$cache_file_created = ((@file_exists($cache_file))) ? @filemtime($cache_file) : 0;
 
	// A flag so we know if the feed was successfully parsed.
	$tweet_found = false;
 
	// Show file from cache if still valid.
	if (time() - $cachetime < $cache_file_created) {
 
		$tweet_found = true;
		// Display tweets from the cache.
		@readfile($cache_file);	
 
	} else {
 
		// Cache file not found, or old. Fetch the RSS feed from Twitter.
		$rss = @file_get_contents('http://twitter.com/statuses/user_timeline/'.$twitter_user_id.'.rss');
		//$rss = @file_get_contents('http://bmg.dc:82/projects/ccc/twitter2.txt');
 
 /*
		$file1 = @fopen($cache_file1, 'w');
		$file2 = @fopen($cache_file2, 'w');
 
					// Save the contents of output buffer to the file, and flush the buffer. 
					@fwrite($file1, ob_get_contents()); 
					@fwrite($file2, $rss); 
					@fclose($file1); 
					@fclose($file2); exit;
 */
		if($rss) {
 
			// Parse the RSS feed to an XML object.
			$xml = @simplexml_load_string($rss);
 
			if($xml !== false) {
 
				// Error check: Make sure there is at least one item.
				if (count($xml->channel->item)) {
 
					$tweet_count = 0;
 
					// Start output buffering.
					ob_start();
 
					// Open the twitter wrapping element.
					$twitter_html = $twitter_wrap_open;
 
					// Iterate over tweets.
					foreach($xml->channel->item as $tweet) {
 
						// Twitter feeds begin with the username, "e.g. User name: Blah"
						// so we need to strip that from the front of our tweet.
						$tweet_desc = substr($tweet->description,strpos($tweet->description,":")+2);
						$tweet_desc = htmlspecialchars($tweet_desc);
						$tweet_first_char = substr($tweet_desc,0,1);
 
						// If we are not gnoring replies, or tweet is not a reply, process it.
						if ($tweet_first_char!='@' || $ignore_replies==false){
 
							$tweet_found = true;
							$tweet_count++;
 
							// Add hyperlink html tags to any urls, twitter ids or hashtags in the tweet.
							$tweet_desc = preg_replace('/(https?:\/\/[^\s"<>]+)/','<a href="$1">$1</a>',$tweet_desc);
							$tweet_desc = preg_replace('/(^|[\n\s])@([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/$2">@$2</a>', $tweet_desc);
							$tweet_desc = preg_replace('/(^|[\n\s])#([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/search?q=%23$2">#$2</a>', $tweet_desc);
 
 							// Convert Tweet display time to a UNIX timestamp. Twitter timestamps are in UTC/GMT time.
							$tweet_time = strtotime($tweet->pubDate);	
 							if ($twitter_style_dates){
								// Current UNIX timestamp.
								$current_time = time();
								$time_diff = abs($current_time - $tweet_time);
								switch ($time_diff) 
								{
									case ($time_diff < 60):
										$display_time = $time_diff.' seconds ago';                  
										break;      
									case ($time_diff >= 60 && $time_diff < 3600):
										$min = floor($time_diff/60);
										$display_time = $min.' minutes ago';                  
										break;      
									case ($time_diff >= 3600 && $time_diff < 86400):
										$hour = floor($time_diff/3600);
										$display_time = 'about '.$hour.' hour';
										if ($hour > 1){ $display_time .= 's'; }
										$display_time .= ' ago';
										break;          
									default:
										$display_time = date($date_format,$tweet_time);
										break;
								}
 							} else {
 								$display_time = date($date_format,$tweet_time);
 							}
 
							// Render the tweet.
							//$twitter_html .= $tweet_wrap_open.$tweet_desc.$meta_wrap_open.'<a href="http://twitter.com/'.$twitter_user_id.'">'.$display_time.'</a>'.$meta_wrap_close.$tweet_wrap_close;
							$twitter_html .= $tweet_wrap_open.$display_time.': '.$tweet_desc.$meta_wrap_open.'<a href="http://twitter.com/'.$twitter_user_id.'">@'.$twitter_user_id.'</a>'.$meta_wrap_close.$tweet_wrap_close;
 
						}
 
						// If we have processed enough tweets, stop.
						if ($tweet_count >= $tweets_to_display){
							break;
						}
 
					}
 
					// Close the twitter wrapping element.
					$twitter_html .= $twitter_wrap_close;
					//echo $twitter_html;
 
					// Generate a new cache file.
					//*
					$file = @fopen($cache_file, 'w');
 
					// Save the contents of output buffer to the file, and flush the buffer. 
					@fwrite($file, $twitter_html); 
					@fclose($file); 
					//*/
					return $twitter_html;
					ob_end_flush();
 
				}
			}
		}
	} 
	// In case the RSS feed did not parse or load correctly, show a link to the Twitter account.
	if (!$tweet_found){
		echo $twitter_wrap_open.$tweet_wrap_open.''.$meta_wrap_open.'<a href="http://twitter.com/'.$twitter_user_id.'">Follow us on Twitter</a>'.$meta_wrap_close.$tweet_wrap_close.$twitter_wrap_close;
	}
}

if(isset($row_config['twitterid'])) 
echo display_latest_tweets($row_config['twitterid']);
 
?>