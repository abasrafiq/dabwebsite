<section>
	<h2>News Departments</h2>
	<?php echo anchor('admin/dep/edit', '<i class="icon-plus"></i> Add a department'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Department Name</th>
				<th>Foundation Date</th>
				<th>Language</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($departments)): foreach($departments as $article): ?>	
		<tr>
			<td><?php echo $article->dep_name; ?></td>
			<td><?php echo $article->foundation_date; ?></td>
			<td><?php echo $article->dep_lang; ?></td>
			
			<td><?php echo btn_edit('admin/dep/edit/' . $article->dep_id); ?></td>
			<td><?php echo btn_delete('admin/dep/delete/' . $article->dep_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any articles.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>