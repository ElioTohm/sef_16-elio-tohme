@extends('layouts.app')

@section('welcome')


<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-opacity w3-display-container">
  <div class="w3-display-middle" >
    <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity glyphicon glyphicon-delete">Cras</span>
  </div>
</div>

<!-- Exaplaining Monitoring -->
<div class="w3-content w3-container w3-padding-64">
  <h3 class="w3-center">Monitoring Made Easy</h3>
  <div class="w3-row">
    <div class="w3-center w3-section">
       <p>Cras is your simple monitoring API, it will link any device to our graphical monitorinng solution. By signing in an user key will be provided, and with each processor added another unique key will be associated for maximum security.
       our robust solution insures flexibilty between platforms, making ideal for companies that want a fast and easy web app for monitoring</p>
    </div>
  </div>
</div>

<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-opacity w3-display-container">
  <div class="w3-display-middle">
    <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity glyphicon glyphicon-delete">Simple & Elegant</span>
  </div>
</div>


<!-- Scroll javascript code -->
<script src={{ url ("/js/welcome.js")}} ></script>

@endsection
