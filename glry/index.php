<html>
    <head>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.nanogallery.js"></script>
        <link href="css/nanogallery.css" rel="stylesheet" type="text/css">
        <script src="js/images.js"></script>

        <link rel='stylesheet' href="css/bootstrap.min.css">
        <script>
            $(function () {

                $('#plusgallery').plusGallery();
            });

            function scroll() {
                $('html, body').animate({
                    scrollTop: $("#ref").offset().top
                }, 1000);
            }
        </script>
    </head>

    <body style='margin:0 auto;'>
        <div style='width:100%; height:600px; margin:0 auto;' class='container-fluid'>
            <iframe width='100%' frameborder='0' style=' height:600px;' src="glry.php"></iframe>
        </div>
        <div class='container-fluid'>
            <div  class='col-xs-2 col-xs-offset-5' style='height:80px;' >
                <center>  <span onclick="scroll()" id='img_btn' style='font-size:80px; cursor:pointer' class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></center>
            </div>
        </div>
        <div id='ref'></div>
        <div style='width:100%; height:auto; max-width:1120px; margin:0 auto;'>
            <div id="nanoGallery4"></div>
        </div>


    </body>
</html>



