<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="main">
            <div class="col-xs-2 leftmenu">
                <?php $this->_compileInclude('menu'); ?>
            </div>
            <div id="datacontent">
<?php } ?>
                <div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
                        <div class="col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
                                <li class="active">模型管理</li>
                            </ol>
                        </div>
                    </div>
                    <div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
                        <h4 class="title" style="padding:10px;">
                            模型列表
                            <a class="pull-right btn btn-primary" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-module-add">添加模型</a>
                        </h4>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="info">
                                    <th>ID</th>
                                    <th>模型名称</th>
                                    <th>模型代码</th>
                                    <th>模型描述</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $mid = 0;
 foreach($this->tpl_var['modules'] as $key => $module){ 
 $mid++; ?>
                                <tr>
                                    <td><?php echo $module['moduleid']; ?></td>
                                    <td><?php echo $module['modulename']; ?></td>
                                    <td><?php echo $module['modulecode']; ?></td>
                                    <td><?php echo $module['moduledescribe']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-module-preview&moduleid=<?php echo $module['moduleid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="预览"><em class="glyphicon glyphicon-search"></em></a>
                                            <a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-module-fields&moduleid=<?php echo $module['moduleid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="字段管理"><em class="glyphicon glyphicon-cog"></em></a>
                                            <a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-module-modify&moduleid=<?php echo $module['moduleid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改模型信息"><em class="glyphicon glyphicon-edit"></em></a>
                                            <a class="btn ajax" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-module-del&moduleid=<?php echo $module['moduleid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除模型"><em class="glyphicon glyphicon-remove"></em></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php if(!$this->tpl_var['userhash']){ ?>
        </div>
    </div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>