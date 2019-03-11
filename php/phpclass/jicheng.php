<?php
//  父类
class Person{
    public $name;
    private $age;
    protected $money;
    function __construct($name,$age,$money){
        $this->name = $name;
        $this->age = $age;
        $this->money = $money;
    }
    public function cardInfo(){
        echo 'name '.$this->name;
        echo 'age '.$this->age;
        echo 'money '.$this->money;
    }
}
//$s = new Person('quan',25,100);
//echo $s->cardInfo();
class Yellow extends Person{
    function __construct($name,$age,$money){
        parent::__construct($name,$age,$money);
    }
    public function getMoney(){
        echo $this->money;
    }
     //  被重载了,但php实际执行重写
     public function cardInfo($pp){
        parent::cardInfo();
        echo $pp;
     }
//    public function getA(){
//        echo 'aaa';
//    }
//    public function getA($a){
//        parent::getA();
//        echo $a;
//    }
}
$s = new Yellow('quan',25,100);
$s->cardInfo('  ??  ');
//echo $s->name;
//echo $s->age;
//echo $s->getMoney();
?>