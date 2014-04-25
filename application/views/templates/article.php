<div class="row" style=" margin-top: 4%; margin-bottom: 4%;">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url();?>">Home</a></li>
                    <li><a href="<?php echo site_url('blog');?>">Blog</a></li>
                    <li class="active"><?php echo $article->title;?></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div style="margin-right: 2%">
        
        <article>
            <div class="row">
                <div class="col-xs-12">
                    <div id="error-4"></div>
                    <h2><?php echo e($article->title);?></h2>
                    <!--<small><i class="glyphicon glyphicon-time"></i> </small>-->
                    <?php 
                        $array = explode('#', $article->tags);
                        echo '<div class="">';
                        foreach ($array as $k) {
                            if($k != '')
                            echo '<a class="label label-default" style=" margin-bottom: 1%" href="'.  
                                    site_url('blog/tag/'.$k).'">'.$k.'</a> ';
                        }
                        echo '</div>';
                        ?>
                    <p style="margin-top: 10px; margin-bottom: 10px;"><i class="glyphicon glyphicon-time"></i> <?php echo $modified;?></p>
                </div>
            </div>
            <p style="font-family: 'Josefin Slab', serif; font-size: 21px;"><?php echo $article->body;?></p>
        </article>
    </div>
</div>
    <?php // echo $this->load->view('sidebar');?>
    <?php echo $this->load->view('templates/comments');?>
    </div>
