<!DOCTYPE html>
 
<html lang="en">
    <head>
        <script src="b/js/jquery.js"></script>
        <meta charset="UTF-8" />
        <title>Backbone.js Web App</title>
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
        <div id="ad"></div>
        <script>
            $(document).ready(

                function poll() {
                    $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('api/blog/');?>",
                    
                }).done(function (data) {
                    $('#ad').html(jQuery.parseJSON(data));
                }
                }

                );
        
        </script>
        
        <script src="js/Underscore-min.js"></script>
        <script src="js/Backbone-min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>