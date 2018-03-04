<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Prestigious
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Prestigious</title>
    <base href="<?php echo base_url();?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="public/prestigious/layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<?php if(isset($header) && !empty($header)) $this->load->view($header);?>
<?php if(isset($content) && !empty($content)) $this->load->view($content);?>
<?php if(isset($footer) && !empty($footer)) $this->load->view($footer);?>
</body>
</html>