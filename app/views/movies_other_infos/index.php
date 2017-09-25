<div id="movies_other_infos" > 
	 <div class="actions-content"> 
		 <button id="js-new" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"> 
			 <span class="ui-button-text"><?php echo I18n("new_movies_other_info");?></span> 
		 </button> 
		 <div class="both"></div> 
	 </div> 
	 <div id="waiting" ></div> 
	 <table id="table-movies_other_infos" class="display ex_highlight_row js-table-sorter"> 
		 <thead> 
			 <tr class="ui-widget-header "> 
				 <th class="column-action"></th> 
				 <th class="column-movie-id"><?php echo I18n("movie_id");?></th> 
				 <th class="column-other-info-id"><?php echo I18n("other_info_id");?></th> 
			 </tr> 
		 </thead> 
		 <tbody> 
		 <?php 
		 if($movies_other_infos){ 
			 foreach ($movies_other_infos as $movies_other_info) { ?> 
				 <tr class="line js-over" > 
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
					 <td class="movie "><?php echo $movies_other_info->get_movie()->get_id(); ?></td> 
					 <td class="other-info "><?php echo $movies_other_info->get_other_info()->get_id(); ?></td> 
				 </tr> 
			 <?php } 
			 } ?> 
		 </tbody> 
	 </table> 
 </div> 
 <div id="js-dialog-form"></div> 
 <div id="js-dialog-delete"></div> 
 <div id="js-path" class="hidden"><?php echo $controller."/"; ?></div> 
 <div id="js-message-delete" class="hidden"><?php echo I18n("delete_movies_other_info");?></div> 
 <div id="js-table-no-data" class="hidden"><?php echo I18n("table_no_data");?></div> 
