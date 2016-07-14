<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<!--
<div class="col-md-12">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget(
			'ext.yiibooster.widgets.TbBreadcrumbs',
			array(
				'links'=>$this->breadcrumbs,
			)
		);
		?>

	<?php endif?>
</div>
-->
<?php echo $content; ?>

<?php $this->endContent(); ?>