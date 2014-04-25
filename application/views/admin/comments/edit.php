    <h3><?php echo empty($comments->id)? '':'Edit comments ' ?></h3>
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <table class="table">
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'pubdate',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Publication Date'), set_value('pubdate', $comments->pubdate)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'nick',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'nick'), set_value('nick', $comments->nick)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'blog_id',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'blog_id'), set_value('blog_id',$comments->blog_id)); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'reply',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'reply'), set_value('reply',$comments->reply)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'verify',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'verify'), set_value('verify',$comments->verify)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_textarea(array('name' => 'comment',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'comment'), set_value('comment',$comments->comment)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit(array('name' => 'submit',
                                             'value' => 'Save',
                                             'class' => 'btn btn-primary')); ?></td>
            
        </tr>
    </table>
    <?php echo form_close();?>