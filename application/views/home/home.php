<?php if(isset($header) && !empty($header)) $this->load->view($header);?>
<?php if(isset($content) && !empty($content)) $this->load->view($content);?>
<?php if(isset($footer) && !empty($footer)) $this->load->view($footer);?>