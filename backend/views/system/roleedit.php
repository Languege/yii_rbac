 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                后台角色管理
            </header>
            <div class="panel-body">
                <form role="form" action="<?=WEB_URL?>index.php?r=system/rolesave&id=<?=$role->id?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">名称:</label>
                        <input type="name" name="name" class="form-control"  placeholder="角色名称" value="<?=$role->name?>">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">描述：</label>
                        <input type="name" name="desc" class="form-control"  placeholder="角色描述" value="<?=$role->desc?>">
                    </div>

                   

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">功能：</label>
                        <?php $vals = explode('|', $role->vals);?>
                        <?php foreach ($menus as $menu) { ?>
                        <div class="col-lg-offset-1 col-lg-11">
                            <label>
                                <input type="checkbox" name="vals[]" <?php if(in_array($menu['id'], $vals)){echo 'checked';}?> value="<?=$menu['id']?>" ><?=$menu['name']?>
                            </label>
                        </div>
                             <?php foreach ($menu['submenu'] as $levelTwoMenu) { ?>
                             <div class="col-lg-offset-2 col-lg-10">
                                <label>
                                    <input type="checkbox" name="vals[]" <?php if(in_array($levelTwoMenu['id'], $vals)){echo 'checked';}?> value="<?=$levelTwoMenu['id']?>" ><?=$levelTwoMenu['name']?>
                                </label>
                            </div>
                                <?php foreach ($levelTwoMenu['submenu'] as $levelThreeMenu) { ?>
                                <div class="col-lg-offset-3 col-lg-9">
                                    <label>
                                        <input type="checkbox" name="vals[]" <?php if(in_array($levelThreeMenu['id'], $vals)){echo 'checked';}?> value="<?=$levelThreeMenu['id']?>" ><?=$levelThreeMenu['name']?>
                                    </label>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary">保存</button>
                </form>

            </div>
        </section>
    </div>
</div>