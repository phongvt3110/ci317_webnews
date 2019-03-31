<?php
    function fullurl($use_forwarded_host = false){
        $ssl = (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')? true:false;
        $sp = strtolower($_SERVER['SERVER_PROTOCOL']);
        $protocol = substr($sp,0,strpos($sp,'/')) . (($ssl)?'s':'');
        $port = $_SERVER['SERVER_PORT'];
        $port = ((!$ssl && $port==80) || ($ssl && $port==443))? '': ':' . $port;
        $host = (isset($use_forwarded_host) && isset($_SERVER['HTTP_X_FORWARDED_HOST']))? $_SERVER['HTTP_X_FORWARDED_HOST']: (isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:null);
        $host = isset($host)? $host : $_SERVER['SERVER_NAME'] . $port;
        return $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
    }
?>
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
        <form action="admin/categories/action" method="post">
            <input type="hidden" name="redirect" value="<?= base64_encode(fullurl())?>">
        <?php
            $flagdata_message = $this->session->flashdata('flashdata_message');
            if(isset($flagdata_message) && count($flagdata_message)){
                if($flagdata_message['type'] == 'successful'){
        ?>
        <div class="notification success png_bg">
            <a href="#" class="close"><img src="public/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>
                <?= $flagdata_message['message'] ?>
            </div></div>
        <?php
            }
            else if($flagdata_message['type'] == 'error'){
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
                <td colspan="7">
                    <div class="bulk-actions align-left">
                        <select name="action" id="select-action">
                            <option value="">Choose an action...</option>
                            <option value="delete">Delete</option>
                            <option value="published">Publish</option>
                            <option value="unpublished">Unpublish</option>
                        </select>
                        <a class="button" href="#" id="link-submit">Apply to selected</a>
                        <input style="display: none" id="btn-submit" type="submit" name="submit" value="Apply to selected" />
                    </div>
                    <?= isset($listcategories)? $listcategories : '' ?>
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

                            <td hidden> <?= $row['id'] ?> </td>
                            <td> <?= $row['title'] ?> </td>
                            <td> <?= $row['description'] ?> </td>
                        <td>
                            <a href="categories/togglepushlish/publish/<?= $row['id']?>/<?= ($row['publish'] == 'published')? 'unpublished' : 'published' ?>?r=<?= base64_encode(fullurl())?>">
                                <img src="public/simpla-admin/resources/images/icons/<?= ($row['publish'] == 'published')? 'tick_circle.png' : 'cross_circle.png' ?>"/>
                            </a>
                        </td>

                        <td><?= date('H:i:s d/m/Y',strtotime($row['created_at'])) ?></td>
                        <td><?= DateTime::createFromFormat('Y-m-d H:i:s',$row['updated_at'])->format('H:i:s d/m/Y') ?></td>
                        <td>
                            <!-- Icons -->
                            <a href="categories/edit?id=<?= $row['id']?>&r=<?= base64_encode(fullurl()) ?>" title="Edit">
                                <img src="public/simpla-admin/resources/images/icons/pencil.png" alt="Edit"/>
                            </a>
                            <a href="categories/delete/<?= $row['id']?>?r=<?= base64_encode(fullurl()) ?>" title="Delete">
                                <img src="public/simpla-admin/resources/images/icons/cross.png" alt="Delete"/>
                            </a>
                            <a href="#" title="Edit Meta">
                                <img src="public/simpla-admin/resources/images/icons/hammer_screwdriver.png" alt="Edit Meta"/>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr><td colspan="6"> Khong co du lieu </td></tr>
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
        var flag;
        $('#link-submit').click(function(){
            if($('#select-action').val() === 'delete'){
                flag = confirm('Ban co thuc su muon xoa?');
                if(flag == true){
                    $('#btn-submit').click();
                }
            } else {
                $('#btn-submit').click();
            }
            return false;
        })
    })
</script>