<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('nav'); ?>
            <div class="content">
                <div class="col-xs-9">
                    <div class="content-box padding">
                        <h2 class="title">开通考场</h2>
                        <ul class="list-img list-unstyled">
                            <li class="border morepadding">
                                <h4 class="shorttitle"><?php echo $this->tpl_var['basic']['basic']; ?></h4>
                                <div class="intro">
                                    <div class="col-xs-3 img">
                                        <img src="<?php if($this->tpl_var['basic']['basicthumb']){ ?><?php echo $this->tpl_var['basic']['basicthumb']; ?><?php } else { ?>app/exam/styles/image/paper.png<?php } ?>" />
                                    </div>
                                    <div class="desc">
                                        <p><?php echo $this->tpl_var['basic']['basicdescribe']; ?></p>
                                        <p class="toolbar">
                                            <a class="badge">当前积分：<?php echo $this->tpl_var['_user']['usercoin']; ?></a>
                                            <a class="badge" href="index.php?user-center-payfor">在线充值</a>
                                            <a class="badge" href="#myModal" role="button" data-toggle="modal">代金券充值</a>
                                        </p>
                                        <div class="toolbar">
                                            <?php if($this->tpl_var['isopen']){ ?>
                                            <a class="btn btn-info pull-right more ajax" href="index.php?exam-app-index-setCurrentBasic&basicid=<?php echo $this->tpl_var['basic']['basicid']; ?>">进入考场</a>
                                            <?php } else { ?>
                                            <?php if($this->tpl_var['allowopen']){ ?>
                                            <?php if($this->tpl_var['basic']['basicdemo']){ ?>
                                            <a class="btn btn-info pull-right more confirm" msg="确定要开通吗？" href="index.php?exam-app-basics-openit&basicid=<?php echo $this->tpl_var['basic']['basicid']; ?>">免费开通</a>
                                            <?php } else { ?>
                                            <?php if($this->tpl_var['price']){ ?>
                                            选择要开通的时长
                                            <div class="more">
                                                <?php $pid = 0;
 foreach($this->tpl_var['price'] as $key => $p){ 
 $pid++; ?>
                                                <a class="btn btn-primary confirm" msg="确定要开通吗？" href="index.php?exam-app-basics-openit&basicid=<?php echo $this->tpl_var['basic']['basicid']; ?>&opentype=<?php echo $key; ?>"><?php echo $p['price']; ?>积分兑换<?php echo $p['time']; ?>天</a>
                                                <?php } ?>
                                            </div>
                                                <?php } else { ?>
                                                <a class="btn btn-default pull-right more" href="javascript:;">请管理员设置考场价格</a>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <a class="btn btn-default pull-right more" href="javascript:;">您所在的用户组不能开通本考场</a>
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-3 nopadding">
                    <div class="content-box padding">
                        <h2 class="title">最新考场<a href="index.php?exam-app-basics-open" class="badge pull-right">更多 <em class="glyphicon glyphicon-plus"></em> </a> </h2>
                        <ul class="list-unstyled list-img">
                            <?php $bid = 0;
 foreach($this->tpl_var['news'] as $key => $basic){ 
 $bid++; ?>
                            <li class="border padding">
                                <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" class="ajax">
                                    <div class="intro">
                                        <div class="col-xs-5 img noleftpadding">
                                            <img src="<?php if($basic['basicthumb']){ ?><?php echo $basic['basicthumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" />
                                        </div>
                                        <div class="desc">
                                            <p><?php echo $basic['basic']; ?></p>
                                        </div>
                                    </div>
                                </a>
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
<form aria-hidden="true" id="myModal" method="post" class="modal fade" role="dialog" aria-labelledby="#myModalLabel" action="index.php?exam-app-basics-coupon">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
                <h4 class="modal-title" id="myModalLabel">代金券充值</h4>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="control-group">
                    <div class="controls">
                        <input placeholder="请输入16位代金券号码" type="text" class="form-control" name="couponsn" value="" needle="needle" msg="请输入16位代金券号码"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input name="coupon" type="hidden" value="1">
                <button class="btn btn-primary" type="submit">充值</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>
