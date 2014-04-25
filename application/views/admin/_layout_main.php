<?php $this->load->view('admin/components/page_head'); ?>      
  <body>
      
      <header>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <a class="navbar-brand" href="<?php echo site_url('admin/dashboard') ?>">CMS</a>
            <ul class="nav navbar-nav">
              <li><?php echo anchor('admin/page', 'Page'); ?></li>
              <li><?php echo anchor('admin/user', 'User'); ?></li>
              <li><?php echo anchor('admin/article', 'Articles'); ?></li>
              <li><?php echo anchor('admin/comments', 'Comments'); ?></li>
            </ul>
        </nav>
      </header>
      <div class="container">
          <div class="row ">
              <br><br>
            <div class=" col-lg-9">
                <?php $this->load->view($subview);?>
            </div>
              <br><br>
            <div class="col-lg-3">
                <section>
                    <a href="user/logout"><i class="glyphicon glyphicon-log-out"></i> logout</a>
                </section>
            </div>
          </div>
      </div>
<?php $this->load->view('admin/components/page_tail'); ?>
