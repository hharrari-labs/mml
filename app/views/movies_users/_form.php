<div class="line-form "> 
	 <label class="label-form"> 
		 <?php echo I18n("movie_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_user[movie_id]" id="input-movie" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_movie_id"); ?></option> 
			 <?php $movies = $movies_user->get_movie()->all(); 
			 if ($movies) { 
				 foreach ($movies as $movie) { ?> 
					 <option <?php if ($movie->get_id() == $movies_user->get_movie_id()) { echo  "selected='selected'"; } ?> value="<?php echo $movie->get_id(); ?>"><?php echo $movie->get_id($encoding); ?></option> 
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
		 <?php echo I18n("user_id"); ?> : <span class="mandatory ">*</span>
	 </label> 
	 <div class="content-input-form" > 
		 <select name="movies_user[user_id]" id="input-user" class="ui-widget-content ui-corner-all js-form js-mandatory js-show-view " > 
			 <option value=""><?php echo I18n("select_user_id"); ?></option> 
			 <?php $users = $movies_user->get_user()->all(); 
			 if ($users) { 
				 foreach ($users as $user) { ?> 
					 <option <?php if ($user->get_id() == $movies_user->get_user_id()) { echo  "selected='selected'"; } ?> value="<?php echo $user->get_id(); ?>"><?php echo $user->get_id($encoding); ?></option> 
				 <?php } ?> 
			 <?php } ?> 
		 </select> 
	 </div> 
	 <div class="content-error-form ui-state-highlight ui-corner-all hidden"> 
		 <span class="icon-error-form ui-icon ui-icon-alert"></span> 
		 <div class="error-form hidden" id="error-not-null-user"><?php echo I18n("error_not_null"); ?></div> 
	 </div> 
</div> 
