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
                <div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
                    <div class="col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php?core-master">全局</a></li>
                            <li class="active">模块管理</li>
                        </ol>
                    </div>
                </div>
                <div class="box itembox" style="padding-top:20px;margin-bottom:0px;">
                    <h4 class="title">
                        模块管理
                    </h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="info">
                                <th>
                                    模块标识
                                </th>
                                <th>
                                    模块名称
                                </th>
                                <th>
                                    状态
                                </th>
                                <th width="80">
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $aid = 0;
 foreach($this->tpl_var['localapps']['dir'] as $key => $lapp){ 
 $aid++; ?>
                            <tr>
                                <td><?php echo $lapp['name']; ?></td>
                                <td>
                                    <?php if($this->tpl_var['apps'][$lapp['name']]){ ?><?php echo $this->tpl_var['apps'][$lapp['name']]['appname']; ?><?php } else { ?>未设置<?php } ?>
                                </td>
                                <td>
                                    <?php if($this->tpl_var['apps'][$lapp['name']]['appstatus']){ ?>正常<?php } else { ?>禁用<?php } ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn" href="index.php?core-master-apps-config&appid=<?php echo $lapp['name']; ?>"><em class="glyphicon glyphicon-cog"></em></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
