<?php $this->load->view('admin/components/page_head'); ?>

<body style="background: #555">
    
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="modal show modal-content col-lg-6" role="dialog">
                <?php $this->load->view($subview); ?>
                <div class="modal-footer">
                    &COPY; <?php echo $meta_title;?>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/components/page_tail'); ?>
