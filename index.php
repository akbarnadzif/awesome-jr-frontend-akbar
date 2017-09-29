<?php 
	
	$user = createCurl("https://api.github.com/users/andhikamaheva");
    $rep = createCurl("https://api.github.com/users/andhikamaheva/starred");


	function createCurl($url){
        $curl = curl_init();
        $token = "?access_token=e87ddc3729211110a1d40b505b64d0dc48525be9";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PasarB2B.com</title>
	<link rel="stylesheet" type="text/css" href="styleindex.css">
	<script type="text/javascript" href="js/jquery.canvasjs.min.js"></script>

	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Script untuk Static Graphic -->
	<script type="text/javascript">
	    window.onload = function() {
	        var chart = new CanvasJS.Chart("chartContainer", {
	   
	            axisX: {
	                interval: 10
	            },
	            data: [{
	                type: "line",
	                dataPoints: [
	                  { x: 10, y: 45 },
	                  { x: 20, y: 14 },
	                  { x: 30, y: 20 },
	                  { x: 40, y: 60 },
	                  { x: 50, y: 50 },
	                  { x: 60, y: 80 },
	                  { x: 70, y: 40 },
	                  { x: 80, y: 60 },
	                  { x: 90, y: 10 },
	                  { x: 100, y: 50 },
	                  { x: 110, y: 40 },
	                  { x: 120, y: 14 },
	                  { x: 130, y: 70 },
	                  { x: 140, y: 40 },
	                  { x: 150, y: 90 },
	                ]
	            }]
	        });
	        chart.render();
	    }
	</script>
</head>
<body>
	<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
        <!-- Site Menu -->
        <nav class="navbar navbar-inverse">
        	<div class="container-fluid">
        		<div  class="navbar-header">
        			<!-- <a class="navbar-brand" href="#">PASARB2B.COM</a> -->
        			<img src="pictures/github.png" style="height: 40px;width: 40px;margin-top: 5px;">
        		</div>
        		<form class="navbar-form navbar-left">
        			<div class="form-group">
        				<input type="text" class="search" placeholder="Search GitHub">
        			</div>
        		</form>
        		<ul class="nav navbar-nav">
        			<li class=""><a href="https://github.com/features">Features</a></li>
        			<li class=""><a href="https://github.com/bisiness">Business</a></li>
        			<li class=""><a href="https://github.com/explore">Explore</a></li>
        			<li class=""><a href="https://github.com/marketplace">Marketplace</a></li>
        			<li class=""><a href="https://github.com/pricing">Pricing</a></li>
        		</ul>
        		<ul class="nav navbar-nav navbar-right">
        			<li><a href="https://github.com/login">Sign in</a></li>
        			<li><a href="https://github.com/join">Sign up</a></li>
        		</ul>
        	</div>
        </nav>
        <!-- Halaman Sidebar -->
        <div class="menu">
            <center>    
                <img src=<?=$user->avatar_url?> align="middle" style="width: 100%; height: auto;border-radius: 7px;">
            </center>
            <div class="col-md-12" >
                <h3 style="margin-top: 0px;"><?=$user->name?>
                    <br><small><?=$user->login?></small>
                </h3>
                <h4><small><?=$user->bio?> </small>
                </h4><br>
                <div class="">
                    
                </div>
                    <a href="#"><span class="glyphicon glyphicon-envelope"></span> Developer Program Member</a><br><br>
                    <a href="https://github.com/labku"><span class="glyphicon glyphicon-user"></span> <?=$user->company?></a><br>
                    <a href="#"><span class="glyphicon glyphicon-map-marker"></span> <?=$user->location?></a><br>
                    <a href="#"><span class="glyphicon glyphicon-envelope"></span> <?=$user->blog?></a>
                 
            </div>
        </div>
        <!-- Halaman Content -->
        <div class="main">
            <!-- <nav class="navbar navbar-inverse"> -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="presentation"><a href="#">Overview </a></li>
                    <li class="presentation"><a href="#">Repositories <span class="badge"><?=$user->public_repos?></span></a></li>
                    <li class="presentation"><a href="#">Stars <span class="badge">140</span></a></li>
                    <li class="presentation"><a href="#">Followers <span class="badge"><?=$user->followers?></span></a></li>
                    <li class="presentation"><a href="#">Following <span class="badge"><?=$user->following?></span></a></li>
                </ul>
            <!-- </nav> -->
            <div class="col-md-12">
                <h4>Pinned Repositories</h4>
                <?php 
                    $i = 0;
                foreach ($rep as $array) { 
                        if ($i == 4) {
                            break;
                        }else{
                            $i++;
                        }
                    ?>
                    <div class="col-md-6" style="height: 140px; width: 48%; margin: 7px; padding: -5px;">
                        <a href="" style="font-weight: bold;"><?=$array->full_name?></a>
                        <p><?=$array->description?></p><br>
                        <p style="margin-bottom: 0px;">
                        	<a><span class="glyphicon glyphicon-record"></span> <?=$array->language?></a>
                        	<a href=""> <span class="glyphicon glyphicon-star"></span> <?=$array->watchers?></a>
                        	<a href=""><span class="glyphicon glyphicon-stats"></span> <?=$array->forks?></a>
                        </p>
                    </div>
                    <?php } ?>
               
            </div>
            <div class="col-md-12">
                <h4>1.721 contributions in this year</h4>
                <div class="col-md-12 b">
                    <!-- Call Static Graphic -->
                    <div id="chartContainer" style="height: 200px; width: 100%;">
                        
                    </div>
                </div>
                <div class="col-md-12 b">
                    <div class="col-md-8">
                        <h4>Contributions Activity</h4>
                        <h6 style="margin-top: 10px;font-weight: bold;">Agustus 2017</h6>
                        <h5><span class="glyphicon glyphicon-cloud-upload"></span> Created 76 commits in 2 repositories</h5>
                        <a href="" style="margin-left: 20px;">andhikamaheva/rajaongkir-nodejs </a >44 commits<br>
                        <a href="" style="margin-left: 20px;">andhikamaheva/maichimp-nodejs </a> 32 commits
                        
                        <h5><span class="glyphicon glyphicon-cloud-upload"></span> Created 7 repositories</h5>
                        <h5><span class="glyphicon glyphicon-lock"></span> Created 7 repositories</h5>                        
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown">
                            <button class="btn btn-primaary dropdown-toggle" type="button" data-toggle="dropdown">Jump To <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">First pull request</a></li>
                                <li><a href="#">First issue</a></li>
                                <li><a href="#">First repository</a></li>
                                <li><a href="#">Join github</a></li>
                            </ul>
                        </div>                        
                    </div>
                    <div class="col-md-2" style="float: right;">
                        <h4 class="lab"><a href="#">2017</a></h4>
                        <h4 class="lab"><a href="#">2016</a></h4>
                        <h4 class="lab"><a href="#">2015</a></h4>
                        <h4 class="lab"><a href="#">2014</a></h4>
                    </div>
                </div>
                <a href="#demo" class="btn btn-default" data-toggle="collapse" style="width: 100%;">Show more acitivity</a>
                <dir id="demo" class="collapse">
                    <img src="pictures/ny.jpg" style="width: 100%; height: 150px;">
                </dir>
            </div>
        </div>
    </div>
</body>
</html>