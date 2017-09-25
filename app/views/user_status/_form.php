<input type="hidden" name="user_statu[id]" id="input-id" class="ui-widget-content ui-corner-all js-form " value="<?php echo $user_statu->get_id(); ?>" /> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("status"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="user_statu[status]" id="input-status" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $user_statu->get_status($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-status"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
