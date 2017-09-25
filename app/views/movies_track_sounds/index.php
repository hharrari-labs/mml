<div id="movies_track_sounds" > 
	 <div class="actions-content"> 
		 <button id="js-new" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"> 
			 <span class="ui-button-text"><?php echo I18n("new_movies_track_sound");?></span> 
		 </button> 
		 <div class="both"></div> 
	 </div> 
	 <div id="waiting" ></div> 
	 <table id="table-movies_track_sounds" class="display ex_highlight_row js-table-sorter"> 
		 <thead> 
			 <tr class="ui-widget-header "> 
				 <th class="column-action"></th> 
				 <th class="column-movie-id"><?php echo I18n("movie_id");?></th> 
				 <th class="column-track-sound-id"><?php echo I18n("track_sound_id");?></th> 
			 </tr> 
		 </thead> 
		 <tbody> 
		 <?php 
		 if($movies_track_sounds){ 
			 foreach ($movies_track_sounds as $movies_track_sound) { ?> 
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
					 <td class="movie "><?php echo $movies_track_sound->get_movie()->get_id(); ?></td> 
					 <td class="track-sound "><?php echo $movies_track_sound->get_track_sound()->get_id(); ?></td> 
				 </tr> 
			 <?php } 
			 } ?> 
		 </tbody> 
	 </table> 
 </div> 
 <div id="js-dialog-form"></div> 
 <div id="js-dialog-delete"></div> 
 <div id="js-path" class="hidden"><?php echo $controller."/"; ?></div> 
 <div id="js-message-delete" class="hidden"><?php echo I18n("delete_movies_track_sound");?></div> 
 <div id="js-table-no-data" class="hidden"><?php echo I18n("table_no_data");?></div> 
