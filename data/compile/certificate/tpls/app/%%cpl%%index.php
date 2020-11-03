<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('nav'); ?>
            <div class="content">
                <div class="col-xs-9">
                    <div class="content-box padding">
                        <h2 class="title">我的证书<a href="index.php?certificate-app-certificate" class="badge pull-right">申请证书 <em class="glyphicon glyphicon-plus"></em> </a> </h2>
                        <ul class="list-unstyled list-img">
                            <?php $cid = 0;
 foreach($this->tpl_var['certificates']['data'] as $key => $certificate){ 
 $cid++; ?>
                            <li class="border morepadding">
                                <h4 class="shorttitle"><?php echo $certificate['cetitle']; ?></h4>
                                <div class="intro">
                                    <div class="col-xs-3 img">
                                        <img src="<?php echo $certificate['cethumb']; ?>" />
                                    </div>
                                    <div class="desc">
                                        <p><?php echo $certificate['cedescribe']; ?></p>
                                        <p class="toolbar">
                                            申请时间：<?php echo date('Y-m-d H:i:s',$certificate['ceqtime']); ?>
                                            <a class="btn btn-info pull-right more"><?php echo $this->tpl_var['status'][$certificate['ceqstatus']]; ?></a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-3 nopadding">
                    <div class="content-box padding">
                        <h2 class="title">最新证书</h2>
                        <ul class="list-unstyled list-img">
                            <?php if(is_array($this->tpl_var['news'])){ ?>
                            <?php $cid = 0;
 foreach($this->tpl_var['news'] as $key => $certificate){ 
 $cid++; ?>
                            <li class="border padding">
                                <a href="index.php?certificate-app-certificate-apply&ceid=<?php echo $certificate['ceid']; ?>">
                                    <div class="intro">
                                        <div class="col-xs-5 img noleftpadding">
                                            <img src="<?php if($certificate['cethumb']){ ?><?php echo $certificate['cethumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" />
                                        </div>
                                        <div class="desc">
                                            <p><?php echo $certificate['cetitle']; ?></p>
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
