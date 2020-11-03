<h2 class="title">功能导航</h2>
<ul class="list-unstyled list-txt">
    <li  class="border<?php if($this->tpl_var['method'] == 'lesson'){ ?> active<?php } ?>">
        <a href="index.php?exam-app-lesson">
            <span class="glyphicon glyphicon-pencil"></span> 章节练习
        </a>
    </li>
    <li  class="border<?php if($this->tpl_var['method'] == 'exercise'){ ?> active<?php } ?>">
        <a href="index.php?exam-app-exercise">
            <span class="glyphicon glyphicon-refresh"></span> 强化训练
        </a>
    </li>
    <li  class="border<?php if($this->tpl_var['method'] == 'exampaper'){ ?> active<?php } ?>">
        <a href="index.php?exam-app-exampaper">
            <span class="glyphicon glyphicon-time"></span> 模拟考试
        </a>
    </li>
    <li  class="border<?php if($this->tpl_var['method'] == 'history'){ ?> active<?php } ?>">
        <a href="index.php?exam-app-history">
            <span class="glyphicon glyphicon-list-alt"></span> 考试记录
        </a>
    </li>
    <li  class="border<?php if($this->tpl_var['method'] == 'favor'){ ?> active<?php } ?>">
        <a href="index.php?exam-app-favor">
            <span class="glyphicon glyphicon-star"></span> 习题收藏
        </a>
    </li>
    <li  class="border<?php if($this->tpl_var['method'] == 'score'){ ?> active<?php } ?>">
        <a href="index.php?exam-app-score">
            <span class="glyphicon glyphicon-stats"></span> 成绩单
        </a>
    </li>
    <?php if($this->tpl_var['data']['currentbasic']['basicexam']['model'] == 0){ ?>
    <li  class="border<?php if($this->tpl_var['method'] == 'questions'){ ?> active<?php } ?>">
        <a href="index.php?exam-app-questions">
            <span class="glyphicon glyphicon-equalizer"></span> 试题库
        </a>
    </li>
    <?php } ?>
</ul>