<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
<h5>系统功能</h5>

<a href='<?=WEB_URL?>index.php?r=system/actionedit' class='btn btn-success' style='float:right;'>增加</a>

</div>
	<div class="widget-content nopadding">
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
			<th>ID</th>
			<th>名称</th>
			<th>标示</th>
			<th>排序</th>
			<th>PID</th>
			<th>URL</th>
			<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lists as $action) { ?>
			<tr>
				<td><?=$action->id;?></td>
				<td><?=$action->name;?></td>
				<td><?=$action->sign;?></td>
				<td><?=$action->myorder;?></td>
				<td><?php echo empty($action->pidname) ? '顶级菜单' : $action->pidname->name;?></td>
				<td><?=$action->url;?></td>
				<td>
				<a href='<?=WEB_URL?>index.php?r=system/actionedit&id=<?php echo $action->id;?>' class="btn btn-success btn-small"><i class='icon-pencil'></i> 编辑</a>
				<a href='<?=WEB_URL?>index.php?r=system/actiondel&id=<?php echo $action->id;?>' onclick='if (!confirm("确认要删除么?")) return false;' class="btn btn-danger btn-small"><i class='icon-remove'></i> 删除</a>
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


