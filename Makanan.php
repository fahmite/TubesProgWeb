<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<?php
       	
	session_start();
    if(isset($_SESSION["loginAwal"])){
        $db = mysql_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysql_select_db('kebun_binatang', $db) or die(mysql_error($db));
    } else{
		
		echo "<script>window.location.href = '../prgwb/index.php';</script>";
	}
?> 


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kebun Binatang</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-sektor.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
 
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Dashboard.php">Kebun Binatang</a>
            </div>
     
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <li>
                        <a href="Sektor.php"><i class="fa fa-fw fa-male"></i> Sektor</a></li>
                    <li>
                    	<a href="Kandang.php"><i class="fa fa-fw fa-book"></i> Kandang</a></li>
                    <li>
                    	<a href="Habitat.php"><i class="fa fa-fw fa-book"></i> Habitat</a></li>
                    <li>
                    	<a href="Hewan.php"><i class="fa fa-fw fa-book"></i> Hewan</a></li>
                    <li class="active">
                    	<a href="Makanan.php"><i class="fa fa-fw fa-book"></i> Makanan</a></li>
                    <li>
                    	<a href="Stok Makanan.php"><i class="fa fa-fw fa-book"></i> Stok Makanan</a></li>
                    <li>
                        <a href="Data Pengunjung.php"><i class="fa fa-fw fa-book"></i> Data Pengunjung</a></li>
                    <li>
                        <a href="PC Form.php"><i class="fa fa-fw fa-book"></i> PC Form</a></li>
					<li>
                    	<a href="Fasilitas.php"><i class="fa fa-fw fa-book"></i>Fasilitas</a></li>
						<li>
                    	<a href="logout.php"><i class="fa fa-fw fa-book"></i>Log Out </a></li>
				</ul>
                <p>&nbsp;</p>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row"></div>
                <!-- /.row -->


             <div class="col-lg-12">
                        <h2>Makanan</h2> <a href="Makanan-add.php?action=add" type="button" class="btn btn-xs btn-info">Tambah Data Baru</a>
                                
                        <div class="table-responsive">
                            <table width="94%" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="20%">Kode Makanan</th>
                                        <th width="20%">Jenis Hewan</th>
                                        <th width="20%">Spesies Hewan</th>
                                        <th width="20%">Nama Makanan</th>
                                        <th width="20%">Jumlah Makanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php                  
                $query = "SELECT distinct stok_makanan.kd_makanan, jenis_hewan, spesies_hewan, nama_makanan, jumlah_makanan 
				FROM stok_makanan, makanan, hewan where stok_makanan.kd_makanan like 'dg003' and
				hewan.id_hewan in (select distinct makanan.id_hewan from makanan where makanan.kd_makanan like 'dg003')";
                    $result = mysql_query($query, $db) or die (mysql_error($db));
                  
                        while ($row = mysql_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['kd_makanan'].'</td>';
                            echo '<td>'. $row['jenis_hewan'].'</td>';
                            echo '<td>'. $row['spesies_hewan'].'</td>';
							echo '<td>'. $row['nama_makanan'].'</td>';
							echo '<td>'. $row['jumlah_makanan'].'</td>';
                        
                            echo '<td> <a  type="button" class="btn btn-xs btn-warning" href="Makanan-edit1.php?action=edit & id='.$row['kd_makanan'].'"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="Makanan-delete.php?type=people&delete & id=' . $row['kd_makanan'] . '">DELETE </a> </td>';
                            echo '</tr> ';
							
                }
				
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

