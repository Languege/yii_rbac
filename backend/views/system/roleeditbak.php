<style>.div_level2{padding-left:20px;}.div_level3{padding-left:40px;}</style>
<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
<h5>后台角色维护</h5>
</div>
<div class="widget-content nopadding">
<form action="<?=WEB_URL?>index.php?r=system/rolesave&id=<?php echo $role->id;?>" method="post" class="form-horizontal" id="form">
<input type="hidden" id="_csrf" name="_csrf" value="<?php echo Yii::$app->request->csrfToken;?>"/>
<div class="control-group">
<label class="control-label">名称:</label>
<div class="controls">
<input type="text" class="span11" name="name" value="<?php echo $role->name;?>" check="notnull" id="name">
</div>
</div>
<div class="control-group">
<label class="control-label">描述:</label>
<div class="controls">
<input type="text" class="span11" name="desc" value="<?php echo $role->desc;?>">
</div>
</div>
<div class="control-group">
<label class="control-label">功能:</label>
<div class="controls">
<?php $vals = explode('|', $role['vals']);?>
<?php foreach ($menus as $menu) { ?>
<div class="div_level1"><input type="checkbox" name="vals[]" <?php echo in_array($menu['id'], $vals) ? 'checked' :'' ?> value="<?php echo $menu['id'];?>"/><?php echo $menu['name'];?></div>
<?php foreach ($menu['submenu'] as $submenu1) { ?>
<div class="div_level2"><input type="checkbox" name="vals[]" <?php echo in_array($submenu1['id'], $vals) ? 'checked' :'' ?> class="vals_<?php echo $menu['id'];?>" value="<?php echo $submenu1['id'];?>"/><?php echo $submenu1['name'];?></div>
<?php foreach ($submenu1['submenu'] as $submenu2) { ?>
<div class="div_level3"><input type="checkbox" name="vals[]" <?php echo in_array($submenu2['id'], $vals) ? 'checked' :'' ?> class="vals_<?php echo $menu['id'];?> vals_<?php echo $submenu1['id'];?>" value="<?php echo $submenu2['id'];?>"/><?php echo $submenu2['name'];?></div>
<?php }?>

<?php }?>
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
$("input[type=checkbox]").click(function(){
	var value = $(this).val();
	if ($(this).prop("checked")) {
		$(".vals_"+value).prop("checked", true);
	} else {
		$(".vals_"+value).prop("checked", false);
	}
});
</script>

