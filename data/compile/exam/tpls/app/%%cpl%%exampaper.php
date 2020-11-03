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
                            模拟考试
                        </h2>
                        <ul class="list-unstyled list-img">
                            <?php $eid = 0;
 foreach($this->tpl_var['exams']['data'] as $key => $exam){ 
 $eid++; ?>
                            <li class="border padding">
                                <h4 class="shorttitle"><?php echo $exam['exam']; ?></h4>
                                <div class="intro">
                                    <div class="desc">
                                        <p class="toolbar">
                                            <a class="badge">总分：<?php echo $exam['examsetting']['score']; ?> 分</a>
                                            <a class="badge">及格分：<?php echo $exam['examsetting']['passscore']; ?> 分</a>
                                            <a class="badge">时间：<?php echo $exam['examsetting']['examtime']; ?> 分钟</a>
                                        </p>
                                        <p class="toolbar">
                                            <a action-before="clearStorage" href="index.php?exam-app-exampaper-selectquestions&examid=<?php echo $exam['examid']; ?>" class="ajax btn btn-info pull-right more">开始考试</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
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
