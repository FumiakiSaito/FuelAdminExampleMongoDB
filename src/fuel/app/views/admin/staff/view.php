<h3><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $display_title ?></h3>
<table class="table table-striped">
	<tbody>
		<tr>
			<th>社員番号</th>
			<td> <?php echo $staff->num; ?></td>
		</tr>
		<tr>
			<th>名前</th>
			<td> <?php echo $staff->name; ?></td>
		</tr>
		<tr>
			<th>性別</th>
			<td>
				<?php if ($staff->sex == Model_Sex::MALE) : ?>
					男性
				<?php else: ?>
					女性
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th>所属部署</th>
			<td>
				<?php
					foreach ($divisions as $division_id => $division) {
						if ($staff->division_id == $division_id) {
							echo $division;
						}
					}
				?>
			</td>
		</tr>
	</tbody>
</table>
<div class="box">
<?php
echo Form::open(array('action' => 'admin/staff/index', 'name'=> 'index', 'method'=>'post', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal'));
echo Form::submit('submit', '戻る', array('class' => 'btn btn-default'));
echo Form::close();
?>
