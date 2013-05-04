<h3><?php echo empty($article->id) ? 'Add a new article' : 'Edit article ' . $article->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Publication date</td>
		<td><?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="datepicker"'); ?></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><?php echo form_textarea('title', set_value('title', $article->title)); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo form_input('slug', set_value('slug', $article->slug)); ?></td>
	</tr>
	<tr>
		<td>article_number</td>
		<td><?php echo form_input('article_number', set_value('article_number', $article->article_number)); ?>You must write article number as other language</td>
	</tr>
	<tr>
		<td>article language</td>
		<td><?php echo form_input('article_lang', set_value('article_lang', $article->article_lang)); ?> (DARI = 2)   (PASHTO = 3)</td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?php echo form_input('status', set_value('status', $article->status)); ?> (active = 0)   (anactive = 1)</td>
	</tr>
	<tr>
		<td>Picture</td>
		<td><?php echo form_input('article_pic', set_value('status', $article->article_pic)); ?></td>
	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo form_textarea('body', set_value('body', $article->body), 'class="tinymce"'); ?></td>
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