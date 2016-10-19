@extends('layouts.app')

@extends('navbar.navbar')

@section('monitoringGraph')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<link href="{{ url ('/css/monitoring.css')}}" rel="stylesheet">
<div id="main" class="main">
	<div id="container"></div>
</div>
@endsection