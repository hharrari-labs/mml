<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("movie_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_track_sound[movie_id]" id="input-movie" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_movie_id"); ?></option> 
			 <?php $movies = $movies_track_sound->get_movie()->all(); 
			 if ($movies) { 
				 foreach ($movies as $movie) { ?> 
					 <option <?php if ($movie->get_id() == $movies_track_sound->get_movie_id()) { echo  "selected='selected'"; } ?> value="<?php echo $movie->get_id(); ?>"><?php echo $movie->get_id($encoding); ?></option> 
				 <?php } ?> 
			 <?php } ?> 
		 </select> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-movie"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("track_sound_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_track_sound[track_sound_id]" id="input-track-sound" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_track_sound_id"); ?></option> 
			 <?php $track_sounds = $movies_track_sound->get_track_sound()->all(); 
			 if ($track_sounds) { 
				 foreach ($track_sounds as $track_sound) { ?> 
					 <option <?php if ($track_sound->get_id() == $movies_track_sound->get_track_sound_id()) { echo  "selected='selected'"; } ?> value="<?php echo $track_sound->get_id(); ?>"><?php echo $track_sound->get_id($encoding); ?></option> 
				 <?php } ?> 
			 <?php } ?> 
		 </select> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-track-sound"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
