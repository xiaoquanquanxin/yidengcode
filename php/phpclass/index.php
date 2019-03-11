<?php
//   类的声明
class Person{
    public $age;
    public function say($word){
        echo 'I say '.$word;
    }
    public function ww(){
        $this->say('hi');
        return $this->age;
    }
}
$james = new Person();
$james-> age = 34;
$age = $james->ww();

echo '<br>';
echo $age;
?>


<?php
//  构造方法，析构方法
class A{
    public function __construct($age){
        $this->age = $age;
    }
    public function data(){
        return $this->age;
    }
    public function __destruct(){
        echo '当没有实例的代码运行了，数据库关闭，它是针对某个实例的，不是全部实例';
    }
}
$a = new A(1234);
echo $a->data();
?>