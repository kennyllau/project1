<!doctype html>
<html>
<head>
	<title>Welcome</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDlXCmTDNweHII0d4AtShhVLzwBptXmYog"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet"  type="text/css" href="assets/welcome.css">

	<script>
		$(document).ready(function(){

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

				for (var i = 0; i < origins.length; i++){
					var results = response.rows[i].elements;

					for (var j = 0; j < results.length; j++){
						var element = results[j];
						var distance = element.distance.text;
						var duration = element.duration.text;
						var from = origins[i];
						var to = destinations[j];
					}
					// console.log(duration);

					console.log(results[0].duration.value);
				}
			}
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
			return false;
		});


		// function initialize() {
		//   var mapProp = {
		//     center:new google.maps.LatLng(51.508742,-0.120850),
		//     zoom:5,
		//     mapTypeId:google.maps.MapTypeId.ROADMAP
		//   };


		//   var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		// }



		// google.maps.event.addDomListener(window, 'load', initialize);





		});
	</script>
<!-- AIzaSyDlXCmTDNweHII0d4AtShhVLzwBptXmYog -->	
</head>
<body>

<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                   Trip's History
                </a>
            </li>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dates <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-header">Dropdown heading</li>
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dispensaries <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-header">Dropdown heading</li>
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
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
						<text text-anchor="middle" x="50%" y="80%">Trippy advisor </text>
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
				                            <div class="checkbox">
				                            	
				                                <label class="genre"><input type="checkbox" checked>Electronic </label>
				                                <label class="genre"><input type="checkbox" checked>Pop/Rock </label>
				                                <label class="genre"><input type="checkbox" checked>R&B</label>
				                                <label class="genre"><input type="checkbox" checked>Rap</label>
				                                <label class="genre"><input type="checkbox" checked>Country</label>
				                                <label class="genre"><input type="checkbox" checked>Hip-hop</label>
				                                <label class="genre"><input type="checkbox" checked>Jazz</label>
				                                <label class="genre"><input type="checkbox" checked>Classical</label>
				                                <label class="genre"><input type="checkbox" checked>Reggae</label>			
				                             	     
				                            </div>
				                             
				                        </div>
				                    </form>
				                </div>
				            </div>
				        </div>    
				        <button type="button" class="button" data-toggle="collapse" data-target="#filter-panel">
				            <span class="glyphicon glyphicon-music"></span> Select Genres
				        </button>
				        </div>
					</div>


				<div class="row">
					<div class="col-xs-6 text-center">
						<form id="form1" action="" method="">
			    			<input  id="a" type="text" placeholder="start" name="origin"></input>
			    			<input id="b" type="text" placeholder="destination" name="destination"></input>
			    			<button type="submit" class="button"><span class="glyphicon glyphicon-road"></span> Start Trip
			    			</button>
			    		</form>
		    		</div>


		    		<div class="col-xs-6 text-center">
			    		<form action="" method="">
			    			<p><label>Set Timer In Minutes</label></p>
			    			<input type="number"  name="time_limit" min="10" max="720" ></input>
			    			<button type="submit" class="button"><span class="glyphicon glyphicon-time"></span> Start Time
			    			</button>
			    		</form>
		    		</div>
		    	</div>



		    
		    <div class="row">
		    	<div class="col-xs-12 text-center" id="media_player">
		    	<h1>media player</h1>
		    	</div>
		    </div>

		
		<!-- <div id="googleMap" style="width:500px;height:380px;" class="center-block"></div> -->
		

		</div> <!-- container for banner -->
	</div> <!-- end of page-content -->
<br><br><br><br><br><br><br><br><br><br><br><br><br>
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
</div>  <!-- end of wrapper -->
</body>
</html>