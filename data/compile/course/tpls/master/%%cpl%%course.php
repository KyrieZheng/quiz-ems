<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="main">
            <div class="col-xs-2 leftmenu">
                <?php $this->_compileInclude('menu'); ?>
            </div>
            <div class="col-xs-2 leftmenu">
                <div id="catsmenu" style="margin-top: 0px;"></div>
            </div>
            <div id="datacontent">
<?php } ?>
                <div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
                    <div class="col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
                            <?php if($this->tpl_var['catid']){ ?>
                            <li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-course">课程管理</a></li>
                            <li class="active"><?php echo $this->tpl_var['categories'][$this->tpl_var['catid']]['catname']; ?></li>
                            <?php } else { ?>
                            <li class="active">课程管理</li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
                <div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
                    <h4 class="title" style="padding:10px;">
                        <?php if($this->tpl_var['catid']){ ?><?php echo $this->tpl_var['categories'][$this->tpl_var['catid']]['catname']; ?><?php } else { ?>所有课程<?php } ?>
                        <a class="btn btn-primary pull-right" href="index.php?course-master-course-add&catid=<?php echo $this->tpl_var['catid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">添加课程</a>
                    </h4>
                    <form action="index.php?course-master-course" method="post" class="form-inline">
                        <table class="table">
                            <tr>
                                <td style="border-top: 0px;">
                                    课程ID：
                                </td>
                                <td style="border-top: 0px;">
                                    <input name="search[courseid]" class="form-control" size="15" type="text" class="number" value="<?php echo $this->tpl_var['search']['courseid']; ?>"/>
                                </td>
                                <td style="border-top: 0px;">
                                    录入时间：
                                </td>
                                <td style="border-top: 0px;">
                                    <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" type="text" name="search[stime]" size="10" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="10" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
                                </td>
                                <td style="border-top: 0px;">
                                    关键字：
                                </td>
                                <td style="border-top: 0px;">
                                    <input class="form-control" name="search[keyword]" size="15" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    分类：
                                </td>
                                <td colspan="3">
                                      <div class="form-inline form-group">
                                          <select msg="您必须选择一个分类" class="autocombox form-control" name="search[cscatid]" refUrl="index.php?course-master-category-ajax-getchildcategory&catid={value}">
                                            <option value="">选择一级分类</option>
                                            <?php $cid = 0;
 foreach($this->tpl_var['parentcat'] as $key => $cat){ 
 $cid++; ?>
                                            <option value="<?php echo $cat['catid']; ?>"<?php if($this->tpl_var['catid'] == $cat['catid']){ ?> selected<?php } ?>><?php echo $cat['catname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit">提交</button>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        <div class="input">
                            <input type="hidden" value="1" name="search[argsmodel]" />
                        </div>
                    </form>
                    <form action="index.php?course-master-course-lite" method="post">
                        <fieldset>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="info">
                                        <th width="36"><input type="checkbox" class="checkall" target="delids"/></th>
                                        <th width="40">权重</th>
                                        <th width="36">ID</th>
                                        <th width="80">缩略图</th>
                                        <th>标题</th>
                                        <th width="100">分类</th>
                                        <th width="100">发布时间</th>
                                        <th width="100">开通人数</th>
                                        <th width="180">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cid = 0;
 foreach($this->tpl_var['courses']['data'] as $key => $course){ 
 $cid++; ?>
                                    <tr>
                                        <td><input type="checkbox" name="delids[<?php echo $course['csid']; ?>]" value="1"></td>
                                        <td><input class="form-control" type="text" name="ids[<?php echo $course['csid']; ?>]" value="<?php echo $course['cssequence']; ?>" style="width:36px;padding:2px 5px;"/></td>
                                        <td><?php echo $course['csid']; ?></td>
                                        <td class="picture"><img src="<?php if($course['csthumb']){ ?><?php echo $course['csthumb']; ?><?php } else { ?>app/core/styles/images/noupload.gif<?php } ?>" alt="" style="width:24px;"/></td>
                                        <td>
                                            <?php echo $course['cstitle']; ?>
                                        </td>
                                        <td>
                                            <a href="index.php?course-master-course&catid=<?php echo $course['cscatid']; ?>" target=""><?php echo $this->tpl_var['categories'][$course['cscatid']]['catname']; ?></a>
                                        </td>
                                        <td>
                                            <?php echo date('Y-m-d',$course['cstime']); ?>
                                        </td>
                                        <td>
                                            <a href="index.php?course-master-course-members&courseid=<?php echo $course['csid']; ?>" class="autoloaditem" autoload="index.php?course-master-course-getcoursemembernumber&courseid=<?php echo $course['csid']; ?>">0</a>
                                        </td>
                                        <td class="actions">
                                            <div class="btn-group">
                                                <a class="btn" href="index.php?course-master-course-members&courseid=<?php echo $course['csid']; ?>" title="人员管理"><em class="glyphicon glyphicon-user"></em></a>
                                                <a class="btn" href="index.php?course-master-contents&courseid=<?php echo $course['csid']; ?>" title="课件列表"><em class="glyphicon glyphicon-list"></em></a>
                                                <a class="btn" href="index.php?course-master-course-edit&catid=<?php echo $course['cscatid']; ?>&courseid=<?php echo $course['csid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
                                                <a class="btn confirm" href="index.php?course-master-course-del&catid=<?php echo $course['cscatid']; ?>&courseid=<?php echo $course['csid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="controls">
                                    <label class="radio-inline">
                                        <input type="radio" name="action" value="modify" checked/>排序
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="action" value="movecategory" />移动
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="action" value="delete" />删除
                                    </label>
                                    <?php if(is_array($this->tpl_var['search'])){ ?><?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
                                    <input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
                                    <?php } ?><?php } ?>
                                    <label class="radio-inline">
                                        <button class="btn btn-primary" type="submit">提交</button>
                                    </label>
                                    <input type="hidden" name="modifycoursesequence" value="1"/>
                                    <input type="hidden" name="catid" value="<?php echo $this->tpl_var['catid']; ?>"/>
                                    <input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
                                </div>
                            </div>
                            <ul class="pagination pull-right">
                                <?php echo $this->tpl_var['courses']['pages']; ?>
                            </ul>
                        </fieldset>
                    </form>
                </div>
            </div>
<?php if(!$this->tpl_var['userhash']){ ?>
        </div>
    </div>
</div>
<script src="index.php?course-master-course-catsmenu&catid=<?php echo $this->tpl_var['catid']; ?>"></script>
<script>
;$(function(){
    $('#catsmenu').treeview({
        levels: <?php echo $this->tpl_var['catlevel']; ?>,
        expandIcon: 'glyphicon glyphicon-chevron-right',
        collapseIcon: 'glyphicon glyphicon-chevron-down',
        selectedColor: "#000000",
        selectedBackColor: "#FFFFFF",
        enableLinks: true,
        data: treeData
    });
})
</script>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>
