<!-- Page Head -->
<h2>Xóa danh mục</h2>
<p id="page-intro">Xóa danh mục khỏi database</p>
<?php $this->load->view('backend/layouts/shortcut');?>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->

    <div class="content-box-header">

        <h3>Thông tin</h3>
        <div class="clear"></div>

    </div> <!-- End .content-box-header -->

    <div class="content-box-content">
        <form action="categories/delete/<?= $cat['id'] ?>" method="post">
            <fieldset>
                <p>
                    <label>Title</label>
                    <input disabled="disabled" class="text-input large-input" type="text" id="large-input" name="title" value="<?= set_value('title',isset($cat)?$cat['title']:'')?>"/>
                </p>
                <p style="float: right;margin-right: 7px;">
                    <input class="button" type="submit" name="submit" value="Xóa danh mục" />
                    <input class="button" type="submit" name="submit" value="Hủy bỏ" />
                </p>
            </fieldset>
            <div class="clear"></div><!-- End .clear -->
        </form>
    </div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->