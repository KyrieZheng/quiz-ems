<?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
<?php if($this->tpl_var['numbers'][$quest['questid']]){ ?>
<div class="form-group underline">
    <label class="block">
        <div class="col-xs-4 tip">
            <?php echo $quest['questype']; ?>
        </div>
        <div class="col-xs-8 form-inline">
            共 <?php echo $this->tpl_var['numbers'][$quest['questid']]; ?> 题，选 <input id="question_<?php echo $quest['questid']; ?>" type="text" class="form-control text-center" name="args[number][<?php echo $quest['questid']; ?>]" msg="<?php echo $quest['questype']; ?>题量设置错误" maxvalue="<?php echo $this->tpl_var['numbers'][$quest['questid']]; ?>" value="0" size="1"/> 题
        </div>
    </label>
</div>
<?php } ?>
<?php } ?>