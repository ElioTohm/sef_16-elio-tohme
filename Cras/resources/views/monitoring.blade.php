@extends('layouts.app')

@section('monitoringGraph')

<!-- Styles -->
<link href={{ url ("/css/monitoring.css")}} rel="stylesheet">

<div id="navbar" class="sidenavclosed">
  <a href="javascript:void(0)" class="menubtn" id="menubtn" >&#9776;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main" class="mainwide">
  <h2>Sidenav Push Example</h2>
  <p>Click on the element below to open the side navigation menu, and push this content to the right.</p>
</div>

<!-- animation script -->
<script src={{ url ("/js/monitoring.js")}} ></script>

@endsection