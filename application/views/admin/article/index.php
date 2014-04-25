<section>
    <h2>Article</h2>
    <a href="article/edit"><i class="glyphicon glyphicon-plus"></i> Add an article</a>
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
            <?php if(count($articles)): foreach ($articles as $article):?>
            
            <tr>
                <td><?php echo anchor('admin/article/edit/'.$article->id, $article->title); ?></td>
                <td><?php echo $article->pubdate; ?></td>
                <td><?php echo btn_edit('admin/article/edit/'.$article->id); ?></td>
                <td><a href="article/delete/<?php echo $article->id; ?>" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?'); ">
                       <i class="glyphicon glyphicon-remove"></i></a></td>
            </tr>
            <?php endforeach; ?>
                <?php else:?>
        <td colspan="3">No articles were found.</td>
            <?php endif; ?>
        </tbody>
    </table>
</section>