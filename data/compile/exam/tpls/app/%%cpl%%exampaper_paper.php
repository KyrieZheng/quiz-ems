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
                                <h3 class="logo"><?php echo $this->tpl_var['sessionvars']['examsession']; ?></h3>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-unstyled list-inline">
                            <li>
                                <h3 class="logo"><span id="timer_h">00</span>：<span id="timer_m">00</span>：<span id="timer_s">00</span></h3>
                            </li>
                            <li class="pull-right">
                                <a href="javascript:;" onclick="javascript:$('#submodal').modal();" class="menu">
                                    <span class="glyphicon glyphicon-print"></span> 交卷
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
                        <?php if($this->tpl_var['data']['currentbasic']['basicexam']['changesequence']){ ?>
                        <?php shuffle($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest]);; ?>
                        <?php shuffle($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest]);; ?>
                        <?php } ?>
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
                                <a id="sign_<?php echo $question['questionid']; ?>" href="#q_<?php echo $question['questionid']; ?>" class="btn btn-default qindex<?php if($this->tpl_var['sessionvars']['examsessionsign'][$question['questionid']]){ ?> btn-danger<?php } ?>"><?php echo $tid; ?></a>
                                <?php } ?>
                                <?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest] as $key => $questionrow){ 
 $qrid++; ?>
                                <?php $did = 0;
 foreach($questionrow['data'] as $key => $question){ 
 $did++; ?>
                                <?php $tid++; ?>
                                <?php $qmid++; ?>
                                <a id="sign_<?php echo $question['questionid']; ?>" href="#q_<?php echo $question['questionid']; ?>" class="btn btn-default qindex<?php if($this->tpl_var['sessionvars']['examsessionsign'][$question['questionid']]){ ?> btn-danger<?php } ?>"><?php echo $tid; ?></a>
                                <?php } ?>
                                <?php } ?>
                            </li>
                        </ul>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <form class="col-xs-9 nopadding" id="paper" action="index.php?exam-app-exampaper-score">
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
                        <h2 class="title">
                            <a id="q_<?php echo $question['questionid']; ?>"></a>
                            第 <?php echo $tid; ?> 题 【 <?php echo $this->tpl_var['questype'][$quest]['questype']; ?><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['describe']; ?> 】
                            <a class="badge pull-right favor" data-questionid="<?php echo $question['questionid']; ?>">收藏</a>
                            <a class="badge pull-right" href="javascript:;" onclick="javascript:signQuestion('<?php echo $question['questionid']; ?>',this);"><?php if($this->tpl_var['sessionvars']['examsessionsign'][$question['questionid']]){ ?>取消<?php } else { ?>标记<?php } ?></a>
                            <input id="time_<?php echo $question['questionid']; ?>" type="hidden" name="time[<?php echo $question['questionid']; ?>]"/>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?></p>
                                </div>
                            </li>
                            <?php if($this->tpl_var['questype'][$quest]['questsort']){ ?>
                            <li class="border morepadding">
                                <textarea class="jckeditor" etype="simple" id="editor<?php echo $question['questionid']; ?>" name="question[<?php echo $question['questionid']; ?>]" rel="<?php echo $question['questionid']; ?>"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])); ?></textarea>
                            </li>
                            <?php } else { ?>
                            <?php if($this->tpl_var['questype'][$quest]['questchoice'] != 5){ ?>
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?></p>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="border morepadding">
                                <div class="nopadding desc">
                                    <?php if($this->tpl_var['questype'][$quest]['questchoice'] == 1 || $this->tpl_var['questype'][$quest]['questchoice'] == 4){ ?>
                                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                                    <?php if($key == $question['questionselectnumber']){ ?>
                                    <?php break;; ?>
                                    <?php } ?>
                                    <label class="inline"><input type="radio" name="question[<?php echo $question['questionid']; ?>]" rel="<?php echo $question['questionid']; ?>" value="<?php echo $so; ?>" <?php if($so == $this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]){ ?>checked<?php } ?>/><span class="selector"><?php echo $so; ?></span> </label>
                                    <?php } ?>
                                    <?php } elseif($this->tpl_var['questype'][$quest]['questchoice'] == 5){ ?>
                                    <input type="text" name="question[<?php echo $question['questionid']; ?>]" placeholder="点击此处填写答案" value="<?php echo $this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]; ?>" rel="<?php echo $question['questionid']; ?>"/>
                                    <?php } else { ?>
                                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                                    <?php if($key >= $question['questionselectnumber']){ ?>
                                    <?php break;; ?>
                                    <?php } ?>
                                    <label class="inline"><input type="checkbox" name="question[<?php echo $question['questionid']; ?>][<?php echo $key; ?>]" rel="<?php echo $question['questionid']; ?>" value="<?php echo $so; ?>" <?php if(in_array($so,$this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])){ ?>checked<?php } ?>/><span class="selector"><?php echo $so; ?></span> </label>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </li>
                            <?php } ?>
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
                        <h2 class="title">
                            <a id="q_<?php echo $question['questionid']; ?>"></a>
                            第 <?php echo $tid; ?> 题 【 <?php echo $this->tpl_var['questype'][$quest]['questype']; ?><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['describe']; ?> 】
                            <a class="badge pull-right favor" data-questionid="<?php echo $question['questionid']; ?>">收藏</a>
                            <a class="badge pull-right" href="javascript:;" onclick="javascript:signQuestion('<?php echo $question['questionid']; ?>',this);"><?php if($this->tpl_var['sessionvars']['examsessionsign'][$question['questionid']]){ ?>取消<?php } else { ?>标记<?php } ?></a>
                            <input id="time_<?php echo $question['questionid']; ?>" type="hidden" name="time[<?php echo $question['questionid']; ?>]"/>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <?php if($did == 1){ ?>
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($questionrow['qrquestion'])); ?></p>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?></p>
                                </div>
                            </li>
                            <?php if($this->tpl_var['questype'][$question['questiontype']]['questsort']){ ?>
                            <li class="border morepadding">
                                <textarea class="jckeditor" etype="simple" id="editor<?php echo $question['questionid']; ?>" name="question[<?php echo $question['questionid']; ?>]" rel="<?php echo $question['questionid']; ?>"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])); ?></textarea>
                            </li>
                            <?php } else { ?>
                            <?php if($this->tpl_var['questype'][$question['questiontype']]['questchoice'] != 5){ ?>
                            <li class="border morepadding">
                                <div class="desc">
                                    <p><?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?></p>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="border morepadding">
                                <div class="nopadding desc">
                                    <?php if($this->tpl_var['questype'][$question['questiontype']]['questchoice'] == 1 || $this->tpl_var['questype'][$question['questiontype']]['questchoice'] == 4){ ?>
                                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                                    <?php if($key == $question['questionselectnumber']){ ?>
                                    <?php break;; ?>
                                    <?php } ?>
                                    <label class="inline"><input type="radio" name="question[<?php echo $question['questionid']; ?>]" rel="<?php echo $question['questionid']; ?>" value="<?php echo $so; ?>" <?php if($so == $this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]){ ?>checked<?php } ?>/><span class="selector"><?php echo $so; ?></span> </label>
                                    <?php } ?>
                                    <?php } elseif($this->tpl_var['questype'][$question['questiontype']]['questchoice'] == 5){ ?>
                                    <input type="text" name="question[<?php echo $question['questionid']; ?>]" placeholder="点击此处填写答案" value="<?php echo $this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]; ?>" rel="<?php echo $question['questionid']; ?>"/>
                                    <?php } else { ?>
                                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                                    <?php if($key >= $question['questionselectnumber']){ ?>
                                    <?php break;; ?>
                                    <?php } ?>
                                    <label class="inline"><input type="checkbox" name="question[<?php echo $question['questionid']; ?>][<?php echo $key; ?>]" rel="<?php echo $question['questionid']; ?>" value="<?php echo $so; ?>" <?php if(in_array($so,$this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])){ ?>checked<?php } ?>/><span class="selector"><?php echo $so; ?></span> </label>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <input type="hidden" name="insertscore" value="1"/>
                    <input type="hidden" name="token" value="<?php echo $this->tpl_var['sessionvars']['examsessiontoken']; ?>"/>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="submodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">交卷</h4>
            </div>
            <div class="modal-body">
                <p>共有试题 <span class="allquestionnumber">50</span> 题，已做 <span class="yesdonumber">0</span> 题。您确认要交卷吗？</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:submitPaper();" class="btn btn-primary">确定交卷</button>
                <button aria-hidden="true" class="btn" type="button" data-dismiss="modal">再检查一下</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $.get('index.php?exam-app-index-ajax-lefttime&rand'+Math.random(),function(data){
            var setting = {
                time:<?php echo intval($this->tpl_var['sessionvars']['examsessiontime']); ?>,
                hbox:$("#timer_h"),
                mbox:$("#timer_m"),
                sbox:$("#timer_s"),
                finish:function(){
                    submitPaper();
                }
            }
            setting.lefttime = parseInt(data);
            countdown(setting);
        });
        setInterval(saveanswer,120000);
    });
</script>
<?php $this->_compileInclude('paper_footer'); ?>
</body>
</html>
