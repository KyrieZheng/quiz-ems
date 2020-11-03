        <h2 class="title">
            第 <?php echo $this->tpl_var['number']; ?> 题
            <a class="badge pull-right favor" data-questionid="<?php echo $this->tpl_var['question']['questionid']; ?>">收藏</a>
            <a class="badge pull-right error" data-questionid="<?php echo $this->tpl_var['question']['questionid']; ?>">纠错</a>
            <?php if($this->tpl_var['number'] < $this->tpl_var['allnumber']){ ?>
            <a class="jump next badge pull-right" data-number="<?php echo $this->tpl_var['number'] + 1; ?>">下一题</a>
            <?php } ?>
            <?php if($this->tpl_var['number'] > 1){ ?>
            <a class="jump prev badge pull-right" data-number="<?php echo $this->tpl_var['number'] - 1; ?>">上一题</a>
            <?php } ?>
        </h2>
        <ul class="list-unstyled list-img">
            <?php if($this->tpl_var['parent']){ ?>
            <li class="border morepadding">
                <div class="desc">
                    <p><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['parent']['qrquestion'])); ?></p>
                </div>
            </li>
            <?php } ?>
            <li class="border morepadding">
                <div class="desc">
                    <p><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['question'])); ?></p>
                </div>
            </li>
            <?php if(!$this->tpl_var['questype']['questsort'] && $this->tpl_var['questype']['questchoice'] != 5){ ?>
            <li class="border morepadding">
                <div class="desc">
                    <p><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionselect'])); ?></p>
                </div>
            </li>
            <?php } ?>
            <?php if($this->tpl_var['questype']['questsort']){ ?>
            <li class="border morepadding">
                <textarea class="jckeditor" etype="simple" id="editor<?php echo $this->tpl_var['question']['questionid']; ?>" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']])); ?></textarea>
            </li>
            <li class="border morepadding">
                <label class="inline"><button class="btn btn-primary badge" onclick="javascript:$(this).parents('li').hide().parents('.content-box').find('.rightanswer').removeClass('hide');">查看答案</button></label>
            </li>
            <!--
            <li class="border morepadding">
                <form class="nopadding desc">
                    <label class="inline"><input type="radio" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>" value="A" <?php if('A' == $this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']]){ ?>checked<?php } ?>/><span class="selector">掌握</span> </label>
                    <label class="inline"><input type="radio" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>" value="B" <?php if('B' == $this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']]){ ?>checked<?php } ?>/><span class="selector">未掌握</span> </label>
                </form>
            </li>
            -->
            <?php } else { ?>
            <li class="border morepadding">
                <form class="nopadding desc">
                    <?php if($this->tpl_var['questype']['questchoice'] == 1 || $this->tpl_var['questype']['questchoice'] == 4){ ?>
                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                    <?php if($key == $this->tpl_var['question']['questionselectnumber']){ ?>
                    <?php break;; ?>
                    <?php } ?>
                    <label class="inline"><input type="radio" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>" value="<?php echo $so; ?>" <?php if($so == $this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']]){ ?>checked<?php } ?>/><span class="selector"><?php echo $so; ?></span> </label>
                    <?php } ?>
                    <?php } elseif($this->tpl_var['questype']['questchoice'] == 5){ ?>
                    <input type="text" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>]" placeholder="点击此处填写答案" value="<?php echo $this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']]; ?>" rel="<?php echo $this->tpl_var['question']['questionid']; ?>"/>
                    <label class="inline pull-right"><button class="btn btn-primary badge finish fill" rel="<?php echo $this->tpl_var['question']['questionid']; ?>">答题完毕</button></label>
                    <?php } else { ?>
                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                    <?php if($key >= $this->tpl_var['question']['questionselectnumber']){ ?>
                    <?php break;; ?>
                    <?php } ?>
                    <label class="inline"><input type="checkbox" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>][<?php echo $key; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>" value="<?php echo $so; ?>" <?php if(in_array($so,$this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']])){ ?>checked<?php } ?>/><span class="selector"><?php echo $so; ?></span> </label>
                    <?php } ?>
                    <label class="inline pull-right"><button class="btn btn-primary badge finish" rel="<?php echo $this->tpl_var['question']['questionid']; ?>">答题完毕</button></label>
                    <?php } ?>
                </form>
            </li>
            <?php } ?>
            <li class="border morepadding rightanswer hide">
                <div class="intro">
                    <div class="desc">
                        <div class="col-xs-1 nopadding">
                            <div class="toolbar"><span class="badge">正确答案</span></div>
                        </div>
                        <?php if($this->tpl_var['questype']['questsort']){ ?>
                        <div class="col-xs-11">
                            <?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionanswer'])); ?>
                        </div>
                        <?php } else { ?>
                        <div class="col-xs-11">
                            <b id="rightanswer_<?php echo $this->tpl_var['question']['questionid']; ?>"><?php echo $this->tpl_var['question']['questionanswer']; ?></b>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <li class="border morepadding rightanswer hide">
                <div class="intro">
                    <div class="desc">
                        <div class="col-xs-1 nopadding">
                            <div class="toolbar"><span class="badge">试题解析</span></div>
                        </div>
                        <div class="col-xs-11">
                            <?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questiondescribe'])); ?>
                        </div>
                    </div>
                </div>
            </li>
            <li class="border padding">
                <div class="intro text-right">
                    <div class="desc">
                        <form class="toolbar" target="questionpanel" action="index.php?exam-app-lesson-ajax-questions&knowsid=<?php echo $this->tpl_var['knows']['knowsid']; ?>">
                            共 <?php echo $this->tpl_var['allnumber']; ?> 题，当前第 <?php echo $this->tpl_var['number']; ?> 题。
                            <span class="form-inline form-group">
                                去第 <input type="search" size="1" class="form-control text-center" name="number" placeholder="<?php echo $this->tpl_var['number']; ?>"> 题
                            </span>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
        <script type="text/javascript">
        $(function(){
            var sumquestion = function(value,qid){
                $('.rightanswer').removeClass('hide');
                console.log(value);
                console.log($("#rightanswer_"+qid).html());
                if(value == $("#rightanswer_"+qid).html())
                {
                    $.zoombox.show('ajaxOK',{message:'回答正确'});
                    $("#rightanswer_"+qid).attr('class','text-success');
                }
                else
                {
                    $.zoombox.show('ajax',{message:'回答错误'});
                    $("#rightanswer_"+qid).attr('class','text-danger');
                }
                setTimeout($.zoombox.hide,1000);
            }
            $("input:radio").click(function(){
                var _this = $(this);
                var qid = _this.attr('rel');
                sumquestion(_this.val(),qid);
            });
            $(".finish").click(function(){
                var _this = $(this);
                var qid = _this.attr('rel');
                var parent = _this.parents("form:first");
                var value = '';
                if(_this.hasClass('fill')){
                    value = parent.find("input").val();
                }
                else{
                    parent.find("input:checked").each(function(){
                        value += $(this).val().toUpperCase();
                    });
                }
                if(value == '')
                {
                    $.zoombox.show('ajax',{message:'请先答题'});
                    return;
                }
                sumquestion(value,qid);
            });
        });

        </script>
