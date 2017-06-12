<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
<h5>后台用户维护</h5>
</div>
<div class="widget-content nopadding">
<form action="<?=WEB_URL?>index.php?r=system/usersave&id=<?php echo $user->id;?>" method="post" class="form-horizontal" id="form">
<input type="hidden" id="_csrf" name="_csrf" value="<?php echo Yii::$app->request->csrfToken;?>"/>
<div class="control-group">
<label class="control-label">名称:</label>
<div class="controls">
<input type="text" class="span11" name="user_name" value="<?php echo $user->username;?>" check="notnull" id="name">
</div>
</div>
<div class="control-group">
<label class="control-label">密码:</label>
<div class="controls">
<input type="password" class="span11" name="password" value="">
</div>
</div>
<div class="control-group">
<label class="control-label">角色:</label>
<div class="controls">
<?php foreach ($roles as $role) { ?>
<label>
<span><input <?php echo in_array($role['id'], $roleuser) ? 'checked':'';?> type="checkbox" name="roles[]" value="<?php echo $role['id'];?>"></span> <?php echo $role['name'];?></label>
<?php }?>
</div>
</div>
<div class="form-actions">
<a onclick="sub()" class="btn btn-success">保存</a>
<a onclick="history.back(-1)" class="btn">返回</a>
</div>
</form>
</div>
</div>
<script>
function sub() {
	if ( !$('#form').checkform() ){
		return false;
	}
	$('#form').submit();
}
</script>

