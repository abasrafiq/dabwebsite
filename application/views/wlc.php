 <link type="text/css" href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet" />
<div id="slideShow">
		<div id="slideShowItems" dir="rtl">
			<?php 
			$table = lang('new1');
			foreach (${$table} as $row):  ?>
			<div>
				<img alt="" src="<?php echo base_url();?>/assets/images/slide/<?php echo $row->article_pic; ?>.jpg" border="0" width="240px" height="200px"/>
				<h5>
					<a href="<?php echo base_url(); ?><?php echo lang('lan'); ?>/news/single/<?php echo $row->article_number; ?>"><?php echo $row->title; ?></a>
		
					</h5>
				<p class="PONT"><?php echo substr($row->body, 0 ,400); ?>...</p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>   
	<br /> 
<center><p id="pnews"><?php echo lang('mci_example_1'); ?></p></center>
