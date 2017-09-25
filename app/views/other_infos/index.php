<div id="other_infos" > 
	 <div class="actions-content"> 
		 <button id="js-new" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"> 
			 <span class="ui-button-text"><?php echo I18n("new_other_info");?></span> 
		 </button> 
		 <div class="both"></div> 
	 </div> 
	 <div id="waiting" ></div> 
	 <table id="table-other_infos" class="display ex_highlight_row js-table-sorter"> 
		 <thead> 
			 <tr class="ui-widget-header "> 
				 <th class="column-action"></th> 
				 <th class="column-type"><?php echo I18n("type");?></th> 
				 <th class="column-description"><?php echo I18n("description");?></th> 
			 </tr> 
		 </thead> 
		 <tbody> 
		 <?php 
		 if($other_infos){ 
			 foreach ($other_infos as $other_info) { ?> 
				 <tr class="line js-over" id="line-<?php echo $other_info->get_id(); ?>" > 
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
					 <td class="type "><?php echo $other_info->get_type(); ?></td> 
					 <td class="description "><?php echo $other_info->get_description(); ?></td> 
				 </tr> 
			 <?php } 
			 } ?> 
		 </tbody> 
	 </table> 
 </div> 
 <div id="js-dialog-form"></div> 
 <div id="js-dialog-delete"></div> 
 <div id="js-path" class="hidden"><?php echo $controller."/"; ?></div> 
 <div id="js-message-delete" class="hidden"><?php echo I18n("delete_other_info");?></div> 
 <div id="js-table-no-data" class="hidden"><?php echo I18n("table_no_data");?></div> 
