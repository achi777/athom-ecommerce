<!DOCTYPE HTML>
<html>

<head>
    <title>admin</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{baseurl}}/assets/css/bootstrap.css">
    <!-- PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- /PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="{{baseurl}}/assets/css/core.css">
    <link rel="stylesheet" href="{{baseurl}}/assets/css/components.css">
    <link rel="stylesheet" href="{{baseurl}}/assets/icons/fontawesome/styles.min.css">
    <link rel="stylesheet" href="{{baseurl}}/theme_lib/css/chartist.min.css">
    <!-- CSS defining icons (required) -->
    <link rel="stylesheet" href="{{baseurl}}/theme_lib/webfont/cryptocoins.css">
    <link rel="stylesheet" href="{{baseurl}}/theme_lib/font-gel/css/font-larisome.min.css">


    <script type="text/javascript" src="{{baseurl}}/theme_lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{baseurl}}/theme_lib/js/tether.min.js"></script>
    <script type="text/javascript" src="{{baseurl}}/theme_lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{baseurl}}/theme_lib/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{baseurl}}/theme_lib/js/chartist.min.js"></script>
    <script type="text/javascript" src="{{baseurl}}/assets/js/app.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- /PAGE LEVEL SCRIPTS -->
    <style>
    .list_img {
        width: 75px;
    }
    .tree {
        min-height:20px;
        padding:19px;
        margin-bottom:20px;
        background-color:#fbfbfb;
        border:1px solid #999;
        -webkit-border-radius:4px;
        -moz-border-radius:4px;
        border-radius:4px;
        -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
    }
    .tree li {
        list-style-type:none;
        margin:0;
        padding:10px 5px 0 5px;
        position:relative
    }
    .tree li::before, .tree li::after {
        content:'';
        left:-20px;
        position:absolute;
        right:auto
    }
    .tree li::before {
        border-left:1px solid #999;
        bottom:50px;
        height:100%;
        top:0;
        width:1px
    }
    .tree li::after {
        border-top:1px solid #999;
        height:20px;
        top:25px;
        width:25px
    }
    .tree li span {
        -moz-border-radius:5px;
        -webkit-border-radius:5px;
        border:1px solid #999;
        border-radius:5px;
        display:inline-block;
        padding:3px 8px;
        text-decoration:none
    }
    .tree li.parent_li>span {
        cursor:pointer
    }
    .tree>ul>li::before, .tree>ul>li::after {
        border:0
    }
    .tree li:last-child::before {
        height:30px
    }
    .tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
        background:#eee;
        border:1px solid #94a0b4;
        color:#000
    }
</style>
</head>

<body>