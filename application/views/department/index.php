<h5 class="head2"><?php echo lang('dephead'); ?></h5>
<hr />
<?php
  $table = lang('dep'); 
   foreach (${$table} as $row):  ?>
<div id="dep" dir="rtl">
<b><u><?php echo $row -> dep_name; ?></u></b><?php echo lang('depfound'); ?>:<?php echo $row -> foundation_date; ?>...<a href="<?php echo lang('lan'); ?>/departments/single/<?php echo $row -> dep_number; ?>"><?php echo lang('readmore'); ?></a>
</div>
<?php endforeach; ?>
