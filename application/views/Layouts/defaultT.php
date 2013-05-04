<!DOCTYPE html  lang="da">
<head>
<meta charset=utf-8>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/jquery.js"></Script>
<Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/menu.js"></Script>
<base href="<?php echo base_url();?>" />
<link type="text/css" href="<?php echo base_url();?>/assets/menu/menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url();?>/assets/css/meall.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/slideshow.js"></script>
<link type="text/css" href="<?php echo base_url();?>/assets/menu/poll.css" rel="stylesheet" />


<title></title>
</head>
<body>
<table border="0" id="container" align="center">
  <tr>
    <td colspan="2" class="head">
    	<img src="<?php echo base_url(); ?>/assets/img/<?php echo lang('headlogo'); ?>.png" align="right" width="1000px"/>
    </td>
  </tr>
  <tr>
    <td colspan="2" class=""><div id="menu">
        <ul>
          <li class="last"><a href="<?php echo lang('lan'); ?>"><span><?php echo lang('contacts'); ?></span></a></li>
          <li class="last"><a href="#"><span><?php echo lang('downloads'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/porcurment"><span><?php echo lang('procurement'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/jobs"><span><?php echo lang('jobs'); ?></span></a></li>
          <li class="last"><a href="#"><span><?php echo lang('library'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/formate"><span><?php echo lang('bankformate'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/departments"><span><?php echo lang('department'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/news"><span><?php echo lang('news'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/welcome"><span><?php echo lang('home'); ?></span></a></li>
		
        </ul>
		
      </div>
  </tr>
  <tr>
    <td valign="top"><div id="main" role="main" class="content"> <br />
        {content} </div></td>
    <td class="side" valign="top"><?php echo $this->load->view('Layouts/exchange'); ?><br ?></td>
  </tr>
  <tr>
    <td colspan="2" class="footer">
    	<center><a href="#">Home</a> || <a href="#">Jobs</a> || <a href="#">Publications</a> || <a href="#">Contact Us</a> || <a href="#">centralbank.gov.af</a></center>

    </td>
  </tr>
</table>
</html>