<?php
if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in')){
session_destroy();
(new MessagePage)->show("", "Моля, влезте в системата!", "danger", "login");
   exit();
}
if(!isset($_SESSION['SESS_FIRST_NAME'])){
(new MessagePage)->show("", "Нямата достъм до тази страница!", "danger", "login");
   exit();
}

$query="SELECT * FROM ".$_SESSION['SESS_USERNAME']."";
$result=mysql_query($query);
$num=mysql_numrows($result);

?>

<table class="table table-bordered table-hover table-condensed">
<tr class="active table-hover">
<td>
Изпратил
</td>
<td>
Съобщениe
</td>
</tr>
<?php
					$i=0;
					while ($i < $num) {
						$field1=mysql_result($result,$i,"toUser");
						$field2=mysql_result($result,$i,"messagesUser");
					?>
<tr class="success table-hover ">
<td>
<?php echo $field1; ?>
</td>
<td>
<?php echo $field2; ?>
</td>
</tr>
<?php
						$i++;}
					?>
</table>
<p><a href="mailUser" class="btn btn-info" >Назад</a></p>
<p><a href="logout" class="btn btn-info" >Излез</a></p>