<section>
    <h2>Pages</h2>
    <a href="page/edit"><i class="glyphicon glyphicon-plus"></i> Add a page</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Parent</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if(count($pages)): foreach ($pages as $page):?>
            
            <tr>
                <td><?php echo anchor('admin/page/edit/'.$page->id, $page->title); ?></td>
                <td><?php echo $page->parent_slug; ?></td>
                <td><?php echo btn_edit('admin/page/edit/'.$page->id); ?></td>
                <td><a href="page/delete/<?php echo $page->id; ?>" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?'); ">
                       <i class="glyphicon glyphicon-remove"></i></a></td>
            </tr>
            <?php endforeach; ?>
                <?php else:?>
        <td colspan="3">No pages were found.</td>
            <?php endif; ?>
        </tbody>
    </table>
</section>