<div class="modal-header">
    <h3>Login</h3>
    <p>
        Please Login your credentials.
    </p>
</div>
<div class="modal-body ">
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <table class="table">
        <tr>
            <td></td>
            <td><?php echo form_input(array('name' => 'email',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'address@email.com')); ?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_password(array('name' => 'password',
                                             'class' => 'form-control',
                                             'placeholder' => 'password')); ?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit(array('name' => 'submit',
                                             'value' => 'Log In',
                                             'class' => 'btn btn-primary')); ?></td>
            <td></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>