<input type="hidden" name="team[id]" id="input-id" class="ui-widget-content ui-corner-all js-form " value="<?php echo $team->get_id(); ?>" /> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("name"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="team[name]" id="input-name" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $team->get_name($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-name"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("first_name"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="team[first_name]" id="input-first-name" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $team->get_first_name($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-first-name"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
