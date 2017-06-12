<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
    <h5>系统功能维护</h5>
  </div>
  <div class="widget-content nopadding">
    <form action="<?=WEB_URL?>index.php?r=system/actionsave&id=<?php echo $action->id;?>" method="post" class="form-horizontal" id="form">
		<input type="hidden" id="_csrf" name="_csrf" value="<?php echo Yii::$app->request->csrfToken;?>"/>
      <div class="control-group">
        <label class="control-label">名称:</label>
        <div class="controls">
          <input type="text" class="span11" name="name" value="<?php echo $action->name;?>" check="notnull" id="name">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">类型:</label>
        <div class="controls ">
			<select class="span11" name="type">
			<?php foreach (Yii::$app->params['actiontype'] as $k=>$v) {?>
				<option value="<?php echo $k?>" <?php echo $action->type == $k ?'selected':''?>><?php echo $v?></option>
			<?php }?>
			</select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">标识:</label>
        <div class="controls">
          <input type="text" class="span11" name="sign" value="<?php echo $action->sign;?>">
        </div>
      </div>
	  <div class="control-group">
        <label class="control-label">URL:</label>
        <div class="controls">
          <input type="text" class="span11" name="url" value="<?php echo $action->url;?>">
        </div>
      </div>
	  <div class="control-group">
        <label class="control-label">排序:</label>
        <div class="controls">
          <input type="text" class="span11" name="myorder" value="<?php echo $action->myorder;?>">
        </div>
      </div>
	  <div class="control-group">
        <label class="control-label">归属:</label>
        <div class="controls">
			<select class="span11" name="pid">
				<option value="0" <?php echo $action->pid == 0 ?'selected':''?>>顶级菜单</option>
				<?php foreach ($menus as $menu) {?>
					<option value="<?php echo $menu['id'];?>" <?php echo $action->pid == $menu['id'] ?'selected':''?>><?php echo $menu['name']?></option>
				<?php }?>
			</select>
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

