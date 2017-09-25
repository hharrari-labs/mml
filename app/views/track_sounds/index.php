<div id="track_sounds" > 
	 <div class="actions-content"> 
		 <button id="js-new" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"> 
			 <span class="ui-button-text"><?php echo I18n("new_track_sound");?></span> 
		 </button> 
		 <div class="both"></div> 
	 </div> 
	 <div id="waiting" ></div> 
	 <table id="table-track_sounds" class="display ex_highlight_row js-table-sorter"> 
		 <thead> 
			 <tr class="ui-widget-header "> 
				 <th class="column-action"></th> 
				 <th class="column-language"><?php echo I18n("language");?></th> 
				 <th class="column-encoding"><?php echo I18n("encoding");?></th> 
				 <th class="column-standard-audio"><?php echo I18n("standard_audio");?></th> 
			 </tr> 
		 </thead> 
		 <tbody> 
		 <?php 
		 if($track_sounds){ 
			 foreach ($track_sounds as $track_sound) { ?> 
				 <tr class="line js-over" id="line-<?php echo $track_sound->get_id(); ?>" > 
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
					 <td class="language "><?php echo $track_sound->get_language(); ?></td> 
					 <td class="encoding "><?php echo $track_sound->get_encoding(); ?></td> 
					 <td class="standard-audio "><?php echo $track_sound->get_standard_audio(); ?></td> 
				 </tr> 
			 <?php } 
			 } ?> 
		 </tbody> 
	 </table> 
 </div> 
 <div id="js-dialog-form"></div> 
 <div id="js-dialog-delete"></div> 
 <div id="js-path" class="hidden"><?php echo $controller."/"; ?></div> 
 <div id="js-message-delete" class="hidden"><?php echo I18n("delete_track_sound");?></div> 
 <div id="js-table-no-data" class="hidden"><?php echo I18n("table_no_data");?></div> 
