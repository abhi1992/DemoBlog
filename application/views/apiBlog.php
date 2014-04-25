<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Backbone.js Web App</title>
        <link rel="stylesheet" href="<?php echo site_url('b/css/styles.css');?>" />
        <link rel="stylesheet" href="<?php echo site_url('b/css/bootstrap.min.css');?>" />
    </head>
    <body>
        <header>
          
        <nav class="navbar navbar-fixed-top head" role="navigation">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="glyphicon glyphicon-circle-arrow-down" style="color: white;"></span>
                    </button>
                    <a class="navbar-brand my-link" href="#">CMS</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul id = "nav_ul_left" class="nav navbar-nav">
                        <!--<li class=""><a href="<?php // echo site_url('blog'); ?>" class="my-link ">Blog</a></li>-->
                    </ul>
                    
                </div>
            </div>
        </nav>
          
      </header>
        
        <div class="container " style="margin-top: 4%;">
        <div id="blogs"></div>
        <div id="postComment">
            
        </div>
        
        <div class="row">



<div class="col-lg-12">
    <div>
        <?php if($pagination):?>
        <section><?php echo $pagination;?></section>
        <?php endif;?>
    </div>
</div></div>
        </div>
        <script id="blogTemplate" type="text/template">
            <a href="<?php echo site_url();?>article/<%= id %>"><h1><%= title %></h1></a>
            <span class="glyphicon glyphicon-time"></span> <%= pub_date %>
            <div><%= blog %></div>
        </script><!-- -->
        <script src="<?php echo site_url('js/jquery-1.7.1.min.js');?>"></script>
        <script src="<?php echo site_url('js/json2.js');?>"></script>
        <script src="<?php echo site_url('js/underscore-min.js');?>"></script>
        <script src="<?php echo site_url('js/backbone-min.js');?>"></script>
        <script src="<?php echo site_url('b/js/app3.js');?>"></script>
        <script src="<?php echo site_url('js/app.js');?>"></script>
        <!--<script src="js/models.js"></script>-->
        <script>
        var app = app || {};
    //demo data
    app.blogs = [<?php for($i = 0; $i <count($articles); $i++):?>
        {
            
        id: <?php echo json_encode($articles[$i]->id);?>,
        blog: <?php echo json_encode(limit_to_numwords($articles[$i]->body, 50));?>,
        title: <?php echo json_encode($articles[$i]->title);?>,
        pub_date: <?php echo json_encode($articles[$i]->modified);?>,
        
    },
        <?php endfor;?>
    ];
    
        </script>
        <footer>
            <div class="container">
        <hr>
        &COPY;Company 2014 All Rights Reserved
            </div>
        </footer>
    </body>
    
</html>

