<!-- Page Head -->
<h2>Welcome <?php echo isset($user)?$user['name']:'anonymous';?></h2>
<p id="page-intro">What would you like to do?</p>

<?php $this->load->view('backend/layouts/shortcut');?>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->

    <div class="content-box-header">

        <h3>Danh sách bài viết</h3>
        <div class="clear"></div>

    </div> <!-- End .content-box-header -->

    <div class="content-box-content">
        <table>
            <thead>
            <tr>
                <th><input class="check-all" type="checkbox" /></th>
                <th>Title</th>
                <th>Description</th>
                <th>Content</th>
                <th style="width: 100px;">Category Id</th>
                <th style="width: 100px;">Created at</th>
                <th style="width: 100px;">Updated at</th>
                <th style="width: 80px;text-align: center;"></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="bulk-actions align-left">
                        <select name="dropdown">
                            <option value="option1">Choose an action...</option>
                            <option value="option2">Edit</option>
                            <option value="option3">Delete</option>
                        </select>
                        <a class="button" href="#">Apply to selected</a>
                    </div>

                    <div class="pagination">
                        <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                        <a href="#" class="number" title="1">1</a>
                        <a href="#" class="number" title="2">2</a>
                        <a href="#" class="number current" title="3">3</a>
                        <a href="#" class="number" title="4">4</a>
                        <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                    </div> <!-- End .pagination -->
                    <div class="clear"></div>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <?php
            foreach ($articles as $row) {
                ?>
                <tr>
                    <td><input type="checkbox"/></td>

                    <td hidden><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= htmlspecialchars(cutnchar($row['description'], 20))?></td>
                    <td><?= htmlspecialchars(cutnchar($row['content'], 20)) ?></td>
                    <td><?= $row['catid'] ?></td>
                    <td><?= date('d/m/Y',strtotime($row['created_at'])) ?></td>
                    <td><?= DateTime::createFromFormat('Y-m-d H:i:s',$row['updated_at'])->format('d/m/Y') ?></td>
                    <td>
                        <!-- Icons -->
                        <a href="admin/articles/edit?id=<?= $row['id']?>" title="Edit"><img src="public/simpla-admin/resources/images/icons/pencil.png"
                                                                                              alt="Edit"/></a>
                        <a href="admin/articles/delete?id=<?= $row['id']?>" title="Delete"><img src="public/simpla-admin/resources/images/icons/cross.png"
                                                                                                  alt="Delete"/></a>
                        <a href="#" title="Edit Meta"><img
                                    src="public/simpla-admin/resources/images/icons/hammer_screwdriver.png"
                                    alt="Edit Meta"/></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->