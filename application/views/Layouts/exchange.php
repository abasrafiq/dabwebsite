<div class="languagec"><?php echo langbar(); ?></div>

<table class="exchangerate" cellpadding="0" cellspacing="0" align="center" dir="rtl">
		<tr id="extr">
			<th colspan="2" width="150px"><?php echo lang('currency'); ?></th>
			<th><?php echo lang('selling'); ?></th>
			<th><?php echo lang('buying'); ?></th>
		</tr>
		<tr>
			<td colspan="4"><hr /></td>
		<?php foreach ($exchanges as $row):  ?>
		<tr id="extr">
			<td><img src="<?php echo base_url();?>/assets/images/exch/<?php echo $row->CountryId; ?>.gif" class="exchimage" /></td>
			<td><?php echo $row->EnCountryName; ?> </td>
			<td width="60px"><?php echo $row->CashSelling; ?></td>
			<td width="60px"><?php echo $row->CashBuying; ?></td>
		</tr>
			<?php endforeach; ?>

			<td colspan="4" align="center""><hr /><a href="#">More info</a></td>
		</tr>

	</table>
	<hr />
	
<div class="poll1">
<?php echo link_tag($base_styles); ?>
<div id="container">
	<div id="content" role="main">
		<?php if ($results === FALSE) { ?>
			<div class="poll">
				<p>There are no polls.</p>
			</div>
		<?php } else { ?>
		<?php foreach ($results as $row) { ?>
			<div class="poll">
				<?php echo $row['title']; ?>
				<dl class="options">
					<?php foreach ($row['options'] as $option) { ?>
						<table border="0" dir="rtl">
						<tr>
							<td width="80%">
								<?php echo $option['title']; ?>  <span class="vote_count">(<?php echo $option['votes']; ?>)</span>
								<span class="poll_bg"><span class="poll_bar" style="width: <?php echo $option['percentage']; ?>%"></span></span>
							</td>
							<td>
								<?php echo anchor("poll/vote/{$row['poll_id']}/{$option['option_id']}", 'Vote', array('class' => 'btn_add')); ?>
							</td>
						</tr>
						</table>
						
					<?php } ?>
				</dl>
				
			</div>
		<?php } ?>
		<?php } ?>
		<p><?php echo $paging_links; ?></p>
	</div>
</div>

</div>