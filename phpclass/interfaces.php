<?php
//  接口,用于定义动作
//
interface Person{
    const NAME= 'CHANGLIANG1';
    public function getName();
    public function eat();
}
interface Study{
    public function study();
}
class Students implements Person,Study{
    const data = '123';
    public function eat(){
        echo 'eat';
    }
    public function getName(){
        echo self::NAME;
        echo $this::NAME;
    }
    public function study(){
        echo 'study';
    }
    public function getData(){
        echo $this::data;
    }
}
$student = new Students();
$student->eat();
echo '<br>';
echo $student->getName();
echo '<br>';
$student->study();
echo '<br>';
$student->getData();
?>