<?php
    header('Content-type:text/html;charset=utf8');

    $dbms = 'mysql';
    $host = 'localhost';
    $dbname = 'phplesson';
    $user = 'root';
    $pass = '';

    //  构建连接串
    $dsn = "$dbms:host=$host;dbname=$dbname";

    //  php更新后的新操作
    try{
        //  创建PDO的连接类
        $dbh = new PDO($dsn,$user,$pass);
        echo '连接成功';
        //  读取表里面的数据
//        $select_sql = "SELECT * FROM `news`";
//        foreach($dbh->query($select_sql) as $row){
            //  打印
//            print_r($row);
//        }

//        插入数据
        $insert_sql = "INSERT INTO `news` (`newsimg`, `addtime`, `newsid`, `newstitle`, `newscontext`) VALUES ('啊啊啊', '2019-03-14 00:00:00', NULL, '我问问', '巴巴爸爸');";
        $res = $dbh->exec($insert_sql );
        echo '添加成功，受影响的行数'.$res;
    }catch(PDOError $e){
        die('Error:'.$e.getMessage().'<br>');
    }
?>