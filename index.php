<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>per曆</title>
    <style>
        body {
            text-align:center;
            font-family:"Microsoft JhengHei",fantasy;
            /* font-family:JhengHei; */
            font-style:oblique;
            background-image:url(./autumn-11.jpg) ;
            background-size:cover;
            background-attachment:fixed;
        }
        table{
            position:fixed;
            right:70px;
            bottom:80px;
            /* margin-left:720px;
            margin-top:340px; */
            width:740px;
            height:320px;
            table-layout:fixed;
            font-size:26px;
            font-weight:bold;
            text-align:center;

            background:rgba(0,0,0,.4) ;
            color:#FFE999;
            
            border-radius:30px;
            border-top:3px solid #E0E0F9;
            border-left:2px solid #E0E0F9;
            border-right:7px solid  #6850a0;
            border-bottom:10px solid #8060CB;
            
            box-shadow:3px 3px 8px 5px #C0C0D0 inset;
            /*水平位移 垂直位移 模糊大小 陰影尺寸 顏色 inset(內陰影) */
            /* display:inline-block; */
        }
        table th{
            
            background-color:rgba(0,0,0,.2);
            color:#88aacc;
        }
        div {
            position:fixed;
            right:50px;top:20px;
            text-align:center;
            font-family:sans-serif;
            font-size:48px;
            background-color:rgba(200,200,200,0);
            color:#80E0f0;
            /* color:#80D0F0; */
        }

        a {font-size:18px;color:#aaaa50;}

        button {
            border-radius:15px;
            background-color:#eeeeaa;
            /* width:80px;height:35px; */
        }
        tr > td:first-child,td:last-child {color:#D00000;};
        /* tr > td:last-child{color:#00B000;}; */

    </style>
</head>
<body>
<?php
    if(!empty($_GET['m']) && !empty($_GET['y'])){
        $year=(int)$_GET['y'];
        $month=(int)$_GET['m'];
        
    }else{
        $year=date("Y");
        $month=date("m");
    }
    
    $start=date("Y-m-d",strtotime($year."-".$month."-"."1"));
    $weekStart=date("w",strtotime($start));
    $end=date("t",strtotime($start));
    $weeks=ceil(($end+$weekStart-7)/7)+1 ;
    $festival=[1=>[1=>"元旦"],3=>[29=>"青年節"],4=>[5=>"清明節"],5=>[1=>"勞動節"],8=>[8=>"父親節"],9=>[3=>"軍人節",28=>"教師節"],10=>[10=>"國慶日"]];
?>
    <div ><?=$year."年".$month."月"?>
        <br>
        <button style="font-family:Microsoft JhengHei;color:red;">
        
<?php
    if(($month) > 1){
?>
       
       <a href="?m=<?=($month-1);?>&y=<?=($year);?>">上一月</a>
<?php
    }else{
        echo "<a href='?m=12>&y=".($year-1)."'>上一月</a>";
        echo "</button>";
    }
?>
        <button style="font-family:'Microsoft JhengHei';color:#333300">
<?php
    if($month < 12){
?>
        <a href="?m=<?=($month+1);?>&y=<?=($year);?>">下一月</a>
<?php
    }else{
?>
        <a href="?m=<?=1;?>&y=<?=($year+1);?>;">下一月</a>    
<?php
    }
?>
        </button>
    </div>
    <table > 
        <tr>
            <th style="color:#A00000">Sun</th>
            <th>Mon</th>
            <th>Tues</th>
            <th>Wed</th>
            <th>Thur</th>
            <th>Fri</th>
            <th style="color:#00BB00">Sat</th>
        </tr>
        
<?php
    for ($i=0; $i < $weeks; $i++) { 
        echo "<tr>";
        for ($j=0; $j < 7; $j++) { 
            $fill=($i*7+$j+1)-$weekStart ;
            
            if ($fill>0 && $fill<=$end) {
                if (!empty($festival[$month][$fill])) {
                    $str=$festival[$month][$fill];
                }else{
                    $str="";
                }
                echo "<td>".$fill."<p style='font-size:10px;color:#cc0000'>".$str."</p></td>" ;
                
            }else{
                echo "<td></td>";
            }
        }echo "</tr>";
    }
?>
        
    </table>

</body>
</html>
