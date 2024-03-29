<style>
.hero .hero-content {
	padding-top: 15%;
}

.hero h1 {
	font-size: 40px;
}

.control-label {
	color: #fff;
}

</style>



<div class="container">
<div class="row" style="margin-top: 60px;">
	<div class="col-md-8 col-md-offset-2">
		<div class="hero-content text-center landing-text-center">
		<h1 class="landing-h1" >Login to BMS</h1>
		</div>
	</div>
</div>

<!-- alerts -->

<style>
	.libs-input {
		margin-bottom: 30px;
		height: 60px;
		border: none;
		color: green;
	}
</style>
<div class="row">
<?php if (Session::get_flash('success')): ?>
	<div class="alert alert-success col-md-8 col-md-offset-2">
		<strong>Success</strong>
		<p>
		<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
		</p>
	</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
	<div class="alert alert-danger col-md-8 col-md-offset-2">
		<strong>Error(s) encountered:</strong>
		<p>
		<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
		</p>
	</div>
<?php endif; ?>
</div>
<!-- /alerts -->

	<form class="form-vertical" method="post">
<div class="row" style="background: none; opacity: 0.9; min-height: 200px; padding: 20px 0;">
	<div class="col-md-8 col-md-offset-2">
		
	
				    <input class="form-control input-lg libs-input" placeholder="E-mail or phone number eg +263717779296" name="username" type="text">
				    <input class="form-control input-lg libs-input" placeholder="Password" name="password" type="password" value="">

	</div>
</div>

<div class="row form-actions text-center landing-text-center" style="margin-top: 20px;">
	<button type="submit" class="btn btn-primary btn-lg btn-cta">Log in</button>
	<a href=<?php echo Uri::base().'user/create' ; ?> >
		<button type="button" class="btn btn-fill btn-lg btn-cta">Register</button>
	</a>
</div>
<div class="row form-actions text-center landing-text-center" style="margin-top: 20px;">
 <a href="<?php echo Uri::base().'auth/forgotpassword';?>">Forgot password?</a>
</div>
	</form>

</div>

<!-- GEOLOCATION STUFF -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAA0oPCWSGqiwZIxMKWiG5y4UWK3P0s-YA"></script> 
<script type="text/javascript"> 

var geocoder;

var lati;
var loni;
var cityName;
  
initialize();

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    lati = position.coords.latitude;
    loni = position.coords.longitude;
    codeLatLng(lati, loni);
    runAjax();
}


function runAjax()
{
		var formData = {
			lat: lati,
			lon: loni,
			cit: cityName
		}; 
		
		$.ajax({
			url: "<?php echo Uri::create('geo/locate'); ?>",
			
			type: "post",
			
			data: formData,
			
			success: function(data, textStatus){
			},
			
			error: function(err){
			}
			
		});
}

function errorFunction(){
    console.log("Geocoder failed. You must access this site via HTTPS");
}

function initialize() {
    geocoder = new google.maps.Geocoder();
}

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      
        if (results[1]) {

        	//find city name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

                if (results[0].address_components[i].types[b] == "administrative_area_level_2") {
                    //this is the object we are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        
        //city data
        cityName = city.short_name;
        console.log(cityName);
        
        runAjax(); //we have the city name by now

        } else {
          console.log("No results found");
        }
      } else {
       console.log("Geocoder failed due to: " + status);
      }
    });
  }
  
</script>

<!-- // GEOLOCATION STUFF -->