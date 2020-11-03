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
                <div class="col-xs-9 nopadding">
                    <?php $qid = 0;
 foreach($this->tpl_var['favors']['data'] as $key => $question){ 
 $qid++; ?>
                    <div class="content-box padding">
                        <h2 class="title">
                            第 <?php echo $qid; ?> 题 【 <?php echo $this->tpl_var['questype'][$question['questiontype']]['questype']; ?>】
                            <a class="badge pull-right error" data-questionid="<?php echo $question['questionid']; ?>">纠错</a>
                            <a class="badge pull-right ajax" href="index.php?exam-app-favor-ajax-delfavor&favorid=<?php echo $question['favorid']; ?>">移除</a>
                            <?php if($question['questionparent']){ ?>
                            <a class="badge pull-right selfmodal" href="javascript:;" url="index.php?exam-app-questions-rowsdetail&questionid=<?php echo $question['questionparent']; ?>&<?php echo TIME; ?>" data-target="#modal">全部</a>
                            <?php } ?>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <?php if($this->tpl_var['parents'][$question['questionparent']]){ ?>
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['parents'][$question['questionparent']]['qrquestion'])); ?></p>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?></p>
                                </div>
                            </li>
                            <?php if($question['questionselect']){ ?>
                            <li class="border morepadding">
                                <div class="desc">
                                    <?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="border morepadding">
                                <div class="intro">
                                    <div class="desc">
                                        <div class="col-xs-1 nopadding">
                                            <div class="toolbar"><span class="badge">正确答案</span></div>
                                        </div>
                                        <?php if($this->tpl_var['questype'][$question['questiontype']]['questsort']){ ?>
                                        <div class="col-xs-11">
                                            <?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?>
                                        </div>
                                        <?php } else { ?>
                                        <div class="col-xs-11">
                                            <b id="rightanswer_<?php echo $question['questionid']; ?>"><?php echo $question['questionanswer']; ?></b>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                            <li class="border morepadding">
                                <div class="intro">
                                    <div class="desc">
                                        <div class="col-xs-1 nopadding">
                                            <div class="toolbar"><span class="badge">试题解析</span></div>
                                        </div>
                                        <div class="col-xs-11">
                                            <?php echo html_entity_decode($this->ev->stripSlashes($question['questiondescribe'])); ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                    <div class="content-box noground padding">
                        <?php if($this->tpl_var['favors']['pages']){ ?>
                        <ul class="pagination pull-right"><?php echo $this->tpl_var['favors']['pages']; ?></ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
<div id="modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
                <h4 id="myModalLabel">
                    试题详情
                </h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button aria-hidden="true" class="btn btn-primary" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<?php $this->_compileInclude('paper_footer'); ?>
</body>
</html>
