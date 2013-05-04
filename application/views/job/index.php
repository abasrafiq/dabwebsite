<p class="head2"><?php echo lang('jobhead'); ?></p>
	<table class="jobs" align="center" dir="rtl">
		<thead>
			<tr bgcolor="#CFCECB">
				<th><?php echo lang('location'); ?></th>
				<th><?php echo lang('jobtitle'); ?></th>
				<th><?php echo lang('grad'); ?></th>
				<th><?php echo lang('department'); ?></th>
				<th><?php echo lang('date'); ?>&nbsp;<?php echo lang('announced'); ?></th>
				<th><?php echo lang('expire'); ?></th>
				<th><?php echo lang('detail'); ?></th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach ($jobs as $row):  ?>
			<tr id="jobtr">
				<td width="60px"><?php echo $row->loc_name; ?></td>
				<td><?php echo $row->job_title; ?></td>
				<td width="30px"><?php echo $row->grad_id; ?></td>
				<td width="60px"><?php echo $row->dep_name; ?></td>
				<td width="60px"><?php echo $row->job_add_date; ?></td>
				<td width="60px"><?php echo $row->job_expire_date; ?></td>
				<td width="20px"><a href="<?php echo base_url();?>/assets/downloads/jobs/<?php echo $row->job_title; ?>.pdf"><img src="<?php echo base_url();?>/assets/images/navi/pdf.png" width="20px" height="25px" border="0"/></a></td>
			 
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<br />
	<br />
	
<ul><h4 class="h4f">Afghanistan job announcements.</h4></ul>
	



