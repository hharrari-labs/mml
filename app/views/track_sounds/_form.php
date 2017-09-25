<input type="hidden" name="track_sound[id]" id="input-id" class="ui-widget-content ui-corner-all js-form " value="<?php echo $track_sound->get_id(); ?>" /> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("language"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="track_sound[language]" id="input-language" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $track_sound->get_language($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-language"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("encoding"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="track_sound[encoding]" id="input-encoding" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $track_sound->get_encoding($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-encoding"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("standard_audio"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="track_sound[standard_audio]" id="input-standard-audio" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $track_sound->get_standard_audio($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-standard-audio"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
