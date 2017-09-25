<?php

function path_return() {
    $return = "";
    $url = explode('/', $_SERVER["REQUEST_URI"]);
    foreach ($url as $key => $path) {
        if ($key > 0) {
            $return.="../";
        }
    }
    return $return;
}

function locale($locale = '') {
    if ($locale == "") {
        if (!isset($_SESSION['locale'])) {
            $locale = LANGUAGE;
            $_SESSION['locale'] = $locale;
        } else {
            $locale = $_SESSION['locale'];
        }
    } else {
        $_SESSION['locale'] = $locale;
    }
    return $locale;
}

function dictionnary($controller) {
    $locale = locale();
    $path = $_SERVER["DOCUMENT_ROOT"] . "/config/locales/$controller/$locale.php";
    $dictionnary = require_once($_SERVER["DOCUMENT_ROOT"] . "/config/locales/$locale.php");
    if (file_exists($path)) {
        $current_dictionnary = require_once ($path);
        $_SESSION['dictionary'] = array_merge($current_dictionnary, $dictionnary);
    } else {
        $_SESSION['dictionary'] = $dictionnary;
    }
}

function I18n($word, $dictionary = '') {
    if ($dictionary == '') {
        $translate = $_SESSION['dictionary'];
    } else {
        $translate = array_merge($_SESSION['dictionary'], $dictionary);
    }
    return $translate[$word];
}

function localize($date, $locale = '') {
    if ($locale == '') {
        $locale = locale();
    }
    if (substr($date, 4, 1) == '-') {
        $explode_date = explode("-", $date);
    } else {
        return $date;
    }
    if ($locale == 'fr') {
        return $explode_date[2] . '/' . $explode_date[1] . '/' . $explode_date[0];
    } elseif ($locale == 'en') {
        return $explode_date[1] . '/' . $explode_date[2] . '/' . $explode_date[0];
    } else {
        return $date;
    }
}

function to_db($date, $locale = '') {
    if ($locale == '') {
        $locale = locale();
    }
    if (substr($date, 2, 1) == '/') {
        $explode_date = explode("/", $date);
    } else {
        return $date;
    }
    if ($locale == 'fr') {
        return $explode_date[2] . '-' . $explode_date[1] . '-' . $explode_date[0];
    } elseif ($locale == 'en') {
        return $explode_date[2] . '-' . $explode_date[0] . '-' . $explode_date[1];
    } else {
        return $date;
    }
}

function number_format_locale($number, $decimals=2, $locale='') {
    if ($locale == '') {
        $locale = locale();
    }
    switch ($locale) {
        case 'en':
            $decimal = '.';
            $thousands = ',';
            break;
        case 'fr':
            $decimal = ',';
            $thousands = ' ';
            break;
        default:
            $decimal = '.';
            $thousands = '';
            break;
    }
    return number_format($number, $decimals, $decimal, $thousands);
}

function truncate_field($string, $limit, $break=" ", $pad="...") {
    if (strlen($string) <= $limit) {
        return $string;
    }
    $string = substr($string, 0, $limit);
    if (false !== ($breakpoint = strrpos($string, $break))) {
        $string = substr($string, 0, $breakpoint);
    }
    return $string . $pad;
}

function destroy_files($dir) {
    
    if (is_dir($dir) == false ) {
        mkdir($dir);
    }
    
    $mydir = opendir($dir);
    while (false !== ($file = readdir($mydir))) {
        if ($file != "." && $file != "..") {
            unlink($dir . $file);
        }
    }
    closedir($mydir);
}

function remove_accent($word) {
    $word = str_replace('&eacute;', 'e', $word);
    $word = str_replace('&ecirc;', 'e', $word);
    $word = str_replace('&egrave;', 'e', $word);
    $word = str_replace('&agrave;', 'a', $word);
    $word = str_replace('&ucirc;', 'u', $word);
    return $word;
}

function clean_name_file($name) {
    $name = str_replace(' ', '_', $name);
    $name = str_replace('.', '_', $name);
    $name = str_replace('/', '_', $name);
    $name = str_replace('-', '_', $name);
    $name = str_replace(';', '_', $name);
    $name = str_replace(',', '_', $name);
    return $name;
}

function get_interval($old_date, $new_date) {
    $time = strtotime($new_date) - strtotime($old_date);
    if ($time == 0) {
        return '0';
    } else {
        $interval = $time / 86400;
        return $interval;
    }
}

function authorization($status, $controller, $action) {
    switch ($controller) {
        case "users":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;

        case "bri_orders":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    break;
                case CUSTATUS:
                    break;
                default:
                    break;
            }
            break;
        case "bri_percentages":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;
        case "customers":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;
        case "import_customers":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;
        case "import_products":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;
        case "level_raffles":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;
        case "levels":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    if ($action != "level") {
                        header("Location: " . path_return());
                    }
                    break;
                case CUSTATUS:
                    if ($action != "next_level" && $action != "previous_level") {
                        header("Location: " . path_return());
                    }
                    break;
                default:
                    break;
            }
            break;
        case "order_lines":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;

        case "orders":
            switch ($status) {
                case ADMINSTATUS:
                    switch ($action) {
                        case "new":
                            header("Location: " . path_return());
                            break;
                        case "create":
                            header("Location: " . path_return());
                            break;
                    }
                    break;
                case RDVSTATUS:
                    break;
                case CUSTATUS:
                    break;
                default:
                    break;
            }
            break;

        case "products":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;

        case "raffle_orders":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    if ($action != "new") {
                        header("Location: " . path_return());
                    }
                    break;
                case CUSTATUS:
                    if ($action != "new") {
                        header("Location: " . path_return());
                    }
                    break;
                default:
                    break;
            }
            break;

        case "reports":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    break;
                case CUSTATUS:
                    break;
                default:
                    break;
            }
            break;
        case "required_categories":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;


        case "unit_groups":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;

        case "user_status":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:
                    header("Location: " . path_return());
                    break;
                case CUSTATUS:
                    header("Location: " . path_return());
                    break;
                default:
                    break;
            }
            break;
        case "users":
            switch ($status) {
                case ADMINSTATUS:
                    break;
                case RDVSTATUS:

                    break;
                case CUSTATUS:

                    break;
                default:
                    break;
            }
            break;
        default:
            break;
    }
}

function controller_and_action_after_login($status, &$controller, &$action) {
    switch ($status) {
        case ADMINSTATUS:
            $controller = "users";
            $action = "index";            
            break;
        case MEMBERSTATUS:
            $controller = "users";
            $action = "my_account";
            break;
        default:
            $action = "index";
            $controller = "users";
            break;
    }
}

function first_delivery_date($number_of_day) {

    $current_time = date(Gi);
    $add_day = 0;
    $day = 0;
    if ($current_time >= 1200) {
        /* Ajoute 1 jours si on a dépassé midi */
        $add_day = 1;
    }
    
    while ($day < NBDAYDELIVERY) {
        $current_date = strtotime('+' . $add_day . ' day', strtotime(date("Y-m-d")));
        $date = getdate($current_date);
        $add_day++;
        /* Test si on est sur un jour ouvré */
        if ($date[weekday] != "Sunday" && $date[weekday] != "Saturday") {
            $day++;
        }
    }
    
    return $add_day;
}

function remove_time_to_date($timestamp) {
    $date = explode(' ', $timestamp);
    return $date[0];
}

?>