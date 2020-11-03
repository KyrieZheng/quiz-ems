<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('coursenav'); ?>
            <div class="content">
                <div class="col-xs-9">
                    <div class="content-box padding">
                        <h2 class="title"><?php echo $this->tpl_var['content']['coursetitle']; ?></h2>
                        <ul class="list-img list-unstyled">
                            <li class="border padding">
                                <div class="desc" id="videoPlayer" style="width: 100%;"></div>
                            </li>
                            <li class="border padding">
                                <div class="desc">
                                    <?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['content']['coursedescribe'])); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-3 nopadding">
                    <div class="content-box padding">
                        <h2 class="title">
                            <?php echo $this->tpl_var['course']['cstitle']; ?>
                        </h2>
                        <ul class="list-unstyled list-txt" style="max-height: 640px;">
                            <?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
                            <?php if($content['courseid'] == $this->tpl_var['content']['courseid']){ ?>
                            <li class="border active">
                                <a data-toggle="tooltip" data-placement="top" title="<?php if($this->tpl_var['logs'][$content['courseid']] && $this->tpl_var['logs'][$content['courseid']]['logstatus'] == 1){ ?>已学完<?php } elseif($this->tpl_var['logs'][$content['courseid']] && $this->tpl_var['logs'][$content['courseid']]['logstatus'] == 0){ ?>上次学到<?php echo intval($this->tpl_var['logs'][$content['courseid']]['logprogress'] / 60); ?>分<?php echo $this->tpl_var['logs'][$content['courseid']]['logprogress'] % 60; ?>秒<?php } else { ?>未学习<?php } ?>" href="index.php?course-app-course&csid=<?php echo $this->tpl_var['course']['csid']; ?>&contentid=<?php echo $content['courseid']; ?>">
                                    <span class="badge">播放中</span>
                                    <?php echo $content['coursetitle']; ?>
                                </a>
                            </li>
                            <?php } else { ?>
                            <?php if($this->tpl_var['cdata']['lock'][$content['courseid']]){ ?>
                            <li class="border">
                                <a data-toggle="tooltip" data-placement="top" title="必须学完上个课程才能解锁">
                                    <span class="badge">待解锁</span>
                                    <?php echo $content['coursetitle']; ?>
                                </a>
                            </li>
                            <?php } else { ?>
                            <li class="border">
                                <a data-toggle="tooltip" data-placement="top" title="<?php if($this->tpl_var['logs'][$content['courseid']] && $this->tpl_var['logs'][$content['courseid']]['logstatus'] == 1){ ?>已学完<?php } elseif($this->tpl_var['logs'][$content['courseid']] && $this->tpl_var['logs'][$content['courseid']]['logstatus'] == 0){ ?>上次学到<?php echo intval($this->tpl_var['logs'][$content['courseid']]['logprogress'] / 60); ?>分<?php echo $this->tpl_var['logs'][$content['courseid']]['logprogress'] % 60; ?>秒<?php } else { ?>未学习<?php } ?>" href="index.php?course-app-course&csid=<?php echo $this->tpl_var['course']['csid']; ?>&contentid=<?php echo $content['courseid']; ?>">
                                    <span class="badge<?php if($this->tpl_var['logs'][$content['courseid']] && $this->tpl_var['logs'][$content['courseid']]['logstatus'] == 1){ ?> finish<?php } ?>">待播放</span>
                                    <?php echo $content['coursetitle']; ?>
                                </a>
                            </li>
                            <?php } ?>
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
<script>
$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var playerElement = document.getElementById("videoPlayer");
    var player = new Clappr.Player({
        source: '<?php echo $this->tpl_var['content']['course_files']; ?>',
        mute: false,
        height: 480,
        width: 845,
        disableVideoTagContextMenu:true
    });
    player.attachTo(playerElement);
    <?php if($this->tpl_var['logs'][$this->tpl_var['content']['courseid']]['logprogress']){ ?>
    player.seek(<?php echo $this->tpl_var['logs'][$this->tpl_var['content']['courseid']]['logprogress']; ?>);
    <?php } ?>
    $.recordVideo = setInterval(function(){
        $.get('index.php?course-app-course-recordtime&courseid=<?php echo $this->tpl_var['content']['courseid']; ?>&time='+player.getCurrentTime()+'&'+Math.random());
    },10000);
    var listenseek = function () {
        player.once('seek',function(){
            var time = this.getCurrentTime();
            setTimeout(function(){
                player.seek(time);
                listenseek();
            },10);
        });
    }
    listenseek();
    player.on('ended',function(){
        $.get('index.php?course-app-course-endstatus&courseid=<?php echo $this->tpl_var['content']['courseid']; ?>&'+Math.random(),function(){
            window.location.reload();
        });
    });
});
</script>
</body>
</html>
