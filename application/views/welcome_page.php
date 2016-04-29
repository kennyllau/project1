
<!doctype html>
<html>
<head>
	<title>Welcome</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDlXCmTDNweHII0d4AtShhVLzwBptXmYog"></script>
	<!-- <script src="//connect.soundcloud.com/sdk.js"></script> -->

	<script src="https://connect.soundcloud.com/sdk/sdk-3.0.0.js"></script>
	<!-- <script src="https://w.soundcloud.com/player/api.js"></script> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet"  type="text/css" href="/assets/welcome1.css">

	<script>
		function pauseMusic(){
			window.widget.pause();
		};


		$(document).ready(function(){

				SC.initialize({
				  client_id: 'cc9fc24f96eb6758a83cf9c794b11a19'
				});

		var music_sec = 0;


	  	var trigger = $('.hamburger'),
     	overlay = $('.overlay'),
     	isClosed = false;

	    trigger.click(function(){
	    hamburger_cross();      
	    });

	    function hamburger_cross(){
	    	if(isClosed == true){          
		        overlay.hide();
		        trigger.removeClass('is-open');
		        trigger.addClass('is-closed');
		        isClosed = false;
	    	} 
	      else{   
	        overlay.show();
	        trigger.removeClass('is-closed');
	        trigger.addClass('is-open');
	        isClosed = true;
	      }
	    }
	  
		$('[data-toggle="offcanvas"]').click(function(){
		    $('#wrapper').toggleClass('toggled');
		  	}); 


		function callback(response, status){
			if (status == google.maps.DistanceMatrixStatus.OK){
				var origins = response.originAddresses;
				var destinations = response.destinationAddresses;

				var music_genre = "'"+$('input:checked').val()+"'";


				for (var i = 0; i < origins.length; i++){
					var results = response.rows[i].elements;

					for (var j = 0; j < results.length; j++){
						var element = results[j];
						var distance = element.distance.text;
						var duration = element.duration.text;
						var from = origins[i];
						var to = destinations[j];
					}


					music_sec = results[0].duration.value;
					console.log(music_genre);
					console.log(music_sec);


					function myTimer() {
					  document.getElementById("head1").innerHTML = d--;
					}
					var d = music_sec;
					var myVar = setInterval(function() {
					  myTimer()
					}, 1000);
					// setTimeout($('iframe .playButton__overlay').click(),8000);

					setTimeout(function(){
						location = '/main/trip'
					},music_sec*1000)
			
						
				}

				

				SC.get('/playlists', {
					 
					q: music_genre,

					}).then(function(tracks) {

						var random_playlist = Math.floor(Math.random()*tracks.length);

						console.log(random_playlist);
						console.log(tracks.length);

						for ( var i = 0; i < tracks.length; i++){
							};
					  


					  $('#playlist_name').attr('value', tracks[random_playlist].title);
					  						console.log($('#playlist_name').val());

					  			
					  $('#playlist_link').attr('value', tracks[random_playlist].permalink_url);
					  						console.log($('#playlist_link').val());

					  $('#sc-widget').attr('src','https://w.soundcloud.com/player/?url='+tracks[random_playlist].permalink_url+'&auto_play=true');


						var iframeElement   = document.querySelector('iframe');
						var iframeElementID = iframeElement.id;
						var widget1         = SC.Widget(iframeElement);
						var widget2         = SC.Widget(iframeElementID);




			console.log(widget);	
			console.log(widget1);	
			console.log(widget2);	
			console.log(SC.widget);	




					  

				});

	
			



			}
		}

		function get_sc_music(music_sec){

		}


		$('#form1').submit(function(){
			var origin = $('#a').val();
			var destination = $('#b').val();

			var service = new google.maps.DistanceMatrixService();
			service.getDistanceMatrix({
					

				    origins: [origin],
				    destinations: [destination],
				    travelMode: google.maps.TravelMode.DRIVING,
				    drivingOptions: {
					    departureTime: new Date(Date.now()),  // for the time N milliseconds from now.
					    trafficModel: "pessimistic"
					  }
				  }, callback);


				// $.post('/travels/add_destination', $(this).serialize(), function(res){
				// 	// console.log(res);

				// });


			return false;

		});

		$('#form2').submit(function(){
			var origin = $('#a').val();
			var destination = $('#b').val();
			var pl_name = $('#playlist_name').val();
			var pl_link = $('#playlist_link').val();

			$.post('/travels/add_destination', $(this).serialize(), function(res){
				// 	// console.log(res);

				});
			$('.dropdown-header').html(origin+" - "+destination);
			$('.dropdown-menu').append("<li><a href ='"+pl_link+"'>"+pl_name+"</a></li>");

			return false;
		})






		// function initialize() {
		//   var mapProp = {
		//     center:new google.maps.LatLng(51.508742,-0.120850),
		//     zoom:5,
		//     mapTypeId:google.maps.MapTypeId.ROADMAP
		//   };


		//   var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		// }



		// google.maps.event.addDomListener(window, 'load', initialize);

		
		
		// $.get('https://api.soundcloud.com/tracks?client_id=cc9fc24f96eb6758a83cf9c794b11a19', function(res){


		// 	console.log(res);
		// });



		// $("#mp").append(
		// 	var track_url = 'https://soundcloud.com/charles-hardy-music/the-blue';
		// 	SC.oEmbed(track_url, { auto_play: true }).then(function(oEmbed) {
		// 	 console.log('oEmbed response: ', oEmbed);
		// 	})
		// 			);


		});

	



	</script>


	

</head>
<body>

