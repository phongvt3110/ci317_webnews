<!-- Page Head -->
<h2><?=(isset($mode) && $mode=='edit')?'Cập nhật danh mục':'Thêm danh mục mới'?></h2>
<p id="page-intro"><?=(isset($mode) && $mode=='edit')?'Sửa bài viết':'Thêm bài viết mới'?></p>
<?php $this->load->view('backend/layouts/shortcut');?>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->

    <div class="content-box-header">

        <h3>Thông tin</h3>
        <div class="clear"></div>

    </div> <!-- End .content-box-header -->

    <div class="content-box-content">
        <form action="categories/add" method="post">
            <fieldset>
                <p>
                    <label>Title</label>
                    <input class="text-input large-input" type="text" id="large-input" name="title" value="<?= set_value('title',isset($cat)?$cat['title']:'')?>"/>
                </p>
                <p>
                    <label>Description</label>
                    <textarea class="text-input textarea wysiwyg" id="textarea" name="description" cols="79" rows="15" value="<?= isset($cat)?$cat['description']:''?>"></textarea>
                </p>

                <p>
                    <input class="button" type="submit" name="submit" value="<?= (isset($mode) && $mode=='edit')?'Cập nhật':'Thêm mới'?>" />
                </p>
            </fieldset>
            <div class="clear"></div><!-- End .clear -->
        </form>
    </div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->