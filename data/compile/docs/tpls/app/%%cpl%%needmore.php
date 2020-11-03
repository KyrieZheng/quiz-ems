<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('nav'); ?>
            <div class="content">
                <div class="col-xs-3">
                    <div class="content-box padding">
                        <h2 class="title">分类导航</h2>
                        <ul class="list-unstyled list-txt">
                            <?php $cid = 0;
 foreach($this->tpl_var['catbrother'] as $key => $cat){ 
 $cid++; ?>
                            <li class="border<?php if($cat['catid'] == $this->tpl_var['cat']['catid']){ ?> active<?php } ?>">
                                <a href="index.php?docs-app-category-needmore&catid=<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-9 nopadding">
                    <div class="content-box padding">
                        <h2 class="title">
                            待完善词条
                            <a href="index.php?docs-app" class="badge pull-right">回首页</a>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <?php $did = 0;
 foreach($this->tpl_var['docs']['data'] as $key => $doc){ 
 $did++; ?>
                            <li class="border morepadding">
                                <h4 class="shorttitle"><?php echo $doc['doctitle']; ?></h4>
                                <div class="intro">
                                    <div class="col-xs-3 img">
                                        <img src="<?php echo $doc['docthumb']; ?>" />
                                    </div>
                                    <div class="desc">
                                        <p><?php echo $doc['contentdescribe']; ?></p>
                                        <p class="toolbar">
                                            <?php echo date('Y-m-d',$doc['docinputtime']); ?>
                                            【 <?php echo $this->tpl_var['categories'][$doc['doccatid']]['catname']; ?> 】
                                            <a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>" class="btn btn-info pull-right more">去完善</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if($this->tpl_var['docs']['pages']){ ?>
                            <li class="border morepadding">
                                <ul class="pagination pull-right">
                                    <?php echo $this->tpl_var['docs']['pages']; ?>
                                </ul>
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
