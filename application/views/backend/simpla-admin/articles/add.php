<!-- Page Head -->
<h2>Viết bài mới</h2>
<p id="page-intro">Module bài viết</p>
<?php $this->load->view('backend/layouts/shortcut');?>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->

    <div class="content-box-header">

        <h3>Content box</h3>
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Thông tin chung</a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2">Meta</a></li>
        </ul>
        <div class="clear"></div>

    </div> <!-- End .content-box-header -->

    <div class="content-box-content">
        <form action="#" method="post">
            <div class="tab-content default-tab" id="tab1">
                <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

                    <p>
                        <label>Small form input</label>
                        <input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
                        <br /><small>A small description of the field</small>
                    </p>

                    <p>
                        <label>Medium form input</label>
                        <input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
                    </p>

                    <p>
                        <label>Large form input</label>
                        <input class="text-input large-input" type="text" id="large-input" name="large-input" />
                    </p>

                    <p>
                        <label>Checkboxes</label>
                        <input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
                    </p>

                    <p>
                        <label>Radio buttons</label>
                        <input type="radio" name="radio1" /> This is a radio button<br />
                        <input type="radio" name="radio2" /> This is another radio button
                    </p>

                    <p>
                        <label>This is a drop down list</label>
                        <select name="dropdown" class="small-input">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                        </select>
                    </p>

                    <p>
                        <label>Textarea with WYSIWYG</label>
                        <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
                    </p>

                    <p>
                        <input class="button" type="submit" value="Submit" />
                    </p>
                </fieldset>
                <div class="clear"></div><!-- End .clear -->
            </div>
            <div class="tab-content" id="tab2">
                <fieldset>
                    <p>
                        <label>Small form input</label>
                        <input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
                        <br /><small>A small description of the field</small>
                    </p>

                    <p>
                        <label>Medium form input</label>
                        <input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
                    </p>

                    <p>
                        <label>Large form input</label>
                        <input class="text-input large-input" type="text" id="large-input" name="large-input" />
                    </p>
                    <p>
                        <label>This is a drop down list</label>
                        <select name="dropdown" class="small-input">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                        </select>
                    </p>
                    <p>
                        <input class="button" type="submit" value="Submit" />
                    </p>
                </fieldset>
                <div class="clear"></div>
            </div>
        </form>
    </div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->