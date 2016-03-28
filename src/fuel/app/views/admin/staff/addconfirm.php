<h3><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $display_title ?></h3>
<?php echo render('admin/staff/_confirm_form'); ?>
<div class="box">
<?php
echo Form::open(array('action' => 'admin/staff/add', 'name'=> 'add', 'method'=>'post', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal'));
echo Form::submit('submit', '修正', array('class' => 'btn btn-default'));
echo Form::hidden('num', $input['num']);
echo Form::hidden('name', $input['name']);
echo Form::hidden('sex', $input['sex']);
echo Form::hidden('division', $input['division']);
echo Form::close();
?>
</div>
<div class="box">
<?php
echo Form::open(array('action' => 'admin/staff/send', 'name'=> 'add', 'method'=>'post', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal'));
echo Form::submit('submit', '登録', array('class' => 'btn btn-default'));
echo Form::csrf();
echo Form::hidden('num', $input['num'], array('id' => 'num'));
echo Form::hidden('name', $input['name'], array('id' => 'name'));
echo Form::hidden('sex', $input['sex'], array('id' => 'sex'));
echo Form::hidden('division', $input['division'], array('id' => 'division'));
echo Form::close();
?>
</div>