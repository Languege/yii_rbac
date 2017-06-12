<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
<h5>用户管理</h5>
<a href='<?=WEB_URL?>index.php?r=system/useredit' class='btn btn-success' style='float:right;'>增加</a>
</div>
<div class="widget-content nopadding">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>用户名</th>
<th>角色</th>
<th>操作</th>
</tr>
</thead>
<tbody>
<?php foreach ($lists as $user) { ?>
<tr>
<td><?php echo $user->id;?></td>
<td><?php echo $user->username;?></td>
<td><?php echo $user->roles;?></td>
<td>
<a href='<?=WEB_URL?>index.php?r=system/useredit&id=<?php echo $user->id;?>' class="btn btn-success btn-small"><i class='icon-pencil'></i> 修改</a>&nbsp;
<a href='<?=WEB_URL?>index.php?r=system/userdel&id=<?php echo $user->id;?>' onclick='if (!confirm("确认要删除么?")) return false;' class="btn btn-danger btn-small"><i class='icon-remove'></i> 删除</a>
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


