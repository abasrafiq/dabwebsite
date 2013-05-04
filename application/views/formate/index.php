
	<?php $language = lang('lan'); 
		  $search = lang('search');
	?>
<div>
	<?php echo form_open('formate/' .$search, 'class = "search"'); ?>
			<?php echo form_label('موضع:', 'ftitle','class = "search"'); ?>
			<?php echo form_input('ftitle', set_value('ftitle'), 'id="ftitle"'); ?>
			<?php echo form_label('بخش:', 'category'); ?>
			<?php echo form_dropdown('category', $category_options, set_value('category'), 'id="category"'); ?>
	<?php echo form_submit('action', 'جستجو'); ?>
</div>
<div class="found">
	<?php echo lang('found'); ?>پ(<?php echo $num_results; ?>)
</div>
	<table class="table1" dir="rtl"">
		<thead>
			<?php foreach($fields as $field_name => $field_display): ?>
			<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
				<?php echo anchor("formate/index/$query_id/$field_name/" .
					(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') ,
					$field_display); ?>
			</th>
			<?php endforeach; ?>
		</thead>	
			<?php foreach($formates as $formate): ?>
			<tr id="downloadtr">
				<td><?php echo $formate->FID; ?></td>
				<td><?php echo $formate->ftitle; ?></td>
				<td><?php echo $formate->category; ?></td>
				<td><?php echo $formate->dep_name; ?></td>
				<td width="100px">
					<a href="<?php echo base_url();?>/assets/download/doc/<?php echo $formate->flink; ?>.doc"><img src="<?php echo base_url();?>/assets/images/navi/DOC.png" width="25px" height="25px" border="0"/></a>
					<a href="<?php echo base_url();?>/assets/download/pdf/<?php echo $formate->flink; ?>.pdf"><img src="<?php echo base_url();?>/assets/images/navi/pdf.png" width="25px" height="25px" border="0"/></a>
					<a href="<?php echo base_url();?>/assets/download/xls/<?php echo $formate->flink; ?>.xls"><img src="<?php echo base_url();?>/assets/images/navi/xls.png" width="25px" height="25px" border="0"/></a>
				</td>
			</tr>
			<?php endforeach; ?>			
	
		
	</table>
	<?php if (strlen($pagination)): ?>
	<div>Pages: <?php echo $pagination; ?></div>
	<?php endif; ?>


