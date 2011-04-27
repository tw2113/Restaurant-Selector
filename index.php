<!doctype html>
<html lang="en-us" class="no-js">
<head>
<meta charset="utf-8" />
	<title>Random Restaurant Selector</title>
<style>
<!--Feel free to style as you please-->
body {background: #FFFEF2; color: #2359FF;}
article {background: #AFBAFF; display:block; border-radius: 15px; margin: 0 auto; padding: 15px; width: 75%; text-align: center;}
h2 {margin-top: 15px; height: 25px;}
</style>
<script src="js/modernizr.custom.js"></script><!--Includes for older browsers to understand the Article tag, and add feature detection if you want to get fancy-->
</head>
<body>
    <?php
    $restaurants = array(
        //Enter restaurants that are near you that you enjoy going to
        'Fast food chain',
        'Sit down restaurant',
        'convenience store',
        'get creative with places',
        'Drive home for lunch and eat there',
        'Get back to work, you do not have time for lunch!',
        '' //Left blank for "wildcard" instance
        );
    $randrestaurant = array_rand(array_flip($restaurants),1);
    ?>
	<article>
	<h1>Where should I go to eat today?</h1>
	<h2><?php echo $randrestaurant; ?></h2>
	<p>A blank spot means it's a wildcard and someone else decides for you.
	<br/>Refresh to see another option.</p>
	
    <p>Source at: <a href="https://github.com/tw2113/Restaurant-Selector" title="Restaurant Selector Github Repo">Github</a>
	</article>
</body>
</html>
