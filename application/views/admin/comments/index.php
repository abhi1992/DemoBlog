<section>
    <h2>Article</h2>
    <a href="comments/edit"><i class="glyphicon glyphicon-plus"></i> Add a comment</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Pub date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if(count($comments)): foreach ($comments as $comments):?>
            
            <tr>
                <td><?php echo anchor('admin/comments/edit/'.$comments->id, $comments->nick); ?></td>
                <td><?php echo $comments->pubdate; ?></td>
                
                <td><?php echo btn_edit('admin/comments/edit/'.$comments->id); ?></td>
                
                <td><a href="comments/delete/<?php echo $comments->id; ?>" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?'); ">
                       <i class="glyphicon glyphicon-remove"></i></a></td>
                       <td><?php echo form_open(site_url('admin/comments/verify'));?>
                    <input name="id" type="hidden" value="<?php echo $comments->id;?>">
                    <?php if($comments->verify == 1): ?>
                    
                    <input name="verify" type="hidden" value="0">
                    <button class="btn btn-danger">Ban</button>
                    <?php else:?>
                    <input name="verify" type="hidden" value="1">
                    <button class="btn btn-success" >Verify</button>
                    <?php endif;
                            echo form_close();
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
                <?php else:?>
        <td colspan="3">No comments were found.</td>
            <?php endif; ?>
        </tbody>
    </table>
</section>