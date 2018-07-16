<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28
 * Time: 15:48
 */

namespace core\mybase;


class Model
{
    private $dsn = "mysql:dbname=mymart;host=localhost:3306";
    private $username = "root";
    private $password = "888";
    private $option = array(\PDO::ATTR_PERSISTENT => true, \PDO::ATTR_ORACLE_NULLS => true,
        \PDO::ERRMODE_EXCEPTION => true);
    private $pdo;//PDO对象

    /** 读取配置文件，初始化Model类的属性：$dsn，$username,$password,$option*/
    public function __construct()
    {
        global $c;
        $this->dsn = isset($c['db']['dsn']) ? $c['db']['dsn'] : $this->dsn;
        $this->username = isset($c['db']['username']) ? $c['db']['username'] : $this->username;
        $this->password = isset($c['db']['password']) ? $c['db']['password'] : $this->password;
        $this->option = isset($c['db']['option']) ? $c['db']['option'] : $this->option;
    }

    //获取PDO对象的方法
    public function getPDO()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO($this->dsn, $this->username, $this->password, $this->option);
        }
        return $this->pdo;
    }

    //销毁PDO对象的方法
    public function destoryPDO()
    {
        if ($this->pdo != null) {
            $this->pdo = null;
        }
    }

    //增删改查的方法
    public function execute($sql, $args)
    {
        $result = 0;
        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            $result = $pdostmt->rowCount();
        } catch (\PDOException $e) {
            echo "持久化异常" . $e->getMessage();
        }
        return $result;
    }

    //查询的方法
    public function query($sql, $args)
    {
        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            return $pdostmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "持久化异常" . $e->getMessage();
            return null;
        }
    }


}