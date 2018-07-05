<?php

//http://localhost/blog/index.php
//定义服务器默认URL
define("SERVER_URL","http://".$_SERVER['SERVER_NAME']."/blog/");

//定义前台静态资源常量
define("__HOME__","public/home/");
define("__HOME_CSS__", SERVER_URL.__HOME__."css/");
define("__HOME_IMAGES__", SERVER_URL.__HOME__."images/");
define("__HOME_JS__", SERVER_URL.__HOME__."js/");


//定义前台公共代码文件的地址常量
// application/home/views/commom/
define("__HOME_COMMON__","application/home/views/commom/");

//定义登陆功能静态常量
define("__LOGIN__","public/login/");
define("__LOGIN_CSS__",SERVER_URL.__LOGIN__."css/");
define("__LOGIN_IMAGES__",SERVER_URL.__LOGIN__."images/");
define("__LOGIN_JS__",SERVER_URL.__LOGIN__."js/");

//定义后台静态资源常量
define("__ADMIN__","public/admin/");
define("__ADMIN_CSS__", SERVER_URL.__ADMIN__."css/");
define("__ADMIN_JS__", SERVER_URL.__ADMIN__."js/");

//定义前后台共代码文件的地址常量
// application/admin/views/commom/
define("__ADMIN_COMMON__","application/admin/views/commom/");