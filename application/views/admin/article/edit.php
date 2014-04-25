    <h3><?php echo empty($article->id)? 'Add a article':'Edit article '.$article->title ?></h3>
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <table class="table">
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'pubdate',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Publication Date'), set_value('pubdate', $article->pubdate)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'title',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Title'), set_value('title', $article->title)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'slug',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Slug'), set_value('slug',$article->slug)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_textarea(array('name' => 'body',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Body'), set_value('body',$article->body)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit(array('name' => 'submit',
                                             'value' => 'Save',
                                             'class' => 'btn btn-primary')); ?></td>
            
        </tr>
    </table>
    <?php echo form_close();?>