<h1 class="page-header"><?php echo Session::get_flash('success','Dashboard'); ?></h1>

<div class="table-responsive">
	<h3><i class="glyphicon glyphicon-lock"></i>&nbsp;ログイン</h3>

		<?php echo Form::open(array('class' => 'form-horizontal')); ?>

			<?php if (isset($login_error)): ?>
				<div class="bg-danger"><h4><?php echo $login_error; ?></h4></div>
			<?php endif; ?>
			<br>

			<div class="form-group <?php echo ! $val->error('account') ?: 'has-error' ?>">
				<label class="control-label col-sm-3" for="username">ユーザー名
					<a data-content="管理者のユーザー名です。" title="" data-toggle="popover" href="#" data-trigger="hover" data-original-title="説明"><i class="glyphicon glyphicon-question-sign"></i></a>
				</label>
				<div class="col-sm-7">
					<?php echo Form::input('account', Input::post('account'), array('class' => 'form-control', 'placeholder' => 'ログインID', 'autofocus')); ?>
					<?php if ($val->error('account')): ?>
						<span class="control-label"><?php echo $val->error('account')->get_message(':label を入力してください'); ?></span>
					<?php endif; ?>
				</div>
			</div>

			<div class="form-group <?php echo ! $val->error('password') ?: 'has-error' ?>">
				<label class="control-label col-sm-3" for="password">パスワード
					<a data-content="管理者のパスワードです。" title="" data-toggle="popover" href="#" data-trigger="hover" data-original-title="説明">
						<i class="glyphicon glyphicon-question-sign"></i>
					</a>
				</label>
				<div class="col-sm-7">
					<?php echo Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'パスワード')); ?>

					<?php if ($val->error('password')): ?>
						<span class="control-label"><?php echo $val->error('password')->get_message(':label を入力してください'); ?></span>
					<?php endif; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-7">
					<?php echo Form::submit(array('value'=>'ログイン', 'name'=>'submit', 'class' => 'btn btn-primary')); ?>
				</div>
			</div>

		<?php echo Form::close(); ?>
</div>

