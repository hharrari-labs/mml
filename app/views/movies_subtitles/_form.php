<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("movie_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_subtitle[movie_id]" id="input-movie" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_movie_id"); ?></option> 
			 <?php $movies = $movies_subtitle->get_movie()->all(); 
			 if ($movies) { 
				 foreach ($movies as $movie) { ?> 
					 <option <?php if ($movie->get_id() == $movies_subtitle->get_movie_id()) { echo  "selected='selected'"; } ?> value="<?php echo $movie->get_id(); ?>"><?php echo $movie->get_id($encoding); ?></option> 
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
		 <?php echo I18n("subtitle_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_subtitle[subtitle_id]" id="input-subtitle" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_subtitle_id"); ?></option> 
			 <?php $subtitles = $movies_subtitle->get_subtitle()->all(); 
			 if ($subtitles) { 
				 foreach ($subtitles as $subtitle) { ?> 
					 <option <?php if ($subtitle->get_id() == $movies_subtitle->get_subtitle_id()) { echo  "selected='selected'"; } ?> value="<?php echo $subtitle->get_id(); ?>"><?php echo $subtitle->get_id($encoding); ?></option> 
				 <?php } ?> 
			 <?php } ?> 
		 </select> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-subtitle"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
