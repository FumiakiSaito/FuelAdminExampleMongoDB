<table class="table table-striped">
	<tbody>
		<tr>
			<th>社員番号</th>
			<td> <?php echo $input['num']; ?></td>
		</tr>
		<tr>
			<th>名前</th>
			<td> <?php echo $input['name']; ?></td>
		</tr>
		<tr>
			<th>性別</th>
			<td>
				<?php if ($input['sex'] == Model_Sex::MALE) : ?>
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
						if ($input['division_id'] == $division_id) {
							echo $division;
						}
					}
				?>
			</td>
		</tr>
	</tbody>
</table>