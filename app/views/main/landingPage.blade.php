@extends('layouts.mainLayout')
@section('content')
<div id="owl-example" class="owl-carousel">
	<img class="owl-carousel-image" src="statics/images/main/test-image.jpg">
	<img class="owl-carousel-image" src="statics/images/main/test-image2.jpg">
	<img class="owl-carousel-image" src="statics/images/main/test-image3.jpg">
	<img class="owl-carousel-image" src="statics/images/main/test-image4.jpg">
	<img class="owl-carousel-image" src="statics/images/main/test-image5.jpg">
	<img class="owl-carousel-image" src="statics/images/main/test-image6.jpg">
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $("#owl-example").owlCarousel({autoPlay: true, singleItem: true, pagination: false});
	});
</script>
@stop