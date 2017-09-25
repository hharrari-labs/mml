<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("movie_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_team[movie_id]" id="input-movie" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_movie_id"); ?></option> 
			 <?php $movies = $movies_team->get_movie()->all(); 
			 if ($movies) { 
				 foreach ($movies as $movie) { ?> 
					 <option <?php if ($movie->get_id() == $movies_team->get_movie_id()) { echo  "selected='selected'"; } ?> value="<?php echo $movie->get_id(); ?>"><?php echo $movie->get_id($encoding); ?></option> 
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
		 <?php echo I18n("team_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_team[team_id]" id="input-team" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_team_id"); ?></option> 
			 <?php $teams = $movies_team->get_team()->all(); 
			 if ($teams) { 
				 foreach ($teams as $team) { ?> 
					 <option <?php if ($team->get_id() == $movies_team->get_team_id()) { echo  "selected='selected'"; } ?> value="<?php echo $team->get_id(); ?>"><?php echo $team->get_id($encoding); ?></option> 
				 <?php } ?> 
			 <?php } ?> 
		 </select> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-team"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("role"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <input type="text" name="movies_team[role]" id="input-role" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " value="<?php echo $movies_team->get_role($encoding); ?>" /> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-role"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
