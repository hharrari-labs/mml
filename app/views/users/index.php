<div id="users" > 
	 <div class="actions-content"> 
		 <button id="js-new" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"> 
			 <span class="ui-button-text"><?php echo I18n("new_user");?></span> 
		 </button> 
		 <div class="both"></div> 
	 </div> 
	 <div id="waiting" ></div> 
	 <table id="table-users" class="display ex_highlight_row js-table-sorter"> 
		 <thead> 
			 <tr class="ui-widget-header "> 
				 <th class="column-action"></th> 
				 <th class="column-name"><?php echo I18n("name");?></th> 
				 <th class="column-first-name"><?php echo I18n("first_name");?></th> 
				 <th class="column-email"><?php echo I18n("email");?></th> 
				 <th class="column-password"><?php echo I18n("password");?></th> 
				 <th class="column-adversity"><?php echo I18n("adversity");?></th> 
				 <th class="column-signature"><?php echo I18n("signature");?></th> 
				 <th class="column-presentation"><?php echo I18n("presentation");?></th> 
				 <th class="column-location"><?php echo I18n("location");?></th> 
				 <th class="column-user-status-id"><?php echo I18n("user_status_id");?></th> 
			 </tr> 
		 </thead> 
		 <tbody> 
		 <?php 
		 if($users){ 
			 foreach ($users as $user) { ?> 
				 <tr class="line js-over" id="line-<?php echo $user->get_id(); ?>" > 
					 <td class="column-action "> 
						 <div class="action-icons"> 
							 <div class="delete js-delete js-button ui-widget-content ui-corner-all"> 
								 <span class="ui-icon ui-icon-close" title="<?php echo I18n("delete");?>"></span> 
							 </div> 
							 <div class="update js-update js-button ui-state-default ui-corner-all" > 
								 <span class="ui-icon ui-icon-pencil" title="<?php echo I18n("edit");?>"></span> 
							 </div> 
						 </div> 
					 </td> 
					 <td class="name "><?php echo $user->get_name(); ?></td> 
					 <td class="first-name "><?php echo $user->get_first_name(); ?></td> 
					 <td class="email "><?php echo $user->get_email(); ?></td> 
					 <td class="password "><?php echo $user->get_password(); ?></td> 
					 <td class="adversity "><?php echo $user->get_adversity(); ?></td> 
					 <td class="signature "><?php echo $user->get_signature(); ?></td> 
					 <td class="presentation "><?php echo $user->get_presentation(); ?></td> 
					 <td class="location "><?php echo $user->get_location(); ?></td> 
					 <td class="user-status "><?php echo $user->get_user_status()->get_id(); ?></td> 
				 </tr> 
			 <?php } 
			 } ?> 
		 </tbody> 
	 </table> 
 </div> 
 <div id="js-dialog-form"></div> 
 <div id="js-dialog-delete"></div> 
 <div id="js-path" class="hidden"><?php echo $controller."/"; ?></div> 
 <div id="js-message-delete" class="hidden"><?php echo I18n("delete_user");?></div> 
 <div id="js-table-no-data" class="hidden"><?php echo I18n("table_no_data");?></div> 
