<div class="wrapper col1">
    <div id="topbar">
        <p>Tel: 0983397580 | Mail: phongvt@gmail.com</p>
        <ul>
            <li><a href="#">Libero</a></li>
            <li><a href="#">Maecenas</a></li>
            <li><a href="#">Mauris</a></li>
            <li class="last"><a href="#">Suspendisse</a></li>
        </ul>
        <br class="clear" />
    </div>
</div>
<div class="wrapper col2">
    <div id="header">
        <div id="topnav">
            <ul>
                <li class="last"><a href="home">Link text</a><span>Test Text Here</span></li>
                <li><a href="#">DropDown</a><span>Test Text Here</span>
                    <ul>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                    </ul>
                </li>
                <li <?php echo (isset($active) && $active == 'full-width')?'class="active"': ''?>><a href="full-width">Full Width</a><span>Test Text Here</span></li>
                <li <?php echo (isset($active) && $active == 'style-demo')?'class="active"': ''?>><a href="style-demo">Style Demo</a><span>Test Text Here</span></li>
                <li <?php echo (isset($active) && $active == 'home-page')?'class="active"': ''?>><a href="home">Homepage</a><span>Test Text Here</span></li>
            </ul>
        </div>
        <div id="logo">
            <h1><a href="home">Prestigious</a></h1>
            <p>Free Website Template</p>
        </div>
        <br class="clear" />
    </div>
</div>