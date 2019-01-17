<!doctype html>
<html class="no-js" lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <metspan id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Photography</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
	
	<meta property="og:image" content="http://<? echo $_SERVER['HTTP_HOST']; ?>/polcia/data/avatar.png" />
	<meta property="og:title" content="Name Photography" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://<? echo $_SERVER['HTTP_HOST']; ?>/polcia" />
	
	<style>
		.socialmedia{
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%);
			width: 55px;
			margin: 10px;
		}
		.socialmedia:hover{
			-webkit-filter: none;
			filter: none;
		}
		li>a:hover {
			box-shadow: 0 -2px white inset;
		}
		.portCategory{
			height: 360px;
			margin-top: 15px;
			padding-top: 10px;
			padding-bottom: 10px;
			background-color: white;
		}
		.imageCategory{
			margin: 0 auto;
			filter: brightness(75%);
		}
		.imageCategory:hover{
			filter: brightness(100%);
		}
	</style>
  </head>
  <body onload="interfaceInit()">
    <div class="grid-container">
	
		<div id="start" style="background: url('data/start.png') no-repeat; background-size: 100%; height: 600px;">
			<!-- <img src="data/start.jpg" alt="startimage" style="z-index: -1; width: 100%; height: 100%;"> -->
			<!-- <div style="float: left; padding-top: 40px; padding-left: 40px;"><img src="data/logo.png" alt="logo"></div>-->
			<ul class="menu align-right" style="padding-top: 40px; padding-right: 40px; font-size: 150%;">
			  <li><a href="/polcia">Strona główna</a></li>
			  <li><a href="#Portfolio">Portfolio</a></li>
			  <li><a href="#O_Mnie">O Mnie</a></li>
			  <li><a href="#Kontakt">Kontakt</a></li>
			</ul>
		</div>
		<hr id="Portfolio">
		<h3><span>Portfolio</span></h3>
		<?
		
			$images = 'content';
		
			$dir = scandir($images);
			unset($dir[0]);
			unset($dir[1]);
		
		?>
	<div class="grid-x grid-padding-x align-center">
		<?php foreach($dir as $d){ $d_ = str_replace(' ','-',$d);
		
		$photocover = scandir("$images/$d");
			unset($photocover[0]);
			unset($photocover[1]);
			$random = rand(1,count($photocover))+1;
		$photocover = $photocover[$random];
		
		if(empty($photocover)) $photocover = 'data/Temporary.jpg';
		else $photocover = "$images/$d/$photocover";
		
		// echo $photocover;
		
		?>
			
				<div class="cell small-2" style=''><a href="?<?echo "$d_";?>#scroll">
					<div class='portCategory'>
						<div class='imageCategory' style="width: 100%; height: 100%; background: url('<? echo $photocover ?>') no-repeat center center; background-size: cover;">
						</div>
					</div></a>
					<div style='min-height: 30px; padding-bottom: 5px;'>
						<h4 style="text-transform: uppercase;"><?echo "$d";?></h4>
					</div>
				</div>
			
		<?php } ?>
	 </div>
  
		<?
		
		$cat_ = $_SERVER['QUERY_STRING'];
		$cat = str_replace('-',' ',$cat_);
		
		$howmuch = count(scandir("$images/$cat"))-2;
		
		if(file_exists("$images/$cat") and (!empty($cat)) and ($howmuch > 0)){
			
			$content = scandir("$images/$cat");
			unset($content[0]);
			unset($content[1]);
		
		?>	
		
		<hr id="scroll">
		<h3 style="text-transform: uppercase;"><? echo $cat; ?></h3>
		
		<div class="orbit" role="region" aria-label="<? echo "content/$cat/$cat";?>" data-orbit>
			<ul class="orbit-container">
				<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
				<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
		
		<? 
			$m=0;
			ob_start();
		 foreach($content as $c){
/*<img src="<? echo "content/$cat/$c"; ?>" style="height: 256px;" >*/
			?>	
			
				
				<li class="orbit-slide">
					<img class="orbit-image" src="<? echo "content/$cat/$c"; $m++;?>" alt="<? echo "content/$cat/$c"; ?>">
				</li>
				
			<?
			
			ob_flush();
			flush();
		
		 } ob_end_flush();?> 
				</ul>
				  <nav class="orbit-bullets">
					<button data-slide="0" class="is-active"><span class="show-for-sr">1. slajd.</span><span class="show-for-sr">Current Slide</span></button>
					<? for($i=1;$i<$m;$i++)
					echo '<button data-slide="'.($i).'"><span class="show-for-sr">'.($i+1).'. slajd</span></button>';
					?>
				  </nav>
				</div>

				<script>$(document).foundation();</script>
				
		 <?
         
		
		} ?>
		<hr id="O_Mnie">
		<h3><span>O mnie</span></h3>
			<div class="media-object" style="text-align: left";>
			  <div class="media-object-section">
				<div class="thumbnail">
				  <img src="data/Placeholder.png" style="max-width: 410px;">
				</div>
			  </div>
			  <div class="media-object-section">
				<h4>Name</h4>
				<p><? include('aboutme.txt'); ?></p>
			  </div>
			</div>
		<hr id="Kontakt">
		<h3><span>Kontakt</span></h3>
			<br>
			<b>EMAIL</b> mail@mail.COM<br><br>
			
			<h5>SOCIAL MEDIA</h5>
			<a href="" target="_blank"><img src="data/facebook.png" class="socialmedia"></a>
			<a href="" target="_blank"><img src="data/twitter.png" class="socialmedia"></a>
			<a href="" target="_blank"><img src="data/insta.png" class="socialmedia"></a>
			
			<h5>ZNAJDZIESZ MNIE RÓWNIEŻ NA</h5>
			<a href="" target="_blank"><img src="data/twitch.png" class="socialmedia"></a>
			
		<hr>
	
	<p class="text-right" style="color: #666;">
		ALL RIGHTS RESERVED Name<BR>
		WEBSITE CREATED BY EXTERMI111
		</p>
	
	</div>
	

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
    
    
  </body>
</html>