<ul class="list-group">
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'index'){ ?> active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'index'){ ?>首页
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master">首页</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'category'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'category'){ ?>课程分类
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category">课程分类</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'course' || $this->tpl_var['method'] == 'contents'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'course' || $this->tpl_var['method'] == 'contents'){ ?>课程管理
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-course">课程管理</a>
        <?php } ?>
    </li>
    <li class="list-group-item <?php if($this->tpl_var['method'] == 'module'){ ?>active<?php } ?>">
        <?php if($this->tpl_var['method'] == 'module'){ ?>模型管理
        <?php } else { ?>
        <a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-module">模型管理</a>
        <?php } ?>
    </li>
</ul>
