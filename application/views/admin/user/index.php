<section>
    <h2>Users</h2>
    <a href="user/edit"><i class="glyphicon glyphicon-plus"></i> Add a user</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if(count($users)): foreach ($users as $user):?>
            
            <tr>
                <td><?php echo anchor('admin/user/edit/'.$user->id, $user->email); ?></td>
                <td><?php echo btn_edit('admin/user/edit/'.$user->id); ?></td>
                <td><a href="user/delete/<?php echo $user->id; ?>" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?'); ">
                       <i class="glyphicon glyphicon-remove"></i></a></td>
            </tr>
            <?php endforeach; ?>
                <?php else:?>
        <td colspan="3">No users were found.</td>
            <?php endif; ?>
        </tbody>
    </table>
</section>