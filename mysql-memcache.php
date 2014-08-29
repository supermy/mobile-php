<?php
  #数据库连接信息
   $host="127.0.0.1";
    $user="root";
    $passwd="my67163";
    $db="test";
   
    $query="select UID,username,passwd,gender from pw_members order by uid desc limit 10;";
 
  #我这里选用了MD5方式加密SQL做为key ，也可用其他加密方式，如Base64等
    $m_key=md5($query);
   
    $mem=new Memcache();
    $mem->connect("127.0.0.1",11211);
    
    if(!$result=$mem->get($m_key)){
    echo "这是从数据库读出来的结果!";
    $connection=mysql_connect($host,$user,$passwd) or die ("Unable to conect!" );
    mysql_select_db($db);
    $result=mysql_query($query) or die("Error query!".mysql_error());                                                         
    while($row=mysql_fetch_row($result)){
        $memdata[]=$row;
    }
    $mem->add($m_key,$memdata); 
    mysql_free_result($result);
    mysql_close($connection);   
    }
    else{
    echo "这是从Memcached Server读出来的结果!\n";
    }
   
    $result=$mem->get($m_key);
    #显示获取的数据
    echo "<table cellpadding=10 border=2>";
    echo "<tr>";
    echo "<th>Uid</th>";
    echo "<th>Username</th>";
    echo "<th>PassWord</th>";
    echo "<th>Gender</th>";
    echo "</tr>";
    
    for($i=0;$i<2;$i++){
        echo "<tr>";
        for($j=0;$j<4;$j++){
        	echo "<td>".$result[$i][$j]."</td>";
        }
        echo "</tr>";
    }     
?>