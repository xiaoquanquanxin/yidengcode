<?php
//  定义抽象类
//  抽象方法的类必须是抽象类,但抽象类不一定必须有抽象方法
//  抽象类可以存在普通方法
//  抽象类不能被实例化,必须有一个子类去继承,并且子类需要把抽象类的抽象方法都实现
abstract class Person {
    public function eat(){
        echo 'eat';
    }
    //  抽象方法没有方法体
    public abstract function _eat();
}
class Man extends Person{
    public function _eat(){
        echo 'abstract eat';
    }
}
$man = new Man();
$man->eat();
echo '<br>';
$man->_eat();
?>