<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
<h5>角色管理</h5>
<a href='<?=WEB_URL?>index.php?r=system/roleedit' class='btn btn-success' style='float:right;'>增加</a></div>
<div class="widget-content nopadding">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>名称</th>
<!-- <th>状态</th> -->
<th>用户</th>
<th>说明</th>
<th>操作</th>
</tr>
</thead>
<tbody>
<?php foreach ($lists as $role) { ?>
<tr>
<td><?php echo $role->id;?></td>
<td><?php echo $role->name;?></td>
<!-- <td><?php echo Yii::$app->params['status'][$role->status];?></td> -->
<td><?php echo $role->usernames;?></td>
<td><?php echo $role->desc;?></td>
<td>
<a href='<?=WEB_URL?>index.php?r=system/roleedit&id=<?php echo $role->id;?>' class="btn btn-success btn-small"><i class='icon-pencil'></i> 修改</a>&nbsp;
<a href='<?=WEB_URL?>index.php?r=system/roledel&id=<?php echo $role->id;?>' onclick='if (!confirm("确认要删除么?")) return false;' class="btn btn-danger btn-small"><i class='icon-remove'></i> 删除</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php 
use yii\widgets\LinkPager;
echo LinkPager::widget([
'pagination' => $pages,
]);
?>


