<div id="content-login" class="ui-dialog ui-widget ui-widget-content ui-corner-all"> 
	 <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"> 
		 <span class="ui-dialog-title ui-dialog-title-dialog-form"> <?php echo I18n("login_title"); ?></span> 
	 </div> 
	 <div id="login" class="ui-dialog-content ui-widget-content"> 
		 <div id="error-login" class="ui-state-highlight ui-corner-all <?php if ($error == false) { echo "hidden"; } ?>"> 
			 <span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-alert"></span> 
			 <?php echo I18n('error_login'); ?> 
		 </div> 
		 <form id="login-form" action="users/connect" method="POST"> 
			 <div class="login-line"> 
				 <label class="login-label"><?php echo I18n("login_email"); ?>:</label> 
				 <input type="text" class="js-enter-login left ui-widget-content ui-corner-all" name="login_email" id="login-email" value="" tabindex="1" /> 
			 </div> 
			 <div class="login-line"> 
				 <label class="login-label"><?php echo I18n("login_password"); ?>:</label> 
				 <input type="password" class="js-enter-login left ui-widget-content ui-corner-all" name="login_password" id="login-password" value="" tabindex="2" /> 
			 </div> 
			 <div class="login-line"> 
				 <a href="/users/captcha"> <?php echo I18n("forgotten_password"); ?></a> 
				 <div id="submit-login" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"><span class="ui-button-text"><?php echo I18n("connect"); ?></span></div> 
			 </div> 
		 </form> 
	 </div> 
</div> 
