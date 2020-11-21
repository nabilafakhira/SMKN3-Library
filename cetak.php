<script type="text/javascript">
	window.print();
</script>
<?php
				if(!empty($_SESSION['username'])){
					$query = mysqli_query($koneksi,"SELECT * FROM tbuser WHERE password ='$_SESSION[username]'");
					if(mysqli_num_rows($query) == 1){
					$data = mysqli_fetch_array($query);
					if($data['level'] != "guru"){
					 include 'cetak_siswa.php';
					 } else {
					  include 'cetak_guru.php';
					 }
		}
		}
				?>