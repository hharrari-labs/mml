<div id="content-captcha" class="ui-dialog ui-widget ui-widget-content ui-corner-all"> 
	 <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"> 
		 <span class="ui-dialog-title ui-dialog-title-dialog-form"> 
			 <?php echo I18n("captcha_title"); ?> 
			 <a href="<?php echo $return; ?>" class="back_home" ><?php echo I18n("back_home"); ?></a> 
		 </span> 
	 </div> 
	 <div id="captcha" class="ui-dialog-content ui-widget-content"> 
		 <form id="captcha-form" action="/users/captcha" method="post"> 
			 <div class="content-captcha-image"> 
				 <?php dsp_crypt(0, 1); ?> 
			 </div> 
			 <div class="captcha-line"> 
				 <label class="captcha-label"><?php echo I18n('captcha'); ?> :</label> 
				 <input type="text" name="code" class="ui-widget-content ui-corner-all"> 
			 </div> 
			 <div class="captcha-line"> 
				 <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"><span class="ui-button-text"><?php echo I18n('send'); ?></span></button> 
			 </div> 
		 </form> 
	 </div> 
</div> 
