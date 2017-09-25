<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title><?php echo I18n('title'); ?></title>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
        <!--  shortchut  -->
<!--        <link href="/public/images/shortcut.png" type="image/x-icon" rel="shortcut icon"/>
        <link href="/public/images/shortcut.png" type="image/png" rel="icon"/>-->
        <!--  css  -->
        <link rel="stylesheet" type="text/css" href="/public/stylesheets/jquery/jquery-ui-1.8.24.custom.css" />
        <link rel="stylesheet" type="text/css" href="/public/stylesheets/jquery/jquery-tablesorter.css" />
        <link rel="stylesheet" type="text/css" href="/public/stylesheets/init.css" />
        <link rel="stylesheet" type="text/css" href="/public/stylesheets/main.css" />
        <link rel="stylesheet" type="text/css" href="/public/stylesheets/rajouts.css" />
        <!--  javascript  -->
        <script type="text/javascript" src="/public/javascripts/jquery/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/public/javascripts/jquery/jquery-ui-1.8.24.custom.min.js"></script>
        <script type="text/javascript" src="/public/javascripts/jquery/jquery.bubble.js"></script>
        <script type="text/javascript" src="/public/javascripts/jquery/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="/public/javascripts/jquery/jquery.ui.timepicker.js"></script>
        <script type="text/javascript" src="/public/javascripts/jquery/i18n/jquery.ui.datepicker-<?php echo $locale ;?>.js"></script>
        <script type="text/javascript" src="/public/javascripts/plugins/hover.js"></script>
        <script type="text/javascript" src="/public/javascripts/plugins/json.js"></script>
        <script type="text/javascript" src="/public/javascripts/init.js"></script>
        <script type="text/javascript" src="/public/javascripts/main.js"></script>
    </head>
    <body >
        <div id="main">
            <div id="header">
<!--                <div id="logo"></div>-->
                <?php 
                $class_content = "";
                $loan = new Loan();
                $movy_user = new MoviesUser();
                if ($session && ($session->get_id() != "")) {
                    $loans = $loan->find_by_id_owner($session->get_id()); 
                    $movies_users = $movy_user->find_by_user_id($session->get_id()); 
                    $class_content = "ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide"; ?>
                    <div id="menu" class="ui-tabs ui-widget ui-widget-content ui-corner-top">
                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                             <?php if ($session && ($session->get_user_status_id() == ADMINSTATUS )) { ?>
                            
                            <li class="ui-state-default ui-corner-top <?php if ($controller == "users" && $action == "index") { echo" ui-tabs-selected ui-state-active"; } ?>">
                                <a href="/users/index"><?php echo I18n('users'); ?></a>
                            </li>
                            <?php } ?>
                            <li class="ui-state-default ui-corner-top <?php if ($controller == "users" && $action == "my_account") { echo" ui-tabs-selected ui-state-active"; } ?>">
                                <a href="/users/my_account"><?php echo I18n('my_account'); ?></a>
                            </li>
                            <?php if ($session && ($session->get_user_status_id() == ADMINSTATUS )) {?>
                            <li class="ui-state-default ui-corner-top <?php if ($controller == "movies" && $action == "index") { echo" ui-tabs-selected ui-state-active"; } ?>">
                                <a href="/movies/index"><?php echo I18n('my_movies'); ?></a>
                            </li>
                    
                             <?php } ?>  
                            <?php if ($session && ($session->get_user_status_id() == MEMBERSTATUS )) {?>
                            <li class="ui-state-default ui-corner-top <?php if ($controller == "movies" && $action == "index") { echo" ui-tabs-selected ui-state-active"; } ?>">
                                <a href="/movies/index"><?php echo I18n('my_movies').' ('.count($movies_users).')'; ?></a>
                            </li>
                             <li id="js-tabs-new-order" class="ui-state-default ui-corner-top <?php if ($controller == "loans" && $action == "index") { echo" ui-tabs-selected ui-state-active"; } ?>">
                                <a href="/loans/index"><?php echo I18n('mes_prets').' ('.count($loans).')'; ?></a>

                            </li>
                             <?php } ?>  
                            <li class="ui-state-default ui-corner-top"><a href="/users/logout"><?php echo I18n('disconnect'); ?></a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div id="content"  class="<?php echo $class_content; ?> "><?php include($page); ?></div>
            <div id="footer"></div>
        </div>
    </body>
</html>

