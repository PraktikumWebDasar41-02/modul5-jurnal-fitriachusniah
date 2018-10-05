<?php
	session_start();
	include "koneksi.php";
?>
<html>
<body>
	<form method="post">
		NIM : <input type="text" name="nim"><br>
		Nama : <input type="text" name="nama"><br>
		Email : <input type="text" name="email"><br>
		<input type="submit" name="submit" value="SUBMIT">
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$nim = $_POST['nim'];
		$_SESSION['nim'] = $nim;
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$len = strlen($_POST['nim']);
	if($_POST['nim']==''){
		echo "NIM Tidak Boleh KOSONG! <br>";
    }else if($len>10){
		echo "NIM Tidak Boleh Lebih dari 10 Karakter! <br>";
	}else if($len<10){
		echo "NIM Tidak Boleh kurang dari 10 Karakter! <br>";
	}
	
	
	$len2 = strlen($_POST['nama']);
	if($_POST['nama']==''){
		echo "Nama Tidak Boleh KOSONG! <br>";
    }else if($len2>20){
		echo "Nama Tidak Boleh Lebih dari 20 Karakter! <br>";
	}

	if(!strpos($_POST['email'],'@') || !strpos($_POST['email'],'.com')  ){
		echo "Format Email salah!";
    }
	
	//echo $nim."-".$nama."-".$email;
	$query= "INSERT INTO t_jurnal1 (NIM,Nama,Email) VALUES ('$nim','$nama','$email')";
	
	$hasil = mysqli_query($koneksi,$query);
	if($hasil){
		header("Location:form_input2.php");
	}else{
		echo "data gagal diinput";
	}
	

}
?>
