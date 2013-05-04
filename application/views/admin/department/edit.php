<h3><?php echo empty($department->dep_id) ? 'Add a new article' : 'Edit article ' . $department->dep_name; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>dep_name</td>
		<td><?php echo form_input('dep_name', set_value('dep_name', $department->dep_name)); ?></td>
	</tr>
	<tr>
		<td>dep_body</td>
		<td><?php echo form_textarea('dep_body', set_value('dep_body', $department->dep_body)); ?></td>
	</tr>
	<tr>
		<td>foundation_date</td>
		<td><?php echo form_input('foundation_date', set_value('foundation_date', $department->foundation_date),  'class="datepicker"'); ?></td>
	</tr>
	<tr>
		<td>dep_aim</td>
		<td><?php echo form_textarea('dep_aim', set_value('dep_aim', $department->dep_aim)); ?></td>
	</tr>
	
	<tr>
		<td>dep_acheivement</td>
		<td><?php echo form_textarea('dep_acheivement', set_value('dep_acheivement', $department->dep_acheivement)); ?></td>
	</tr>
	
	<tr>
		<td>dep_lang</td>
		<td><?php echo form_input('dep_lang', set_value('dep_lang', $department->dep_lang)); ?> (DARI = 2)   (PASHTO = 3)</td>
	</tr>
	
	<tr>
		<td>dep_created</td>
		<td><?php echo form_input('dep_created', set_value('dep_created', $department->dep_created), 'class= "datepicker"'); ?></td>
	</tr>
	<tr>
		<td>dep_modified</td>
		<td><?php echo form_input('dep_modified', set_value('dep_modified', $department->dep_modified), 'class= "datepicker"'); ?></td>
	</tr>
	<tr>
		<td>dep_number</td>
		<td><?php echo form_input('dep_number', set_value('dep_number', $department->dep_number)); ?>Please give the same number as the pashto</td>
	</tr>
	<tr>
		<td>status</td>
		<td><?php echo form_input('status', set_value('status', $department->status)); ?>(active = 0)   (anactive = 1)</td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

<script>
$(function() {
	$('.datepicker').datepicker({ format : 'yyyy-mm-dd' });
});
</script>