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
                            <li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
                            <li class="active">批量删除考试记录</li>
                        </ol>
                    </div>
                </div>
                <div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
                    <h4 class="title" style="padding:10px;">
                        批量删除考试记录
                    </h4>
                    <form action="index.php?exam-master-tools-clearhistory" method="post" id="qstool">
                        <table class="table form-inline">
                            <tr>
                                <td style="border-top:0px;">
                                    考试时间：
                                </td>
                                <td style="border-top:0px;">
                                    <input class="form-control datetimepicker" data-link-format="yyyy-mm-dd" data-date="" data-date-format="yyyy-mm-dd" type="text" name="search[stime]" size="10" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="10" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
                                </td>
                                <td style="border-top:0px;">
                                    <button class="btn btn-primary" type="submit">删除</button>
                                    <input type="hidden" value="1" name="search[argsmodel]" />
                                </td>
                                <td colspan="4"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
