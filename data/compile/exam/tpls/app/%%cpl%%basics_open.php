<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('nav'); ?>
            <div class="content">
                <?php } ?>
                <div class="col-xs-12" id="datacontent">
                    <div class="content-box padding">
                        <h4 class="title">考场列表<a href="index.php?exam-app" class="btn btn-primary pull-right"><em class="glyphicon glyphicon-tasks"></em> 我的考场</a></h4>
                        <form class="form" action="index.php?exam-app-basics-open">
                            <table class="table">
                                <tr>
                                    <td>
                                        <label>是否免费：</label>
                                    </td>
                                    <td>
                                        <select name="search[basicdemo]" class="form-control">
                                            <option value="0">不限</option>
                                            <option value="1"<?php if($this->tpl_var['search']['basicdemo']){ ?> selected<?php } ?>>免费</option>
                                        </select>
                                    </td>
                                    <td>
                                        <label>关键字：</label>
                                    </td>
                                    <td>
                                        <input class="form-control" placeholder="输入考场关键字查询" name="search[keyword]" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>" />
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>地区：</label>
                                    </td>
                                    <td>
                                        <select name="search[basicareaid]" class="form-control">
                                            <option value="0">选择地区</option>
                                            <?php $aid = 0;
 foreach($this->tpl_var['areas'] as $key => $area){ 
 $aid++; ?>
                                            <option value="<?php echo $area['areaid']; ?>"<?php if($area['areaid'] == $this->tpl_var['search']['basicareaid']){ ?> selected<?php } ?>><?php echo $area['area']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <label>科目：</label>
                                    </td>
                                    <td>
                                        <select name="search[basicsubjectid]" class="form-control">
                                            <option value="0">选择科目</option>
                                            <?php if(is_array($this->tpl_var['subjects'])){ ?>
                                            <?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
                                            <option value="<?php echo $subject['subjectid']; ?>"<?php if($subject['subjectid'] == $this->tpl_var['search']['basicsubjectid']){ ?> selected<?php } ?>><?php echo $subject['subject']; ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="submit">提交</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <hr>
                        <div class="col-xs-12 nopadding">
                            <?php $bid = 0;
 foreach($this->tpl_var['basics']['data'] as $key => $basic){ 
 $bid++; ?>
                            <div class="col-xs-3" style="width:20%">
                                <a href="index.php?exam-app-basics-detail&basicid=<?php echo $basic['basicid']; ?>" class="thumbnail" style="position:relative;">
                                    <?php if($this->tpl_var['data']['openbasics'][$basic['basicid']]){ ?>
                                    <img src="app/core/styles/img/opened.png" style="position:absolute;right:4px;top:4px;">
                                    <?php } elseif($basic['basicdemo']){ ?>
                                    <img src="app/core/styles/img/free.png" style="position:absolute;right:4px;top:4px;">
                                    <?php } ?>
                                    <img src="<?php if($basic['basicthumb']){ ?><?php echo $basic['basicthumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" alt="" width="100%">
                                </a>
                                <h5 class="text-center">
                                    <?php echo $basic['basic']; ?>
                                </h5>
                            </div>
                            <?php if($bid % 5 == 0){ ?>
                            <div class="col-xs-12"><hr /></div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="col-xs-12">
                            <ul class="pagination pull-right">
                                <?php echo $this->tpl_var['basics']['pages']; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if(!$this->tpl_var['userhash']){ ?>
            </div>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
</body>
</html>
<?php } ?>
