<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("id_owner"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="loan[id_owner]" id="input-id-owner" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-numeric" value="<?php echo $loan->get_id_owner($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-id-owner"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("id_user"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="loan[id_user]" id="input-id-user" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-numeric" value="<?php echo $loan->get_id_user($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-id-user"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("id_movie"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="loan[id_movie]" id="input-id-movie" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-numeric" value="<?php echo $loan->get_id_movie($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-id-movie"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("name"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="loan[name]" id="input-name" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $loan->get_name($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-name"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("firs_name"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="loan[firs_name]" id="input-firs-name" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $loan->get_firs_name($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-firs-name"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("email"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="loan[email]" id="input-email" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-email" value="<?php echo $loan->get_email($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-email"><?php echo I18n("error_not_null"); ?></div> 
		 <div class="error-form hidden" id="error-email-email"><?php echo I18n("error_email"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("loanDate"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="loan[loanDate]" id="input-loanDate" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-date" value="<?php echo localize($loan->get_loanDate($encoding)); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-loanDate"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
