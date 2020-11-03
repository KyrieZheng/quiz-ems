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
                        <h2 class="title">强化训练</h2>
                        <form action="index.php?exam-app-exercise" method="post" action-before="clearStorage">
                            <fieldset class="logbox">
                                <div class="form-group underline">
                                    <label class="block">
                                        <div class="col-xs-4 tip">
                                            章节选择
                                        </div>
                                        <div class="col-xs-8 form-inline">
                                            <select autocomplete="off" id="thesectionid" name="args[sectionid]" class="combox form-control" target="theknowsid" refUrl="index.php?exam-app-index-ajax-getknowsbysectionid&sectionid={value}" more="questionnumbers">
                                                <option value="0">请选择章节</option>
                                                <?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
                                                <option value="<?php echo $section['sectionid']; ?>"><?php echo $section['section']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <select autocomplete="off" name="args[knowsid]" id="theknowsid" class="combox form-control" target="questionnumbers" refUrl="index.php?exam-app-exercise-ajax-getQuestionNumber&knowsid={value}">
                                                <option value="0">请选择知识点</option>
                                            </select>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group underline">
                                    <label class="block">
                                        <div class="col-xs-4 tip">
                                            试卷名称
                                        </div>
                                        <div class="col-xs-8 form-inline">
                                            <input placeholder="填写试卷名称" type="text" name="args[title]" class="form-control" needle="needle" msg="请输入试卷名称"/>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group underline">
                                    <label class="block">
                                        <div class="col-xs-4 tip">
                                            做题时间
                                        </div>
                                        <div class="col-xs-8 form-inline">
                                            <input type="text" name="args[time]" class="form-control text-center" datatype="number" min="1" needle="needle" msg="请输入做题时间" size="2" value='60'/> 分钟
                                        </div>
                                    </label>
                                </div>
                                <div id="questionnumbers"></div>
                                <div class="form-group  text-center">
                                    <button type="submit" class="btn btn-primary">开始测试</button>
                                    <input type="hidden" name="setExecriseConfig" value="1" />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
</body>
</html>
