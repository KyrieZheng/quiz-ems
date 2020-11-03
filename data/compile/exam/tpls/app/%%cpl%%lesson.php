<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('examnav'); ?>
            <div class="content">
                <div class="col-xs-3" style="width: 20%">
                    <div class="content-box padding">
                        <?php $this->_compileInclude('menu'); ?>
                    </div>
                </div>
                <div class="col-xs-9 nopadding" style="width: 80%">
                    <?php if(is_array($this->tpl_var['sections'])){ ?><?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
                    <?php if($this->tpl_var['basic']['basicknows'][$section['sectionid']]){ ?>
                    <div class="content-box padding">
                        <h2 class="title"><?php echo $section['section']; ?></h2>
                        <ul class="list-unstyled list-txt">
                            <?php $kid = 0;
 foreach($this->tpl_var['basic']['basicknows'][$section['sectionid']] as $key => $know){ 
 $kid++; ?>
                            <li class="border">
                                <?php echo $this->tpl_var['knows'][$know]['knows']; ?>
                                <span class="tool pull-right">
                                    <?php if(array_sum($this->tpl_var['knows'][$know]['knowsnumber'])){ ?>
                                    <?php if($this->tpl_var['record'][$know]){ ?>
                                    <a class="btn btn-default" href="index.php?exam-app-lesson-paper&knowsid=<?php echo $know; ?>">继续练习</a>
                                    <?php } else { ?>
                                    <a class="btn btn-default" href="index.php?exam-app-lesson-paper&knowsid=<?php echo $know; ?>">开始练习</a>
                                    <?php } ?>
                                    <?php } else { ?>
                                    <a class="btn btn-default" href="javascript:;">暂无试题</a>
                                    <?php } ?>
                                </span>
                                <span class="tool pull-right">
                                    <span>共 <?php echo array_sum($this->tpl_var['knows'][$know]['knowsnumber']); ?> 题<?php if($this->tpl_var['record'][$know]){ ?>，上次做到第 <?php echo $this->tpl_var['record'][$know]['exernumber']; ?> 题<?php } ?></span>
                                </span>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php } ?><?php } ?>
                </div>

            </div>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
</body>
</html>
