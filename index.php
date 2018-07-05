<?php
//入口文件
//2.注册自动加载方法
require "configs/config.php";
require "configs/constants.php";
require "core/MyLoad.class.php";

\core\MyLoad::registerAutoLoad();
//3.启动核心运行类
\core\Application::run();