<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<div class="pages">
    <?php } ?>
    <div class="page-tabs">
        <div class="page-header">
            <div class="col-1" onclick="javascript:history.back();"><span class="iconfont icon-left"></span></div>
            <div class="col-8">我的考场</div>
            <div class="col-1">
                <a href="index.php?exam-phone-basics" class="ajax">
                    <span class="iconfont icon-plus-circle"></span>
                </a>
            </div>
        </div>
        <div class="page-content header">
            <div class="list-box bg">
                <ol>
                    <?php if(is_array($this->tpl_var['basics'])){ ?>
                    <?php $bid = 0;
 foreach($this->tpl_var['basics'] as $key => $basic){ 
 $bid++; ?>
                    <li class="unstyled">
                        <div class="col-4x">
                            <div class="rows illus">
                                <img src="<?php if($basic['basicthumb']){ ?><?php echo $basic['basicthumb']; ?><?php } else { ?>files/public/img/paper.jpg<?php } ?>">
                            </div>
                        </div>
                        <div class="col-4l">
                            <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-phone-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" class="ajax">
                                <div class="rows info">
                                    <h5 class="title"><?php echo $basic['basic']; ?></h5>
                                    <p class="intro"><?php echo $this->G->make('strings')->subString($basic['basicdescribe'],72); ?></p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } else { ?>
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
