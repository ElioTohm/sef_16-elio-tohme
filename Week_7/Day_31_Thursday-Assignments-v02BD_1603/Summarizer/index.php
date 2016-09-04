<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Summarizer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!-- HEADER section -->
        <div id="main-wrapper">
            <div id='form'>
                <input type="url" id="target-url" placeholder="url" required>
                <button id="submit" >Summurize</button> 
            </div>
        </div>        
        <!-- Summary of the given URL -->
        <div id="summary" >
            <div id="dvloader">
                <img src="img/loading.gif">
            </div>
        </div>

        <!-- Script to load after the element are present -->
        <script src="js/main.js"></script>        
    </body>
</html>


