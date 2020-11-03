<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('examnav'); ?>
            <div class="content">
                <?php if($this->tpl_var['data']['currentbasic']['basicexam']['model'] == 2){ ?>
                <div class="col-xs-12">
                <?php } else { ?>
                <div class="col-xs-3" style="width: 20%">
                    <div class="content-box padding">
                        <?php $this->_compileInclude('menu'); ?>
                    </div>
                </div>
                <div class="col-xs-9 nopadding" style="width: 80%">
                <?php } ?>
                    <div class="content-box padding">
                        <h2 class="title">
                            成绩单
                            <?php if($this->tpl_var['data']['currentbasic']['basicexam']['model'] == 2){ ?>
                            <a href="index.php?exam-app-exam" class="badge pull-right">返回考试</a>
                            <?php } ?>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <li class="border">
                                <h3 class="shorttitle text-center"><?php echo $this->tpl_var['sessionvars']['examsession']; ?></h3>
                                <?php if($this->tpl_var['data']['currentbasic']['basicexam']['notviewscore']){ ?>
                                <div class="col-xs-12 alert text-center">
                                    <p>您已经成功交卷，请等待教师统计并公布分数。</p>
                                </div>
                                <?php } elseif(!$this->tpl_var['eh']['ehstatus']){ ?>
                                <div class="col-xs-12 alert text-center">
                                    <p>本试卷需要教师评卷，请等待教师评卷完成。</p>
                                </div>
                                <?php } else { ?>
                                <div class="col-xs-4">
                                    <h1 class="text-center text-danger"><?php echo $this->tpl_var['sessionvars']['examsessionscore']; ?> 分</h1>
                                </div>
                                <div class="col-xs-8">
                                    <?php if($this->tpl_var['eh']['ehtype']){ ?>
                                    <div><?php if($this->tpl_var['eh']['ehispass']){ ?><b class="text-success">恭喜您通过考试！<?php } else { ?><b class="text-danger">很遗憾您未通过本次考试！<?php } ?></b></div>
                                    <?php } ?>
                                    <p><?php if($this->tpl_var['eh']['ehtype']){ ?>总分：<b class="text-warning"><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['score']; ?></b>分 合格分数线：<b class="text-warning"><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['passscore']; ?></b>分<?php } else { ?>正确率：<b><?php echo intval(100 * $this->tpl_var['eh']['ehscore']/$this->tpl_var['allnumber']); ?>%</b><?php } ?> 答卷耗时：<b class="text-warning"><?php if($this->tpl_var['eh']['ehtime'] >= 60){ ?><?php if($this->tpl_var['eh']['ehtime']%60){ ?><?php echo intval($this->tpl_var['eh']['ehtime']/60)+1; ?><?php } else { ?><?php echo intval($this->tpl_var['eh']['ehtime']/60); ?><?php } ?>分钟<?php } else { ?><?php echo $this->tpl_var['eh']['ehtime']; ?>秒<?php } ?></b></p>
                                </div>
                                <div class="col-xs-12">
                                    <h5 class="text-info padding">得分详情：</h5>
                                    <table class="table table-hover table-bordered">
                                        <tr class="info">
                                            <th>题型</th>
                                            <th>总题数</th>
                                            <th>答对题数</th>
                                            <th>总分</th>
                                            <th>得分</th>
                                        </tr>
                                        <?php $nid = 0;
 foreach($this->tpl_var['number'] as $key => $num){ 
 $nid++; ?>
                                        <?php if($num){ ?>
                                        <tr>
                                            <td><?php echo $this->tpl_var['questype'][$key]['questype']; ?></td>
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $this->tpl_var['right'][$key]; ?></td>
                                            <td><?php echo number_format($num*$this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$key]['score'],1); ?></td>
                                            <td><?php echo number_format($this->tpl_var['score'][$key],1); ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="5" align="left">本次考试共<b class="text-warning"><?php echo $this->tpl_var['allnumber']; ?></b>道题<?php if($this->tpl_var['eh']['ehtype']){ ?>，总分<b class="text-warning"><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['score']; ?></b>分<?php } ?>，您做对<b class="text-warning"><?php echo $this->tpl_var['allright']; ?></b>道题，得到<b class="text-warning"><?php echo $this->tpl_var['sessionvars']['examsessionscore']; ?></b>分</td>
                                        </tr>
                                    </table>
                                    <h5 class="text-info padding">知识点分析：</h5>
                                    <table class="table table-hover table-bordered">
                                        <tr class="info">
                                            <th>知识点</th>
                                            <th>总题数</th>
                                            <th>答对题数</th>
                                            <th>正确率</th>
                                        </tr>
                                        <?php $sid = 0;
 foreach($this->tpl_var['stats'] as $key => $stat){ 
 $sid++; ?>
                                        <?php if($stat){ ?>
                                        <tr>
                                            <td><?php echo $stat['knows']; ?></td>
                                            <td><?php echo intval($stat['number']); ?></td>
                                            <td><?php echo intval($stat['right']); ?></td>
                                            <td><?php echo number_format(100 * $stat['right']/$stat['number'],2); ?>%</td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </table>
                                    <?php if($this->tpl_var['data']['currentbasic']['basicexam']['model'] != 2){ ?>
                                    <div class="text-center"><a href="index.php?exam-app-history-view&ehid=<?php echo $this->tpl_var['ehid']; ?>" class="btn btn-info">查看答案和解析</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?exam-app-history&ehtype=<?php echo $this->tpl_var['eh']['ehtype']; ?>" class="btn btn-info">进入我的考试记录</a></div>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
</body>
</html>
