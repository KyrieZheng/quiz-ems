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
                    <div class="content-box padding">
                        <h2 class="title">成绩单</h2>
                        <ul class="list-unstyled list-img">
                            <?php if($this->tpl_var['scores']['number']){ ?>
                            <li class="border padding">
                                <div class="desc">
                                    <p>
                                        您的最高分：<span class="text-warning"><?php echo $this->tpl_var['s']['score']; ?></span>
                                        您的最好名次：<span class="text-warning"><?php echo $this->tpl_var['s']['index']; ?></span>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="border">
                                <div class="desc">
                                    <table class="table table-bordered table-hover">
                                        <tr class="info">
                                            <td width="80">名次</td>
                                            <td>姓名</td>
                                            <td>得分</td>
                                            <td>考试时间</td>
                                            <td width="120">用时</td>
                                        </tr>
                                        <?php $sid = 0;
 foreach($this->tpl_var['scores']['data'] as $key => $score){ 
 $sid++; ?>
                                        <tr>
                                            <td><?php echo ($this->tpl_var['page'] - 1)*20 + $sid; ?></td>
                                            <td><?php echo $score['usertruename']; ?></td>
                                            <td><?php echo $score['ehscore']; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s',$score['ehstarttime']); ?></td>
                                            <td><?php if($score['ehtime'] >= 60){ ?><?php if($score['ehtime']%60){ ?><?php echo intval($score['ehtime']/60)+1; ?><?php } else { ?><?php echo intval($score['ehtime']/60); ?><?php } ?>分钟<?php } else { ?><?php echo $score['ehtime']; ?>秒<?php } ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </li>
                        </ul>
                        <?php if($this->tpl_var['scores']['pages']){ ?>
                        <ul class="pagination pull-right"><?php echo $this->tpl_var['scores']['pages']; ?></ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php $this->_compileInclude('footer'); ?>
        </div>
    </div>
</div>
</body>
</html>
