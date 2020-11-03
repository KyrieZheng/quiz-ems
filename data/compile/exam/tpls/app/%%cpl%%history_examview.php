<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <div class="header navbar-fixed-top">
                <div class="nav">
                    <div class="col-xs-9">
                        <ul class="list-unstyled list-inline">
                            <li>
                                <h3 class="logo"><?php echo $this->tpl_var['eh']['ehexam']; ?></h3>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-unstyled list-inline">
                            <li class="pull-right">
                                <a href="index.php?exam-app-history&ehtype=<?php echo $this->tpl_var['eh']['ehtype']; ?>" class="menu">
                                    <span class="glyphicon glyphicon-chevron-left"></span> 返回
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if($this->tpl_var['eh']['ehstatus']){ ?>
            <div class="content fixtop">
                <div class="col-xs-3">
                    <div class="content-box padding" id="questionindex" data-spy="affix">
                        <?php $oid = 0; ?>
                        <?php $qmid = 0; ?>
                        <?php $qid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questypelite'] as $key => $lite){ 
 $qid++; ?>
                        <?php if($lite){ ?>
                        <?php $quest = $key; ?>
                        <?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest]){ ?>
                        <?php $oid++; ?>
                        <h3 class="title">
                            <?php echo $this->tpl_var['ols'][$oid]; ?>、<?php echo $this->tpl_var['questype'][$quest]['questype']; ?>
                            <a class="badge pull-right resize"><em class="glyphicon glyphicon-resize-full"></em></a>
                        </h3>
                        <ul class="list-unstyled list-img">
                            <li id="qt_<?php echo $quest; ?>">
                                <?php $tid = 0; ?>
                                <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] as $key => $question){ 
 $qnid++; ?>
                                <?php $tid++; ?>
                                <?php $qmid++; ?>
                                <a id="sign_<?php echo $question['questionid']; ?>" href="#q_<?php echo $question['questionid']; ?>" class="btn btn-default qindex<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['score']){ ?> btn-success<?php } ?>"><?php echo $tid; ?></a>
                                <?php } ?>
                                <?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest] as $key => $questionrow){ 
 $qrid++; ?>
                                <?php $tid++; ?>
                                <?php $did = 0;
 foreach($questionrow['data'] as $key => $question){ 
 $did++; ?>
                                <?php $qmid++; ?>
                                <a id="sign_<?php echo $question['questionid']; ?>" href="#q_<?php echo $question['questionid']; ?>" class="btn btn-default qindex<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['score']){ ?> btn-success<?php } ?>"><?php echo $tid; ?></a>
                                <?php } ?>
                                <?php } ?>
                            </li>
                        </ul>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xs-9 nopadding" id="paper" action="index.php?exam-app-exercise-score">
                    <?php $oid = 0; ?>
                    <?php $qcid = 0; ?>
                    <?php $qid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questypelite'] as $key => $lite){ 
 $qid++; ?>
                    <?php if($lite){ ?>
                    <?php $quest = $key; ?>
                    <?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest]){ ?>
                    <?php $oid++; ?>
                    <?php $tid = 0; ?>
                    <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] as $key => $question){ 
 $qnid++; ?>
                    <?php $tid++; ?>
                    <?php $qcid++; ?>
                    <div class="content-box padding">
                        <?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['score']){ ?>
                        <div class="right"></div>
                        <?php } else { ?>
                        <div class="wrong"></div>
                        <?php } ?>
                        <h2 class="title">
                            <a id="q_<?php echo $question['questionid']; ?>"></a>
                            第 <?php echo $tid; ?> 题 【 <?php echo $this->tpl_var['questype'][$quest]['questype']; ?><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['describe']; ?> 】
                            <a class="badge pull-right error" data-questionid="<?php echo $question['questionid']; ?>">纠错</a>
                            <a class="badge pull-right favor" data-questionid="<?php echo $question['questionid']; ?>">收藏</a>
                            <a class="badge pull-right">得<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']]; ?>分</a>
                        </h2>
                        <ul class="list-unstyled list-img">
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
                                        <?php if($this->tpl_var['questype'][$quest]['questsort']){ ?>
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
                            <li class="border morepadding rightanswer">
                                <div class="intro">
                                    <div class="desc">
                                        <div class="col-xs-1 nopadding">
                                            <div class="toolbar"><span class="badge">我的答案</span></div>
                                        </div>
                                        <?php if($this->tpl_var['questype'][$quest]['questsort']){ ?>
                                        <div class="col-xs-11">
                                            <?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['eh']['ehuseranswer'][$question['questionid']])); ?>
                                        </div>
                                        <?php } else { ?>
                                        <div class="col-xs-11">
                                            <b id="rightanswer_<?php echo $question['questionid']; ?>"><?php echo implode('',(array)$this->tpl_var['eh']['ehuseranswer'][$question['questionid']]); ?></b>
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
                    <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest] as $key => $questionrow){ 
 $qnid++; ?>
                    <?php $did = 0;
 foreach($questionrow['data'] as $key => $question){ 
 $did++; ?>
                    <?php $tid++; ?>
                    <?php $qcid++; ?>
                    <div class="content-box padding">
                        <?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['score']){ ?>
                        <div class="right"></div>
                        <?php } else { ?>
                        <div class="wrong"></div>
                        <?php } ?>
                        <h2 class="title">
                            <a id="q_<?php echo $question['questionid']; ?>"></a>
                            第 <?php echo $tid; ?> 题 【 <?php echo $this->tpl_var['questype'][$quest]['questype']; ?><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['describe']; ?> 】
                            <a class="badge pull-right error" data-questionid="<?php echo $question['questionid']; ?>">纠错</a>
                            <a class="badge pull-right favor" data-questionid="<?php echo $question['questionid']; ?>">收藏</a>
                            <a class="badge pull-right">得<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']]; ?>分</a>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($questionrow['qrquestion'])); ?></p>
                                </div>
                            </li>
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
                                        <?php if($this->tpl_var['questype'][$quest]['questsort']){ ?>
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
                            <li class="border morepadding rightanswer">
                                <div class="intro">
                                    <div class="desc">
                                        <div class="col-xs-1 nopadding">
                                            <div class="toolbar"><span class="badge">我的答案</span></div>
                                        </div>
                                        <?php if($this->tpl_var['questype'][$quest]['questsort']){ ?>
                                        <div class="col-xs-11">
                                            <?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['eh']['ehuseranswer'][$question['questionid']])); ?>
                                        </div>
                                        <?php } else { ?>
                                        <div class="col-xs-11">
                                            <b id="rightanswer_<?php echo $question['questionid']; ?>"><?php echo implode('',(array)$this->tpl_var['eh']['ehuseranswer'][$question['questionid']]); ?></b>
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
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <?php } else { ?>
            <div class="content fixtop">
                <div class="content-box padding">
                    <div class="text-danger text-center">
                        本试卷正在锁定评分中，请等待评分结束。
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
<?php $this->_compileInclude('paper_footer'); ?>
</body>
</html>
