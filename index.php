<!doctype html>
<html lang="en-us" class="no-js">
<head>
<meta charset="utf-8" />
    <title>Random Restaurant Selector</title>
<style>
body {background: #FFFEF2; color: #2359FF;}
article {background: #AFBAFF; display:block; border-radius: 15px; margin: 0 auto; padding: 15px; width: 75%; text-align: center;}
h2 {margin-top: 15px; height: 25px;}
.home {background-color: rgb(0,0,0); background-color: rgba(0,0,0,.5); left: 0; margin: 0; padding: 2px; position: absolute; top: 0;}
.home a {color: #fff; text-decoration: none; font-size: 13px;}
</style>
<script src="js/modernizr.custom.js"></script>
</head>
<body onload="get_location();">
<p class="home"><a href="http://trexthepirate.com" title="Everybody walk the dinosaur">Home</a></p>
    <?php
    $restaurants = array(
        //Enter restaurants that are near you that you enjoy going to
        'Taco Johns',
        'Dairy Queen',
        'Subway',
        'Qdoba Mexican Grill',
        'Sunshine Foods',
        'Pizza Ranch',
        'Drive home for lunch and eat there',
        'Get back to work, you do not have time for lunch!',
        ''
        );
    $randrestaurant = array_rand(array_flip($restaurants),1);
    ?>
    <article>
    <p id="cords"></p>
    <h1>Where should I go for lunch today?</h1>
    <h2><?php echo $randrestaurant; ?></h2>
    
    <p>A blank spot means it's a wildcard and someone else decides for you.
    <br/>Refresh to see another option.</p>
    
    <p>Source at: <a href="https://github.com/tw2113/Restaurant-Selector" title="Restaurant Selector Github Repo">Github</a>
    </article>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-5073546-5']);
    _gaq.push(['_trackPageview']);
    
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    
    function get_location() {
        navigator.geolocation.getCurrentPosition(get_4sq);
    }
    function get_4sq(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        var foursq = 'https://api.foursquare.com/v2/venues/explore';
        var id = 'D3AWZJT3V5FMQ1H44NCINRX2STZM0UYPJAWWKID1P3FPI0YQ';
        var secret = '5LC0V5XKCF0BO1HZTJCXMDESV4IMXWSBFRNMM0J3SFH5UPBH';
        $.getJSON(foursq+"?ll="+lat+","+lon+"&client_id="+id+"&client_secret="+secret+"&section=food&v=20120120", function(data){
            console.log(data);
        });
    }
    /*var tweets = '';
    $.each(data, function(i,item){
    //Create the links and throw them
    //into the body of the page
    tweets += '<p>'+twitify(item.text)+'</p>';
    });
    $("#tweets").html(tweets);*/
    //    });
</script>
</body>
</html>