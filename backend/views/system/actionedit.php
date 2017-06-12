 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                功能配置
            </header>
            <div class="panel-body">
                <form role="form" action="<?=WEB_URL?>index.php?r=system/actionsave&id=<?=$action->id?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">名称:</label>
                        <input type="name" name="name" class="form-control"  placeholder="功能名称" value="<?=$action->name?>">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">类型</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15" name="type">
                                <?php foreach (Yii::$app->params['actiontype'] as $k=>$v) {?>
                                    <option value="<?=$k?>" <?php echo $action->type == $k ?'selected':''?>><?=$v?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">标识:</label>
                        <input type="name" name="sign" class="form-control" placeholder="功能标识" value="<?=$action->sign?>">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">URL(链接地址):</label>
                        <input type="name" name="url" class="form-control" placeholder="功能标识" value="<?=$action->url?>">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">排序:</label>
                        <input type="name" name="myorder" class="form-control" placeholder="功能标识" value="<?=$action->myorder?>">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">归属:</label>
                         <div class="col-lg-10">
                            <select class="form-control m-bot15"  name="pid">
                                <option value="0" <?php echo $action->pid == 0 ?'selected':''?>>顶级菜单</option>
                                <?php foreach ($menus as $menu) {?>
                                    <option value="<?php echo $menu['id'];?>" <?php echo $action->pid == $menu['id'] ?'selected':''?> ><?php echo $menu['name']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">保存</button>
                </form>

            </div>
        </section>
    </div>
</div>