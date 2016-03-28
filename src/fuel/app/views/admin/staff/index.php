<?php if ($staffs): ?>
<h3><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $display_title ?></h3>
<div class='control-label'><?php //echo $pagination;?></div>
<?php if (Session::get_flash('success')) : ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
		<?php echo Session::get_flash('success'); ?>
	</div>
<?php endif?>
<?php if (Session::get_flash('error')) : ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
		<?php echo Session::get_flash('error'); ?>
	</div>
<?php endif?>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>社員番号</th>
			<th>名前</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($staffs as $staff): ?>
			<tr>
				<td><?php echo $staff['num'] ?></td>
				<td><?php echo $staff['name'] ?></td>
				<td>
					<?php echo Html::anchor('admin/staff/view/'.   $staff['_id'], '参照'); ?> |
					<?php echo Html::anchor('admin/staff/edit/'.   $staff['_id'], '編集'); ?> |
					<?php echo Html::anchor('admin/staff/delete/'. $staff['_id'], '削除', array('onclick' => "return confirm('本当に削除しますか？')")); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
<p>社員データが存在しません</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('admin/staff/add', '新規追加', array('class' => 'btn btn-default')); ?>
</p>
