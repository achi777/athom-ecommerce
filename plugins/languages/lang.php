<?php
        switch (@$_SESSION['lang']) {
            case "geo":
                @require_once "plugins/languages/lang/geo.php";
                break;
            case "eng":
                @require_once "plugins/languages/lang/eng.php";
                break;
            case "rus":
                @require_once "plugins/languages/lang/rus.php";
                break;
            default:
                @$_SESSION['lang'] = "geo";
                @require_once "plugins/languages/lang/geo.php";
                break;
        }
?>