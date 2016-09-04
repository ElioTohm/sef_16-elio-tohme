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
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
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
        <div id="content" >
            <div id="dvloader">
                <img src="img/loading.gif">
            </div>
            <div id="summary"></div>
        </div>

        <!-- Script to load after the element are present -->
        <script src="js/main.js"></script>        
    </body>
</html>


