<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('nav'); ?>
            <div class="content">
                <div class="col-xs-9">
                    <div class="content-box padding">
                        <h2 class="title">我的课程</h2>
                        <ul class="list-box list-unstyled">
                            <?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
                            <li class="col-xs-4 box">
                                <a href="index.php?course-app-course&csid=<?php echo $content['csid']; ?>">
                                    <div class="img">
                                        <img src="<?php if($content['csthumb']){ ?><?php echo $content['csthumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" />
                                    </div>
                                    <h5 class="box-title"><?php echo $content['cstitle']; ?></h5>
                                    <div class="intro">
                                        <p><?php echo $this->G->make('strings')->subString($content['csdescribe'],78); ?></p>
                                    </div>
                                </a>
                            </li>
                            <?php if($cid < count($this->tpl_var['contents']['data']) && $cid % 3 == 0){ ?>
                        </ul>
                        <ul class="list-box list-unstyled">
                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-3 nopadding">
                    <div class="content-box padding">
                        <h2 class="title">最新课程<a href="index.php?course-app-index-lists" class="badge pull-right">更多 <em class="glyphicon glyphicon-plus"></em> </a> </h2>
                        <ul class="list-unstyled list-img">
                            <?php if(is_array($this->tpl_var['news'])){ ?>
                            <?php $cid = 0;
 foreach($this->tpl_var['news'] as $key => $content){ 
 $cid++; ?>
                            <li class="border padding">
                                <a href="index.php?course-app-course&csid=<?php echo $content['csid']; ?>">
                                    <div class="intro">
                                        <div class="col-xs-5 img noleftpadding">
                                            <img src="<?php if($content['csthumb']){ ?><?php echo $content['csthumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" />
                                        </div>
                                        <div class="desc">
                                            <p><?php echo $content['cstitle']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
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
