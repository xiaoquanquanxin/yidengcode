<?php
class myException extends Exception{}
try{
    throw new Exception('Exception wrong');
    throw new myException('myException wrong');
}catch(myException $e){
    echo $e->getMessage();
}catch (Exception $e){
    echo $e->getMessage();
}
?>
