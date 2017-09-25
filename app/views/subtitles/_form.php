<input type="hidden" name="subtitle[id]" id="input-id" class="ui-widget-content ui-corner-all js-form " value="<?php echo $subtitle->get_id(); ?>" /> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("language"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="subtitle[language]" id="input-language" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $subtitle->get_language($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-language"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("type"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="subtitle[type]" id="input-type" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $subtitle->get_type($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-type"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
