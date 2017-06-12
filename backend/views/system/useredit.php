 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                后台角色管理
            </header>
            <div class="panel-body">
                <form role="form" action="<?=WEB_URL?>index.php?r=system/usersave&id=<?=$user->id?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">用户名：</label>
                        <input type="name" name="username" class="form-control"  placeholder="后台管理账户用户名" value="<?=$user->username?>">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">密码：</label>
                        <input type="password" name="password" class="form-control"  placeholder="后台管理账户密码" value="<?=$user->password?>">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">角色:</label>
                        <?php foreach ($roles as $role) { ?>
                        <div class="col-lg-offset-1 col-lg-11">
                            <label>
                                <input type="checkbox" name="roles[]" <?php if(in_array($role['id'], $roleuser)){echo 'checked';}?> value="<?=$role['id']?>" ><?=$role['name']?>
                            </label>
                        </div>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary">保存</button>
                </form>

            </div>
        </section>
    </div>
</div>