<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("movie_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_other_info[movie_id]" id="input-movie" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_movie_id"); ?></option> 
			 <?php $movies = $movies_other_info->get_movie()->all(); 
			 if ($movies) { 
				 foreach ($movies as $movie) { ?> 
					 <option <?php if ($movie->get_id() == $movies_other_info->get_movie_id()) { echo  "selected='selected'"; } ?> value="<?php echo $movie->get_id(); ?>"><?php echo $movie->get_id($encoding); ?></option> 
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
		 <?php echo I18n("other_info_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_other_info[other_info_id]" id="input-other-info" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_other_info_id"); ?></option> 
			 <?php $other_infos = $movies_other_info->get_other_info()->all(); 
			 if ($other_infos) { 
				 foreach ($other_infos as $other_info) { ?> 
					 <option <?php if ($other_info->get_id() == $movies_other_info->get_other_info_id()) { echo  "selected='selected'"; } ?> value="<?php echo $other_info->get_id(); ?>"><?php echo $other_info->get_id($encoding); ?></option> 
				 <?php } ?> 
			 <?php } ?> 
		 </select> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-other-info"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
