<?php
//  私有变量
class Person{
    private $sex = '男';
    private $name = 'quanxin';
    private $age = 25;
    protected $money = 12;
    protected $ttt = 12121;

    //  私有成员的方法不能在class外部直接访问
    private function getName(){
        return $this->age;
    }
    //  被保护的成员方法不能在类的外部直接访问
    protected function getMoney(){
        return $this->money;
    }
    public function card(){
        echo '名字:'.$this->name. '年龄：'.$this->getName().'存款：'.$this->getMoney();
    }
    //  魔术方法的set只针对私有变量或受保护的变量
    public function __set($key,$value){
        if($key == 'name' && $value == 'kobe'){
            $this->name='tmac';
        }
    }
//    public function __get($key){
//        if($key == 'age'){
//            return 'girl not tell you';
//        }
//    }
    public function __isset($key){
        if($key == 'sex'){
            return $this->sex;
        }
    }

    public function __unset($key){
        if($key == 'ttt'){
            unset($this->ttt);
        }
    }
    public function getTTT(){
        return $this->ttt;
    }
}

$quanxin = new Person();
//echo $quanxin->name;
//$quanxin->name = 'kobe';
//$quanxin->card();
//echo $quanxin->age;

//  isset:是否可以访问
//var_dump(isset($quanxin->age));

//  __isset
//isset($quanxin->sex)
echo $quanxin->getTTT();
unset($quanxin->ttt);
echo $quanxin->getTTT();
?>






