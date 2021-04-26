 <?php 
 try
{
	$pdo= new PDO('mysql:host=localhost;dbname=work_db;charset=utf8','mysql','mysql');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$FID_Projects1=$_GET['name3'];
	$date1=$_GET['name4'];
	$sql = "SELECT description From work as w Join projects as p On(w.FID_Projects=p.ID_Projects)WHERE p.name = 'Разработка приложения' and w.date = '2021-01-01'";
	$result=$pdo->prepare($sql);
	
		echo '<?xml version="1.0" encoding="utf8" ?>';
		echo "<root>";
	
	foreach($pdo->query($sql) as $row){
		echo "<row>".$row['description']."</row>";
	}
	
		echo "</root>";
	
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

?>