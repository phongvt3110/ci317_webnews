<!-- Page Head -->
<h2>List danh mục</h2>
<p id="page-intro">What would you like to do?</p>

<?php
$this->load->view('backend/layouts/shortcut');
?>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->

    <div class="content-box-header">

        <h3>Categories list</h3>
        <div class="clear"></div>

    </div> <!-- End .content-box-header -->

    <div class="content-box-content">
        <form action="categories/listcat" method="post">
        <?php
            $flagdata_message = $this->session->flashdata('flashdata_message');
            if(isset($flagdata_message) && count($flagdata_message)){
                if($flagdata_message['type'] == 'insert_successful'){
        ?>
        <div class="notification success png_bg">
            <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>
                <?= $flagdata_message['message'] ?>
            </div></div>
        <?php
            }
            else if($flagdata_message['type'] == 'insert_error'){
        ?>
        <div class="notification error png_bg">
            <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>
                <?= $flagdata_message['message'] ?>
            </div></div>
        <?php
            }
            else if($flagdata_message['type'] == 'update_successful'){
                ?>
                <div class="notification success png_bg">
                    <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                    <div>
                        <?= $flagdata_message['message'] ?>
                    </div></div>
                <?php
            }
            else if($flagdata_message['type'] == 'update_error'){
                ?>
                <div class="notification error png_bg">
                    <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                    <div>
                        <?= $flagdata_message['message'] ?>
                    </div></div>
                <?php
            }
            else if($flagdata_message['type'] == 'delete_successful'){
                ?>
                <div class="notification success png_bg">
                    <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                    <div>
                        <?= $flagdata_message['message'] ?>
                    </div></div>
                <?php
            }
            else if($flagdata_message['type'] == 'delete_error'){
                ?>
                <div class="notification error png_bg">
                    <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                    <div>
                        <?= $flagdata_message['message'] ?>
                    </div></div>
                <?php
            }
            }
        ?>
        <table>
            <?php
            if (isset($categories) && count($categories)) {
                ?>
                <thead>
                <tr>
                    <th><input class="check-all" type="checkbox"/></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Publish</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th></th>
                </tr>
                </thead>
                <?php
            }
            ?>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="bulk-actions align-left">
                        <select name="action">
                            <option value="">Choose an action...</option>
                            <option value="delete">Delete</option>
                            <option value="publish">Publish</option>
                            <option value="unpublish">Unpublish</option>
                        </select>
                        <a class="button" href="#" id="link-submit">Apply to selected</a>
                        <input style="display: none" id="btn-submit" type="submit" name="submit" value="Apply to selected" />
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
            if (isset($categories) && count($categories)){
                foreach ($categories as $row) {
            ?>
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" value="<?= $row['id']?>"/></td>
                        <?php
                            echo '<td hidden>' . $row['id'] . '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td><img src="public/simpla-admin/resources/images/icons/' .  $row['publish'] == 'published' ? 'tick_circle.png"/></td>' : 'cross_circle.png"/></td>';
                            echo '<td>' . date('H:i:s d/m/Y',strtotime($row['created_at'])) . '</td>';
                            echo '<td>' . DateTime::createFromFormat('Y-m-d H:i:s',$row['updated_at'])->format('H:i:s d/m/Y'). '</td>';
                        ?>
                        <td>
                            <!-- Icons -->
                            <a href="categories/edit?id=<?= $row['id']?>" title="Edit"><img src="public/simpla-admin/resources/images/icons/pencil.png"
                                                          alt="Edit"/></a>
                            <a href="categories/delete/<?= $row['id']?>" title="Delete"><img src="public/simpla-admin/resources/images/icons/cross.png"
                                                            alt="Delete"/></a>
                            <a href="#" title="Edit Meta"><img
                                        src="public/simpla-admin/resources/images/icons/hammer_screwdriver.png"
                                        alt="Edit Meta"/></a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="6"> Khong co du lieu </td></tr>';
            ?>
            <?php
            }
            ?>
            </tbody>
        </table>
        </form>
    </div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#link-submit').click(function(){
            $('#btn-submit').click();
            return false;
        })
    })
</script>