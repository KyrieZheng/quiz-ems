<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<div class="pages">
    <?php } ?>
    <div class="page-tabs">
        <div class="page-header">
            <div class="col-1" onclick="javascript:history.back();"><span class="iconfont icon-left"></span></div>
            <div class="col-8">开通考场</div>
            <div class="col-1"><span class="iconfont icon-menu hide"></span></div>
        </div>
        <div class="page-content header<?php if($this->tpl_var['exams']['pages']){ ?> footer<?php } ?>">
            <div class="list-box bg">
                <ol>
                    <li class="unstyled">
                        <div class="col-3">
                            <div class="rows illus">
                                <?php if($this->tpl_var['isopen']){ ?><span class="badge">已开通</span> <?php } ?>
                                <img src="<?php if($this->tpl_var['basic']['basicthumb']){ ?><?php echo $this->tpl_var['basic']['basicthumb']; ?><?php } else { ?>files/public/img/paper.jpg<?php } ?>">
                            </div>
                        </div>
                        <div class="col-3l">
                            <div class="rows info">
                                <h4 class="title"><?php echo $this->tpl_var['basic']['basic']; ?></h4>
                                <?php if($this->tpl_var['isopen']){ ?>
                                <p class="intro">到期时间：<?php echo date('Y-m-d',$this->tpl_var['isopen']['obendtime']); ?></p>
                                <?php } else { ?>
                                <p class="intro">未开通</p>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <li class="unstyled">
                        <div class="rows">
                            <p class="intro"><?php echo $this->tpl_var['basic']['basicdescribe']; ?></p>
                        </div>
                    </li>
                    <?php if($this->tpl_var['isopen']){ ?>
                    <li class="unstyled">
                        <div class="rows text-center">
                            <a class="ajax btn primary" href="index.php?exam-phone-index-setCurrentBasic&basicid=<?php echo $this->tpl_var['basic']['basicid']; ?>">进入考场</a>
                        </div>
                    </li>
                    <?php } else { ?>
                    <?php if($this->tpl_var['allowopen']){ ?>
                    <?php if($this->tpl_var['basic']['basicdemo']){ ?>
                    <li class="unstyled">
                        <div class="rows text-center">
                            <a class="btn primary confirm" message="确定要开通吗？" href="index.php?exam-phone-basics-openit&basicid=<?php echo $this->tpl_var['basic']['basicid']; ?>">免费开通</a>
                        </div>
                    </li>
                    <?php } else { ?>
                    <?php if($this->tpl_var['price']){ ?>

                    <?php $pid = 0;
 foreach($this->tpl_var['price'] as $key => $p){ 
 $pid++; ?>
                    <li class="unstyled">
                        <a class="confirm" message="确定要开通吗？" href="index.php?exam-phone-basics-openit&basicid=<?php echo $this->tpl_var['basic']['basicid']; ?>&opentype=<?php echo $key; ?>">
                            <div class="rows info">
                                <?php echo $p['price']; ?>积分兑换<?php echo $p['time']; ?>天
                                <span class="pull-right"><em class="iconfont icon-right iconmenu"></em></span>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="unstyled"></li>

                    <?php } else { ?>
                    <li class="unstyled">
                        <div class="rows text-center">
                            <a class="btn danger">请管理员设置考场价格</a>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <?php } else { ?>
                    <li class="unstyled">
                        <div class="rows text-center">
                            <a class="btn danger" href="javascript:;">您所在的用户组不能开通本考场</a>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                </ol>
            </div>
        </div>
    </div>
    <?php if(!$this->tpl_var['userhash']){ ?>
</div>
</body>
</html>
<?php } ?>
