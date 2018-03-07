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
                <?php
                    if(isset($mode) && isset($cat) && $mode=='edit'){
                        $data = array(
                            'hidden'      => 'hidden',
                            'name'        => 'id',
                            'value'       => $cat['id'],
                        );
                        echo form_input($data);
                    }
                ?>
                <p>
                    <label>Title</label>
                    <input class="text-input large-input" type="text" id="large-input" name="title" value="<?= set_value('title',isset($cat)?$cat['title']:'')?>"/>
                    <?php echo form_error('title', '<span class="input-notification error png_bg">', '</span>'); ?>
                </p>
                <p>
                    <label>Description</label>
                    <textarea class="text-input textarea wysiwyg" id="textarea" name="description" cols="79" rows="15"> <?= set_value('description',isset($cat)?$cat['description']:'')?></textarea>
                    <?php
//                        $data = array(
//                            'name'        => 'description',
//                            'id'          => 'textarea',
//                            'value'       => isset($cat)?$cat['description']:'',
//                            'rows'        => '15',
//                            'cols'        => '79',
//                            'class'       => 'text-input textarea wysiwyg',
//                        );
//                        echo form_textarea($data);
                    ?>
                    <?php echo form_error('description', '<span class="input-notification error png_bg">', '</span>'); ?>
                </p>

                <p>
                    <input class="button" type="submit" name="submit" value="<?= (isset($mode) && $mode=='edit')?'Cập nhật':'Thêm mới'?>" />
                </p>
            </fieldset>
            <div class="clear"></div><!-- End .clear -->
        </form>
    </div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->