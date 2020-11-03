<?php $this->_compileInclude('header'); ?>
<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="pages">
                <?php $this->_compileInclude('nav'); ?>
                <div class="content">
                    <div class="col-xs-9">
                        <div class="content-box padding">
                            <h2 class="title">我的考场<a href="index.php?exam-app-basics-open" class="badge pull-right">所有考场 <em class="glyphicon glyphicon-plus"></em> </a></h2>
                            <ul class="list-box list-unstyled">
                                <?php $bid = 0;
 foreach($this->tpl_var['basics'] as $key => $basic){ 
 $bid++; ?>
                                <li class="col-xs-4 box">
                                    <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" class="ajax">
                                        <div class="img">
                                            <img src="<?php if($basic['basicthumb']){ ?><?php echo $basic['basicthumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" />
                                        </div>
                                        <h5 class="box-title"><?php echo $basic['basic']; ?></h5>
                                        <div class="intro">
                                            <p><?php echo $this->G->make('strings')->subString($basic['basicdescribe'],78); ?></p>
                                        </div>
                                    </a>
                                </li>
                                <?php if($bid < count($this->tpl_var['basics']) && $bid % 3 == 0){ ?>
                            </ul>
                            <ul class="list-box list-unstyled">
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-3 nopadding">
                        <div class="content-box padding">
                            <h2 class="title">最新考场 </h2>
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
</body>
</html>