<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                   <?= ucfirst($this->session->userdata['first_name']) ?>
                </a>

             
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">History<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-header">Your Trip</li>
                <li><a href="#">Playlist Links</a></li>
              </ul>
            </li>
             <li>
                <a href="/main/destroy">Sign Out</a>
            </li>
            
           
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>


			<span class="hamb-middle"></span>
			<span class="hamb-bottom"></span>
        </button>

		<div class="container">   <!--- cool banner -->
			<div class="row" id="background">
				<svg viewBox="0 0 960 300">
				    <symbol id="s-text">
						<text text-anchor="middle" x="50%" y="80%" id="head1">project: sound</text>
					</symbol>
					<g class = "g-ants">
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
					</g>
				</svg>
			</div>
		    
		    		
	    			<div class="row">
	    				<div class="col-xs-12 text-center">
				        <div id="filter-panel" class="collapse filter-panel">
				            <div class="panel panel-default">
				                <div class="panel-body">
				                    <form class="form-inline" role="form">

				                        <div class="form-group">    
				                            <div class="radio">
				                            	
				                                <label class="genre"><input type="radio" name="genre" value="electronic"> Electronic </label>
				                                <label class="genre"><input type="radio" name="genre" value="Pop"> Pop </label>
				                                <label class="genre"><input type="radio" name="genre" value="Rock"> Rock </label>
				                                <label class="genre"><input type="radio" name="genre" value="R&B"> R&B</label>
				                                <label class="genre"><input type="radio" name="genre" value="Rap"> Rap</label>
				                                <label class="genre"><input type="radio" name="genre" value="Country"> Country</label>
				                                <label class="genre"><input type="radio" name="genre" value="Hip-hop"> Hip-hop</label>
				                                <label class="genre"><input type="radio" name="genre" value="Jazz"> Jazz</label>
				                                <label class="genre"><input type="radio" name="genre" value="Classical"> Classical</label>
				                                <label class="genre"><input type="radio" name="genre" value="Reggae"> Reggae</label>	
				                                <label class="genre"><input type="radio" name="genre" value="Dance"> Dance</label>			
				                             	     
				                            </div>
				                             
				                        </div>
				                    </form>
				                </div>
				            </div>
				        </div>    
				        <button type="button" class="button" data-toggle="collapse" data-target="#filter-panel">
				            <span class="glyphicon glyphicon-music"></span> Select Genre
				        </button>
				        </div>
					</div>


				<div class="row">
					<div class="col-xs-12 text-center">
						<form id="form1" action="" method="post">
			    			<!-- <input  id="a" type="text" placeholder="start" name="origin"></input>
			    			<input id="b" type="text" placeholder="destination" name="destination"></input>
			    			<input type="hidden" id="playlist_name" name="playlist_name" value="a"></input>
			    			<input type="hidden" id="playlist_link" name="playlist_link" value="a"></input> -->
			    			<button type="submit" class="button"><span class="glyphicon glyphicon-road"></span> Start Trip
			    			</button>
			    		</form>


			    		  <form id="form2" action="/travels/add_destination" method="post">
			    		  <input  id="a" type="text" placeholder="start" name="origin"></input>
			    			<input id="b" type="text" placeholder="destination" name="destination"></input>
			    			<input type="hidden" id="playlist_name" name="playlist_name" value="a"></input>
			    			<input type="hidden" id="playlist_link" name="playlist_link" value="a"></input>
			    			<hr>
							<button type="submit" class="button"><span class="glyphicon glyphicon-list"></span> Save to History
			    			</button>
			    		  </form>
		    		</div>


		    		
		    	</div>



		    
		    <div class="row">
		    	<div class="col-xs-8 col-xs-offset-2 text-center" id="media_player">
			    	<iframe id="sc-widget" src="" width="100%" height="465" scrolling="no" frameborder="no" ></iframe>
					<!-- <iframe id="sc-widget" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/users/47341101/favorites" width="100%" height="465" scrolling="no" frameborder="no"></iframe> -->
			    	


					<!-- <script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
					<script type="text/javascript">
					 (function(){
					    var widgetIframe = document.getElementById('sc-widget'),
					        widget       = SC.Widget(widgetIframe);

					    widget.bind(SC.Widget.Events.READY, function() {
					      widget.bind(SC.Widget.Events.PLAY, function() {
					        // get information about currently playing sound
					        widget.getCurrentSound(function(currentSound) {
					          console.log('sound ' + currentSound.get('') + 'began to play');
					        });
					      });
					      // get current level of volume
					      widget.getVolume(function(volume) {
					        console.log('current volume value is ' + volume);
					      });
					      // set new volume level
					      widget.setVolume(50);
					      // get the value of the current position
					    });

					  }());
					</script> -->
		    	</div>
		    </div>
		    <div class="row">
		<div class="col-xs-12 text-center">
			<i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
			<i class="fa fa-facebook fa-3x" aria-hidden="true"></i>
			<i class="fa fa-pinterest fa-3x" aria-hidden="true"></i>
			<i class="fa fa-soundcloud fa-3x" aria-hidden="true"></i>
			<i class="fa fa-youtube fa-3x" aria-hidden="true"></i>
			<i class="fa fa-vimeo-square fa-3x" aria-hidden="true"></i>
			<i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
		</div>
	</div>

		  
		
		<!-- <div id="googleMap" style="width:500px;height:380px;" class="center-block"></div> -->
		

		</div> <!-- container for banner -->
	</div> <!-- end of page-content -->

	
</div>  <!-- end of wrapper -->
</body>
</html>