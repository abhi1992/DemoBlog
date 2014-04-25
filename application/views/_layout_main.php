<?php $this->load->view('components/page_head'); ?>
<body >
      <div class="wrapper">
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
          
              <?php $this->load->view('templates/'.$subview); ?>
      </div>
      </div>
      
<?php $this->load->view('components/page_tail'); ?>
