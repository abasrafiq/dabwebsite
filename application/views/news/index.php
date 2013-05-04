<br />

<?php 
$table = lang('new1');
foreach (${$table} as $row):  ?>
<center>
	 <div id="pnews">
		<b id="title1"><?php echo $row->title; ?></b>
		&nbsp;<?php echo substr($row->body, 0 ,400); ?>...
		<a href="<?php echo base_url(); ?><?php echo lang('lan'); ?>/news/single/<?php echo $row->article_number; ?>"><?php echo lang('readmore'); ?></a>
		
	 </div>
</center>
<br />
<?php endforeach; ?>
<?php if (strlen($pagination)): ?>
	<div>
		Pages: <?php echo $pagination; ?>
	</div>
	<?php endif; ?>

