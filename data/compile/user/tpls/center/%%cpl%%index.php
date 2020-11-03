<?php $this->_compileInclude('header'); ?>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="pages">
            <?php $this->_compileInclude('nav'); ?>
            <div class="content">
                <div class="col-xs-3" style="width: 20%">
                    <div class="content-box padding">
                        <?php $this->_compileInclude('menu'); ?>
                    </div>
                </div>
                <div class="col-xs-9 nopadding" style="width: 80%">
                    <div class="content-box padding">
                        <h2 class="title">
                            <?php echo $this->tpl_var['_user']['username']; ?>
                        </h2>
                        <ul class="list-unstyled list-img">
                            <li class="border morepadding">
                                <div class="intro">
                                    <div class="col-xs-3 img">
                                        <img src="<?php if($this->tpl_var['_user']['userphoto']){ ?><?php echo $this->tpl_var['_user']['userphoto']; ?><?php } else { ?>app/exam/styles/image/paper.png<?php } ?>" />
                                    </div>
                                    <div class="desc col-xs-9">
                                        <table width="100%">
                                            <tr>
                                                <td width="33%">
                                                    <p>注册日期：<?php echo date('Y-m-d',$this->tpl_var['_user']['userregtime']); ?></p>
                                                    <p>注册IP：<?php echo $this->tpl_var['_user']['userregip']; ?></p>
                                                    <p>您现有积分：<?php echo $this->tpl_var['_user']['usercoin']; ?></p>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>用户组：<?php echo $this->tpl_var['groups'][$this->tpl_var['_user']['usergroupid']]['groupname']; ?></p>
                                                    <p>真实姓名：<?php echo $this->tpl_var['_user']['usertruename']; ?></p>
                                                    <p>邮箱：<?php echo $this->tpl_var['_user']['useremail']; ?></p>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
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
