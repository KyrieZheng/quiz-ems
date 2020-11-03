<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('nav'); ?>
            <div class="content">
                <div class="col-xs-9">
                    <?php if(is_array($this->tpl_var['docs'])){ ?>
                    <?php $did = 0;
 foreach($this->tpl_var['docs'] as $key => $docs){ 
 $did++; ?>
                    <div class="content-box padding">
                        <h2 class="title">
                            <?php echo $this->tpl_var['catids'][$key]['catname']; ?>
                            <a href="index.php?docs-app-category&catid=<?php echo $this->tpl_var['catids'][$key]['catid']; ?>" class="badge pull-right">更多 <em class="glyphicon glyphicon-plus"></em> </a>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <?php $cid = 0;
 foreach($docs['data'] as $key => $doc){ 
 $cid++; ?>
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
                                            <a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>" class="btn btn-info pull-right more">查看详情</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php } else { ?>
                    <div class="content-box padding alert alert-warning" role="alert">暂无词条</div>
                    <?php } ?>
                </div>
                <div class="col-xs-3 nopadding">
                    <div class="content-box padding">
                        <h2 class="title">
                            待完善词条
                            <a href="index.php?docs-app-category-needmore" class="badge pull-right">更多 <em class="glyphicon glyphicon-plus"></em> </a>
                        </h2>
                        <ul class="list-unstyled list-txt">
                            <?php $did = 0;
 foreach($this->tpl_var['more']['data'] as $key => $doc){ 
 $did++; ?>
                            <li class="striped">
                                <a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>"><?php echo $this->G->make('strings')->subString($doc['doctitle'],36); ?></a>
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
