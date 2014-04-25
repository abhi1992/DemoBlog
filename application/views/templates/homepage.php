<?php $this->load->view('components/page_head'); ?>
<body >
    <div class="wrapper" style="margin-bottom: 2%;">
      <header>
          
        <nav class="navbar navbar-fixed-top head" role="navigation">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="glyphicon glyphicon-circle-arrow-down" style="color: white;"></span>
                    </button>
                    <a class="navbar-brand my-link" href="<?php echo site_url('') ?>">CMS</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul id = "nav_ul_left" class="nav navbar-nav">
                        <li class=""><a href="<?php echo site_url('blog'); ?>" class="my-link ">Blog</a></li>
                    </ul>
                    
                </div>
            </div>
        </nav>
          
      </header>
      
      <div class="container">
          <br><br>
          
              <div class="row" style="margin-top: 0%">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url();?>">Home</a></li>
                <li class="active">Blog</li>
            </ol>
        </div>
    </div>
    <div class="">
<div class="col-lg-9">    
    <div class="">
        <div class=""><?php if (isset($articles[0])){echo get_excerpt($articles[0]);}?></div>
    </div>
    <div class="">
        <div class=""><?php if (isset($articles[1]))echo get_excerpt($articles[1]);?></div>
    </div>
    <div class="">
        <div class=""><?php if (isset($articles[2]))echo get_excerpt($articles[2]);?></div>
    </div>
    <div class="">
        <div class=""><?php if (isset($articles[3]))echo get_excerpt($articles[3]);?></div>
    </div>
    <div class="">
        <div class=""><?php if (isset($articles[4]))echo get_excerpt($articles[4]);?></div>
    </div>
    <div class="">
        <div class=""><?php if (isset($articles[5]))echo get_excerpt($articles[5]);?></div>
    </div>
</div>  
</div>
</div>
      </div>
      </div>

