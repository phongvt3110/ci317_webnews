<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Simpla Admin | Sign In</title>
        <base href="<?php echo base_url();?>"/>
		
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
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="public/simpla-admin/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="public/simpla-admin/resources/images/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				<?php echo form_open('admin/submited',['method'=>'post']);?>
<!--				<form action="admin" method="post">-->
				
					<div class="notification information png_bg">
						<div>
							<?= isset($loginfailed)? $loginfailed:'Please enter your information to login'?>
						</div>
					</div>
					
					<p>
<!--						<label>Username</label>-->
                        <?php echo form_label('Username');
                        $data = array('class'=>'text-input',
                            'type'=>'text',
                            'name'=>'username');
                        echo form_input($data);?>
					</p>
					<div class="clear"></div>
					<p>
<!--						<label>Password</label>-->
<!--						<input class="text-input" type="password" name="password"/>-->
                        <?php
                            echo form_label('Password');
                            $data = array('class'=>'text-input',
                                'type'=> 'password',
                                'name' => 'password');
                            echo form_input($data);
                        ?>
					</p>
					<div class="clear"></div>
					<p id="remember-password">
                        <?php
                            echo form_checkbox(['id'=> 'checkbox_remember','type'=>'checkbox','name' => 'remember'],'checked');
                            echo form_label('Remeber me','checkbox_remember',['style'=>'width: 100px']);
                        ?>
					</p>
					<div class="clear"></div>
                    <p>
                        <?php echo form_submit(['class'=>'button','type'=>'submit','name' => 'submit' ,'value'=>'Sign in']);?>
                    </p>
<!--				</form>-->
                <?php echo form_close();?>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>
