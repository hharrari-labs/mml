<div id="content-forgotten-password" class="ui-dialog ui-widget ui-widget-content ui-corner-all"> 
	 <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"> 
		 <span class="ui-dialog-title ui-dialog-title-dialog-form"> 
			 <?php echo I18n("forgotten_password_title"); ?> 
			 <a href="<?php echo $return; ?>" class="back_home" ><?php echo I18n("back_home"); ?></a> 
		 </span> 
	 </div> 
	 <div id="forgotten-password" class="ui-dialog-content ui-widget-content"> 
		 <div class="ui-state-highlight ui-corner-all <?php if ($error == false) { echo "hidden"; } ?>" id="error-forgotten-password"> 
			 <span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-alert"></span> 
			 <?php echo I18n('error_forgotten-password'); ?> 
		 </div> 
		 <form id="forgotten-password-form" action="/users/update_password" method="post"> 
			 <div class="forgotten-password-line"> 
				 <label class="forgotten-password-label"><?php echo I18n('email'); ?> :</label> 
				 <input type="text" name="email" class="ui-widget-content ui-corner-all js-email"> 
			 </div> 
			 <div class="forgotten-password-line"> 
				 <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"><span class="ui-button-text"><?php echo I18n('send'); ?></span></button> 
			 </div> 
		 </form> 
	 </div> 
</div> 
