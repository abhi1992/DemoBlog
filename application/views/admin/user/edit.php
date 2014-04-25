<h3><?php echo empty($user->id)? 'Add a user':'Edit user '.$user->name ?></h3>
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <table class="table">
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'email',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Email'), set_value('email', $user->email)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'name',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Name'), set_value('name',$user->name)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'password',
                                            'type' => 'password',
                                            'class' => 'form-control',
                                            'placeholder' => 'password')); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'password_confirm',
                                            'type' => 'password',
                                            'class' => 'form-control',
                                            'placeholder' => 'password confirm')); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit(array('name' => 'submit',
                                             'value' => 'Save',
                                             'class' => 'btn btn-primary')); ?></td>
            
        </tr>
    </table>
    <?php echo form_close();?>