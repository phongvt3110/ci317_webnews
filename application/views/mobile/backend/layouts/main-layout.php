<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="<?php echo base_url();?>"/>
    <title>Administrator</title>

    <!--                       CSS                       -->

    <!-- Reset Stylesheet -->
    <link rel="stylesheet" href="public/simpla-admin/resources/css/reset.css" type="text/css" media="screen" />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="public/simpla-admin/resources/css/style.css" type="text/css" media="screen" />

    <!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
    <link rel="stylesheet" href="public/simpla-admin/resources/css/invalid.css" type="text/css" media="screen" />

    <!-- Colour Schemes

    Default colour scheme is green. Uncomment prefered stylesheet to use it.

    <link rel="stylesheet" href="public/simpla-admin/resources/css/blue.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="public/simpla-admin/resources/css/red.css" type="text/css" media="screen" />

    -->

    <!-- Internet Explorer Fixes Stylesheet -->

    <!--[if lte IE 7]>
    <link rel="stylesheet" href="public/simpla-admin/resources/css/ie.css" type="text/css" media="screen" />
    <![endif]-->

    <!--                       Javascripts                       -->

    <!-- jQuery -->
    <script type="text/javascript" src="public/simpla-admin/resources/scripts/jquery-1.3.2.min.js"></script>

    <!-- jQuery Configuration -->
    <script type="text/javascript" src="public/simpla-admin/resources/scripts/simpla.jquery.configuration.js"></script>

    <!-- Facebox jQuery Plugin -->
    <script type="text/javascript" src="public/simpla-admin/resources/scripts/facebox.js"></script>

    <!-- jQuery WYSIWYG Plugin -->
    <script type="text/javascript" src="public/simpla-admin/resources/scripts/jquery.wysiwyg.js"></script>

    <!--[if IE]><script type="text/javascript" src="public/simpla-admin/resources/scripts/jquery.bgiframe.js"></script><![endif]-->


    <!-- Internet Explorer .png-fix -->

    <!--[if IE 6]>
    <script type="text/javascript" src="public/simpla-admin/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.png_bg, img, li');
    </script>
    <![endif]-->

</head>

<body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
    <?php $this->load->view('desktop/backend/layouts/sidebar');?>
    <div id="main-content"> <!-- Main Content Section with everything -->

        <noscript>
            <div class="notification error png_bg">
                <div>
                    Javascript is disabled or is not supported by your browser.
                    Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser
                    or <a href="http://www.google.com/support/bin/answer.py?answer=23852"
                          title="Enable Javascript in your browser">enable</a>
                    Javascript to navigate the interface properly.
                    Download From <a href="http://www.exet.tk">exet.tk</a>
                </div>
            </div>
        </noscript>
            <?php if(isset($content)) $this->load->view($content);?>
        <div class="clear"></div>

        <div id="footer">
            <small> <!-- Remove this notice or replace it with whatever you want -->
                <p>Address: Khuong dinh, Thanh Xuan, Hanoi</p>
                <p>Hot line: 0983397580</p>
                &#169; Copyright 2009 - <?= date('d/m/Y')?> iCi Co., Ltd | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">iCi Administrators group</a> | <a href="#">Top</a>
            </small>
        </div><!-- End #footer -->

    </div> <!-- End #main-content -->
</div>
</body>
</html>
