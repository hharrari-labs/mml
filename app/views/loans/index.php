<div id="loans" > 
	 <div class="actions-content"> 
		 <button id="js-new" class="js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" style="visibility:hidden;"> 
			 <span class="ui-button-text"><?php echo I18n("new_loan");?></span> 
		 </button> 
		 <div class="both"></div> 
	 </div> 
	 <div id="waiting" ></div> 
	 <table id="table-loans" class="display ex_highlight_row js-table-sorter">
                        
		 <thead> 
			 <tr class="ui-widget-header "> 
				 <th class="column-id-movie"><?php echo I18n("id_movie");?></th> 
				 <th class="column-name"><?php echo I18n("name");?></th> 
				 <th class="column-firs-name"><?php echo I18n("firs_name");?></th> 
				 <th class="column-email"><?php echo I18n("email");?></th> 
				 <th class="column-loanDate"><?php echo I18n("loanDate");?></th> 
			 </tr> 
		 </thead> 
		 <tbody> 
		 <?php 
                 
                
		 if($loans){ 
			 foreach ($loans as $loan) { 
                          
                             $movies = $movie->find_by_id($loan->get_id_movie());
                             
                               ?> 
                     
				 <tr class="line js-over" >  
                                     <td class="id-movie "><?php echo $movies->get_title_vf(); ?></td> 
					 <td class="name "><?php echo $loan->get_name(); ?></td> 
					 <td class="firs-name "><?php echo $loan->get_firs_name(); ?></td> 
					 <td class="email "><?php echo $loan->get_email(); ?></td> 
					 <td class="loanDate "><?php echo ($loan->get_loanDate()); ?></td> 
				 </tr> 
	
			 <?php } 
			 } ?> 
		 </tbody> 
	 </table> 
 </div> 
 <div id="js-dialog-form"></div> 
 <div id="js-dialog-delete"></div> 
 <div id="js-path" class="hidden"><?php echo $controller."/"; ?></div> 
 <div id="js-message-delete" class="hidden"><?php echo I18n("delete_loan");?></div> 
 <div id="js-table-no-data" class="hidden"><?php echo I18n("table_no_data");?></div> 
