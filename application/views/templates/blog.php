<div class="row" style="margin-top: 4%">
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

    <?php // echo $this->load->view('sidebar');?>



<div class="col-lg-12">
    <div>
        <?php if($pagination):?>
        <section><?php echo $pagination;?></section>
        <?php endif;?>
    </div>
</div>
<div class="col-lg-12">
</div>  
</div>
</div>