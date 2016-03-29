<h3><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $display_title ?></h3>
<?php if (isset($html_error)) : ?>
	<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
		<?php echo $html_error; ?>
	</div>
<?php endif?>

<table class="table table-striped">
	<?php echo Form::open(array('action' => 'admin/staff/editconfirm', 'name'=> 'add', 'method'=>'post', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal')); ?>
	<tbody>
		<tr>
			<th><?php echo Form::label('社員番号', 'num'); ?></th>
			<td> <?php echo Form::input('num', $staff['num']); ?></td>
		</tr>
		<tr>
			<th><?php echo Form::label('名前', 'name'); ?></th>
			<td> <?php echo Form::input('name', $staff['name']); ?></td>
		</tr>
		<tr>
			<th><?php echo Form::label('性別', 'sex'); ?></th>
			<td>
				<?php
				echo Form::label('男性', 'sex');
				echo Form::radio('sex', Model_Sex::MALE, $staff['sex'] == Model_Sex::MALE);
				echo Form::label('女性', 'sex');
				echo Form::radio('sex', Model_Sex::FEMALE, $staff['sex'] == Model_Sex::FEMALE);
				?>
			</td>
		</tr>
		<tr>
			<th><?php echo Form::label('所属部署', 'division'); ?></th>
			<td><?php echo Form::select('division', $staff['division'], $divisions); ?></td>
		</tr>
	</tbody>
</table>
<?php echo Form::hidden('id', $staff['_id'], array('id' => 'id')); ?>
<?php echo Form::submit('submit', '確認', array('class' => 'btn btn-default')); ?>
<?php echo Form::close(); ?>
