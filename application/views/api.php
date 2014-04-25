<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Backbone.js Web App</title>
        <link rel="stylesheet" href="<?php echo site_url('b/css/styles.css');?>" />
        <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
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
                        <li class=""><a href="<?php echo site_url('blog'); ?>" class="my-link ">Blog</a></li>
                    </ul>
                    
                </div>
            </div>
        </nav>
          
      </header>
        <div class="container " style="margin-top: 4%;">
        <div id="blogs"></div>
        <div id="postComment" class="row">
            <div class="col-sm-10">
            <h3>Post a Comment</h3>
        <hr>
        <?php $CI =& get_instance();?>
        <?php $attributes = array('onsubmit' => 'return postComment(\'email1\', \'password1\', \'txt1\', \'#div_email1\', \'#div_pass1\', \'#div_comment1\');');?>
        <?php echo form_open(site_url('comments/index/'.$article->id), $attributes);?>
        <input id="nick1" name="nick" placeholder="nick namme" type="text" class="form-control">
        <input id="reply" name="reply" type="hidden" value="0" class="form-control">
        <div id="div_comment1">
        <textarea id="txt1" class="form-control" name="comment" type="text" style="margin-top: 1%; height: 150px"
                  placeholder="comment" onclick="hidea(3, '#div_comment1');"></textarea>
        </div>
        <input id = "button1" type="submit" value="Post" style="margin-top: 1%;"  class="btn btn-primary"/>
        <?php echo form_close();?>
            </div>
        </div>
        <div id="comments">
            <h1>Comments</h1><hr>
        </div>
        </div>
        <script id="commentTemplate" class="" type="text/template">
            <div class="comment-1">
            <div class="row">
            <div class="col-sm-11" style="margin-left:2%;margin-top:2%;">
            <%= nick %><span style="float:right"><%= pub_date %></span><hr>
            <div style="margin-bottom: 2%;"><%= comment %></div>
            </div>
            </div>
            </div>
        </script>
        <script id="blogTemplate" type="text/template">
            <h1><%= title %></h1>
            <span class="glyphicon glyphicon-time"></span> <%= pub_date %>
            <% _.each( tags, function( tagz ) {%> <div class="label label-default"><%= tagz.tag %></div><% } ); %>
            <div style="font-family: 'Josefin Slab', serif; font-size: 21px;"><%= blog %></div>
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
    app.comments = [<?php for($i = 0; $i <count($comments); $i++):?>
        {
            
        id: <?php echo json_encode($comments[$i]['id']);?>,
        nick: <?php echo json_encode($comments[$i]['nick']);?>,
        comment_id: <?php echo json_encode($comments[$i]['comment_id']);?>,
        comment: <?php echo json_encode($comments[$i]['comment']);?>,
        pub_date: <?php echo json_encode($comments[$i]['pubdate']);?>,
        
    },
        <?php endfor;?>
    ];
    
    app.blogs = [{ blog: <?php echo json_encode($article->body);?>,
            pub_date: <?php echo json_encode($article->modified)?>,
            title: <?php echo json_encode($article->title)?> ,
        tags: [<?php 
                        $array = explode('#', $article->tags);
                        foreach ($array as $k) {if($k != '') {echo json_encode ($k).', ';}}
                        ?>],}
    ];
        </script>
        <footer style="margin-top: 1%; margin-bottom: 1%;">
            <div class="container">
        <hr>
        &COPY;Company 2014 All Rights Reserved
            </div>
        </footer>
    </body>
    
</html>

