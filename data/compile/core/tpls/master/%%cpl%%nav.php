<div class="container-fluid navbar" style="margin-top:0px;margin-bottom:0px;background-color:#337AB7;">
    <div class="row-fluid">
        <div class="main">
            <div class="col-xs-12">
                <ul class="list-unstyled list-inline">
                    <li>
                        <span class="logo">PHPEMS<?php echo PE_VERSION; ?></span>
                    </li>
                    <li<?php if($this->tpl_var['_app'] == 'core'){ ?> class="menu active"<?php } ?>>
                        <a href="index.php?core-master">全局</a>
                    </li>
                    <?php if($this->tpl_var['apps']['user']['appsetting']['managemodel']){ ?>
                    <?php $aid = 0;
 foreach($this->tpl_var['apps'] as $key => $app){ 
 $aid++; ?>
                    <?php if($app['appstatus'] && $app['appid'] != 'core' && in_array($app['appid'],$this->tpl_var['_user']['manager_apps'])){ ?>
                    <li class="menu<?php if($this->tpl_var['_app'] == $app['appid']){ ?> active<?php } ?>">
                        <a href="index.php?<?php echo $app['appid']; ?>-master"><?php echo $app['appname']; ?></a>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <?php } else { ?>
                    <?php $aid = 0;
 foreach($this->tpl_var['apps'] as $key => $app){ 
 $aid++; ?>
                    <?php if($app['appstatus'] && $app['appid'] != 'core'){ ?>
                    <li class="menu<?php if($this->tpl_var['_app'] == $app['appid']){ ?> active<?php } ?>">
                        <a href="index.php?<?php echo $app['appid']; ?>-master"><?php echo $app['appname']; ?></a>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <li class="pull-right">
                        <div class="btn-group" style="margin-top: 15px;">
                            <button type="button" class="btn btn-info"><em class="glyphicon glyphicon-user"></em> <?php echo $this->tpl_var['_user']['username']; ?></button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?user-center"><em class="glyphicon glyphicon-user"></em> 用户中心</a></li>
                                <?php if($this->tpl_var['_user']['teacher_subjects']){ ?><li><a href="index.php?exam-teach"><em class="glyphicon glyphicon-book"></em> 教师管理</a></li><?php } ?>
                                <?php if($this->tpl_var['_user']['groupid'] == 1){ ?><li><a href="index.php?core-master"><em class="glyphicon glyphicon-dashboard"></em> 后台管理</a></li><?php } ?>
                                <li><a class="ajax" href="index.php?user-app-logout"><em class="glyphicon glyphicon-log-out"></em> 退出</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
