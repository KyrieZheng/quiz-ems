<ul class="list-group">
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'index'){ ?> active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'index'){ ?>首页
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master">首页</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'positions'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'positions'){ ?>推荐管理
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-positions">推荐管理</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'category'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'category'){ ?>分类管理
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category">分类管理</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'contents'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'contents'){ ?>内容管理
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-contents">内容管理</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'module'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'module'){ ?>模型管理
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-module">模型管理</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'blocks'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'blocks'){ ?>标签管理
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-blocks">标签管理</a>
        <?php } ?>
    </li>
</ul>