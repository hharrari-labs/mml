<input type="hidden" name="other_info[id]" id="input-id" class="ui-widget-content ui-corner-all js-form " value="<?php echo $other_info->get_id(); ?>" /> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("type"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="other_info[type]" id="input-type" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $other_info->get_type($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-type"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("description"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="other_info[description]" id="input-description" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $other_info->get_description($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-description"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
