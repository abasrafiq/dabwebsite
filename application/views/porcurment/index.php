<?php $table = lang('por'); ?>
<?php foreach (${$table} as $row):  ?>

	<table border="0" class="table1" dir="rtl"">
		<tr>
			<td colspan="4">
				<p><?php echo $row->CompleteDescription; ?>&nbsp;
					<b class="headfont"><?php echo $row->BreifDescription; ?></b>
			    </p>
				
			</td>
        </tr>
		<tr>
			<td><?php echo lang('registerdate'); ?>:<?php echo $row->RegistrationDate; ?></td>
			<td><?php echo lang('expiredate'); ?>:<?php echo $row->ExpireDate; ?></td>
			<td><a href="porcurment/request"><?php echo lang('register'); ?></a></td>
		</tr>
	</table>
<br />
<?php endforeach; ?>
