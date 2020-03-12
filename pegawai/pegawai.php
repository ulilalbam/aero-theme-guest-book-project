<?php 

include_once '../config/koneksi.php';
//session_start();
//if($_SESSION['username']=="admin"){
    //echo "silahkan login kembali";
    //header('location: ../index.php');
   //exit();
//}
include_once "../include/header.php";
 ?>

 <!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="../dashboard/dashboard.php"><img src="../assets/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">ABC</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="../assets/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4>User</h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li><a href="../dashboard/dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="../pengunjung/input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="../pengunjung/tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li class="active open"><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
            <li><a href="../bidang/bidang.php"><i class="zmdi zmdi-account"></i><span>Bidang</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Laporan</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Ekspor Data</a></li>
                    <li><a href="chat.html">Backup Database</a></li>                      
                </ul>
            </li>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Content -->

 <section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Pegawai</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
   
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Data</strong> Pegawai</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Update Data Pegawai</a></li>
                                        <li><a href="input_pegawai.php">Tambah Data Pegawai</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Nomor</th>
                                        <th>Pegawai</th>
                                        <th>NIP</th>
                                        <th>Bidang</th>                     
                                        <th>Jabatan</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    $select=$pdo->prepare("select * from data_anggota order by id asc");
                                    $select->execute();
                                    while($row=$select->fetch(PDO::FETCH_OBJ)){
                                        echo '
                                        <tr>
                                        <td>'.$row->id.'</td>
                                        <td>'.$row=$i++.'</td>
                                        <td>'.$row->namapgw.'</td>
                                        <td>'.$row->nip.'</td>
                                        <td>'.$row->kode_bidang.'</td>
                                        <td>'.$row->jabatan.'</td>
                                        <td><button type="submit" value="'.$row->id.'" class="btn bg-red waves-effect waves-light">Hapus</button></td>
                                    </tr>';
                                    }
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

 <?php 
include "../include/footer.php";
 ?>