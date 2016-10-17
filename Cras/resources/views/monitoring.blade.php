@extends('layouts.app')

@extends('navbar.navbar')

@section('monitoringGraph')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<link href={{ url ("/css/monitoring.css")}} rel="stylesheet">

<div id="main" class="main">
  <div id="container" style="min-width: 310px; max-width: 90%; height: 400px; margin: 0 auto"></div>
</div>
<script src={{ url ("/js/graph.js")}} ></script>
@endsection