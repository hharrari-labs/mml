<input type="hidden" name="user[id]" id="input-id" class="ui-widget-content ui-corner-all js-form " value="<?php echo $user->get_id(); ?>" /> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("name"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="user[name]" id="input-name" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $user->get_name($encoding); ?>" /> 
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
		 <input type="text" name="user[first_name]" id="input-first-name" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $user->get_first_name($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-first-name"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("email"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="user[email]" id="input-email" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-email" value="<?php echo $user->get_email($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-email"><?php echo I18n("error_not_null"); ?></div> 
		 <div class="error-form hidden" id="error-email-email"><?php echo I18n("error_email"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("password"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="password" name="user[password]" id="input-password" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-password" value="<?php echo $user->get_password($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-password"><?php echo I18n("error_not_null"); ?></div> 
		 <div class="error-form hidden" id="error-password-password"><?php echo I18n("error_password"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("adversity"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="user[adversity]" id="input-adversity" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $user->get_adversity($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-adversity"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("signature"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="user[signature]" id="input-signature" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $user->get_signature($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-signature"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("presentation"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="user[presentation]" id="input-presentation" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $user->get_presentation($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-presentation"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("location"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="user[location]" id="input-location" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $user->get_location($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-location"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 

