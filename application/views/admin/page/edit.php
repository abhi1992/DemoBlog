    <h3><?php echo empty($page->id)? 'Add a page':'Edit page '.$page->title ?></h3>


    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <table class="table">
        <tr>
            <td></td>
            <td><?php echo form_dropdown('parent_id', $pages_no_parent, 
                    $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_dropdown('template', array('page'=>'Page', 'homepage'=>'Homepage'
                , 'blog'=>'Blog'), 
                    $this->input->post('template') ? $this->input->post('template') : $page->template); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'title',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Title'), set_value('title', $page->title)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'slug',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Slug'), set_value('slug',$page->slug)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_textarea(array('name' => 'body',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Body'), set_value('body',$page->slug)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit(array('name' => 'submit',
                                             'value' => 'Save',
                                             'class' => 'btn btn-primary')); ?></td>
            
        </tr>
    </table>
    <?php echo form_close();?>