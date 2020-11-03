<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('examnav'); ?>
            <div class="content">
                <div class="col-xs-3" style="width: 20%">
                    <div class="content-box padding">
                        <?php $this->_compileInclude('menu'); ?>
                    </div>
                </div>
                <div class="col-xs-9 nopadding" style="width: 80%">
                    <div class="content-box padding">
                        <h2 class="title">
                            <?php if($this->tpl_var['ehtype'] == 0){ ?>
                            强化训练
                            <?php } elseif($this->tpl_var['ehtype'] == 1){ ?>
                            模拟考试
                            <?php } elseif($this->tpl_var['ehtype'] == 2){ ?>
                            正式考试
                            <?php } ?>
                            <a href="index.php?exam-app-history&ehtype=2" class="badge pull-right">正式考试</a>
                            <a href="index.php?exam-app-history&ehtype=1" class="badge pull-right">模拟考试</a>
                            <a href="index.php?exam-app-history" class="badge pull-right">强化训练</a>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <li class="border padding">
                                <div class="desc">
                                    <?php if($this->tpl_var['ehtype'] == 0){ ?>
                                    <p><span class="text-warning">提示：</span>我的错题中的强化训练最多记录最新20条信息。</p>
                                    <?php } elseif($this->tpl_var['ehtype'] == 1){ ?>
                                    <p>您一共完成了<b class="text-warning"><?php echo $this->tpl_var['exams']['number']; ?></b>次考试， 平均分为：<b class="text-warning"><?php echo $this->tpl_var['avgscore']; ?></b>分 继续努力吧！</p>
                                    <?php } elseif($this->tpl_var['ehtype'] == 2){ ?>
                                    <p>您一共完成了<b class="text-warning"><?php echo $this->tpl_var['exams']['number']; ?></b>次考试， 平均分为：<b class="text-warning"><?php echo $this->tpl_var['avgscore']; ?></b>分 继续努力吧！</p>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="border">
                                <div class="desc">
                                    <table class="table table-bordered table-hover">
                                        <tr class="info">
                                            <td>答题记录</td>
                                            <td width="160">答题时间</td>
                                            <td width="80">用时</td>
                                            <td width="80">得分</td>
                                            <td width="80">错题数量</td>
                                            <td width="140">操作</td>
                                        </tr>
                                        <?php $eid = 0;
 foreach($this->tpl_var['exams']['data'] as $key => $exam){ 
 $eid++; ?>
                                        <tr>
                                            <td><?php echo $exam['ehexam']; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s',$exam['ehstarttime']); ?></td>
                                            <td><?php if($exam['ehtime'] >= 60){ ?><?php if($exam['ehtime']%60){ ?><?php echo intval($exam['ehtime']/60)+1; ?><?php } else { ?><?php echo intval($exam['ehtime']/60); ?><?php } ?>分钟<?php } else { ?><?php echo $exam['ehtime']; ?>秒<?php } ?></td>
                                            <td><b><?php if(!$exam['ehstatus'] && $exam['ehdecide']){ ?>评分中<?php } else { ?><?php echo $exam['ehscore']; ?><?php } ?></b></td>
                                            <td><b><?php echo $exam['errornumber']; ?></b></td>
                                            <td>
                                                <a title="错题" href="index.php?exam-app-history-wrongs&ehid=<?php echo $exam['ehid']; ?>"><em class="glyphicon glyphicon-edit"></em></a>
                                                <a title="解析" href="index.php?exam-app-history-view&ehid=<?php echo $exam['ehid']; ?>"><em class="glyphicon glyphicon-list-alt"></em></a>
                                                <?php if($this->tpl_var['ehtype'] == 2){ ?>
                                                <a class="confirm" msg="正式考试的重做试卷将作为模拟考试记录！确定重做吗？" href="index.php?exam-app-history-redo&ehid=<?php echo $exam['ehid']; ?>" action-before="clearStorage"><em class="glyphicon glyphicon-repeat"></em></a>
                                                <?php } else { ?>
                                                <a title="重做" class="ajax" href="index.php?exam-app-history-redo&ehid=<?php echo $exam['ehid']; ?>" action-before="clearStorage"><em class="glyphicon glyphicon-repeat"></em></a>
                                                <?php } ?>
                                                <?php if($this->tpl_var['ehtype'] != 2){ ?>
                                                <a title="删除" class="confirm" href="index.php?exam-app-history-del&ehid=<?php echo $exam['ehid']; ?>"><em class="glyphicon glyphicon-ban-circle"></em></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </li>
                        </ul>
                        <?php if($this->tpl_var['exams']['pages']){ ?>
                        <ul class="pagination pull-right"><?php echo $this->tpl_var['exams']['pages']; ?></ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
</body>
</html>
