<?php
if($public_id_jabatan == 1)
{

?>
<!-- Content Header (Page header) -->
<section class="content-header" style="margin-top: -25px">
  <h3>Dashboard Admin Sistem</h3>
</section>

<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data User</span>
          <span class="info-box-number" id="box1"></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Menu Samping</span>
          <span class="info-box-number" id="box2"></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-th-large"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Sub Menu Samping</span>
          <span class="info-box-number" id="box3"></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Jabatan</span>
          <span class="info-box-number" id="box4"></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
   <!-- <div class="col-xs-12"> -->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-left:15px;padding-right:5px;padding-top: 10px;">
      <div class="box" style="border-top:#1E58C1 4px solid">
        <div class="box-header">
          <i class="fa fa-user"></i><h3 class="box-title" style="margin-top:3px">Data User</h3>

          <button class="btn btn-sm btn-primary pull-right" style="margin-top: 0px;" onclick="ShowAdd()" <?php if($public_id_jabatan != 1){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah User </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="min-height: 700px;">
          <table id="example1" class="table table-bordered table-striped" style="font-size: 11px;">
            <thead>
            <tr>
							<td width="5%" align="center">No</td>
							<td width="20%" align="center">Nama</td>
							<td width="20%" align="center">Username</td>
							<!--<td width="10%" align="center">Password</td>-->
							<td width="20%" align="center">Hak Akses</td>
							<td width="15%" align="center">Status Akun</td>
							<td width="20%" align="center">Act</td>
						</tr>
            </thead>
            <tbody>
            <?php $no=0;
            	$query = "select * from tb_user 
							inner join tb_jabatan on tb_user.id_jabatan = tb_jabatan.id_jabatan";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)) 
							{
								if($row['status_akun'] == 1){$st_akun = 'Aktif'; $bg = 'bg-green';}
								else{$st_akun = 'Tidak Aktif'; $bg = 'bg-red';}

								//$pass = $row['password'];
								//$pass = encrypt_decrypt('decrypt',"$pass");

								$no++;
								?><tr><?php
								?><td align="center"><?=$no?></td><?php
								?><td><?=strtoupper($row['nama']) ?></td><?php
								?><td><?=$row['username'] ?></td><?php
								?><!--<td><?=$pass?></td>--><?php
								?><td><?=$row['nama_jabatan']?></td><?php
								?><td align="center"><span style="font-size: 11px;" class="label <?=$bg?>"><?=$st_akun?></span></td><?php
								?><td align="center"> 
									
									<button class="btn btn-xs btn-warning" title="Edit Data" onclick="Edituser('<?=$row['id_user']?>','<?=$row['username']?>','<?=$row['nama']?>','<?=$row['id_jabatan']?>')" <?php if($public_id_jabatan != 1){ print "disabled";}else if($row['id_jabatan'] == 1){ print "disabled";}?>><i class="fa fa-pencil"></i></button>
									
									<button class="btn btn-xs btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_user']?>')" <?php if($public_id_jabatan != 1){ print "disabled";}else if($row['id_jabatan'] == 1){ print "disabled";}?>><i class="fa fa-trash"></i></button>
									
									<button class="btn btn-xs <?php if($row['status_akun'] == 1){ print "btn-danger";}else{print "hidden";}?>" title="Nonaktifkan akun" onclick="Status('<?=$row['id_user']?>','0')" <?php if($public_id_jabatan != 1){ print "disabled";}else if($row['id_jabatan'] == 1){ print "disabled";}?>><i class="fa fa-power-off"></i></button>

									<button class="btn btn-xs <?php if($row['status_akun'] == 1){ print "hidden";}else{print "btn-success";}?>" title="Aktifkan akun" onclick="Status('<?=$row['id_user']?>','1')" <?php if($public_id_jabatan != 1){ print "disabled";}?>><i class="fa fa-power-off"></i></button>

								</td></tr><?php
							} $box1 = $no;
						?>
           </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-left:5px;padding-right:15px;padding-top: 10px;"> 
      <div class="box" style="border-top:#1E58C1 4px solid">
        <div class="box-header">
          <i class="fa fa-list-ul"></i><h3 class="box-title" style="margin-top:3px"> Menu Samping</h3>

          <button class="btn btn-sm btn-primary pull-right" style="margin-top: 0px;" onclick="ShowAddmenu()" <?php if($public_id_jabatan != 1){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah Menu </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="min-height: 700px;">
          <table id="example1" class="table table-bordered table-striped" style="font-size: 10px;">
            <thead>
            <tr>
							<td width="5%" align="center">No</td>
							<td width="20%" align="center" >Nama Menu</td>
							<td width="10%" align="center" >Icon</td>
							<td width="10%" align="center" >Sub Menu</td>
							<td width="10%" align="center" >Link</td>
							<td width="10%" align="center" >Urutan</td>
							<td width="20%" align="center" >Jabatan</td>
							<td width="15%" align="center" >Aksi</td>
						</tr>
            </thead>
              <tbody>
								<?php $no2=0;
									$query = "SELECT * from tb_left_menu 
									inner join tb_jabatan on tb_left_menu.id_jabatan_akses = tb_jabatan.id_jabatan
									where id_menu order by id_jabatan_akses ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
									{ 
										$no2++;
										?>
										<tr>
											<td align="center"><?=$no2?></td>
											<td align="left"><?=$row['nama_menu']?></td>
											<td align="left"><?=$row['icon']?></td>
											<td align="center"><?=$row['has_submenu']?></td>
											<td align="left"><?=$row['link']?></td>
											<td align="center"><?=$row['urutan']?></td>
											<td align="left"><?=$row['nama_jabatan']?></td>
											<td align="center">

											<button class="btn btn-xs btn-warning" title="Hapus Data" onclick="updatemenu('<?=$row['id_menu']?>','<?=$row['nama_menu']?>','<?=$row['icon']?>','<?=$row['has_submenu']?>','<?=$row['link']?>','<?=$row['urutan']?>','<?=$row['id_jabatan_akses']?>')"><i class="fa fa-pencil" <?php if($public_id_jabatan != 1){ print "disabled";}?>></i></button>

											<button class="btn btn-xs btn-danger" title="Hapus Data" onclick="Hapusmenu('<?=$row['id_menu']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 1){ print "disabled";}?>></i></button> 

											</td>
										</tr>
										<?php
									} $box2 = $no2;

								?>
						</tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-left:15px;padding-right:5px;margin-top: -10px;">
      <div class="box" style="border-top:#1E58C1 4px solid">
        <div class="box-header">
          <i class="fa fa-database"></i><h3 class="box-title" style="margin-top:3px">Data Jabatan</h3>

          <button class="btn btn-sm btn-primary pull-right" style="margin-top: 0px;" onclick="ShowAddjabatan()"><i class="fa fa-plus-circle" <?php if($public_id_jabatan != 1){ print "disabled";}?>></i> Tambah Jabatan </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="min-height: 700px;">
          <table id="example1" class="table table-bordered table-striped" style="font-size: 11px;">
            <thead>
           <tr>
							<td width="5%" align="center">No</td>
							<td width="20%" align="center">ID Jabatan</td>
							<td width="20%" align="center">Nama Jabatan</td>
							<td width="20%" align="center">Status Sistem</td>
							<td width="20%" align="center">Act</td>
						</tr>
            </thead>
              <tbody>
								<?php $no3=0;
									$query = "SELECT * from tb_jabatan where id_jabatan order by id_jabatan ASC";
									$result = mysqli_query($conn, $query);

									while($row = mysqli_fetch_assoc($result)) 
									{
										if($row['status_sistem'] == 0){$st = '0'; $title = 'Aktifkan Jabatan'; $btn = "btn-success"; $info = "Tidak Aktif"; $bg1 = "bg-red";}
										else{$st = '1'; $title = 'Nonaktifkan Jabatan'; $btn = "btn-danger"; $info = "Aktif"; $bg1 = "bg-green";}

										$no3++;
										?><tr><?php
										?><td align="center"><?=$no3?></td><?php
										?><td align="center"><?=strtoupper($row['id_jabatan']) ?></td><?php
										?><td align="left"><?=strtoupper($row['nama_jabatan']) ?></td><?php
										?><td align="center"><span style="font-size: 11px;" class="label <?=$bg1?>"><?=$info?></span></td><?php
										
										?><td align="center"> 
											<button class="btn btn-xs btn-warning" title="Edit Data" onclick="Editjabatan('<?=$row['id_jabatan']?>','<?=$row['nama_jabatan']?>')" <?php if($public_id_jabatan != 1){ print "disabled";}else if($row['id_jabatan'] == 1){ print "disabled";}?>><i class="fa fa-pencil"></i></button>

											<button class="btn btn-xs btn-danger" title="Hapus Data" onclick="Hapusjabatan('<?=$row['id_jabatan']?>')" <?php if($public_id_jabatan != 1){ print "disabled";}else if($row['id_jabatan'] == 1){ print "disabled";}?>><i class="fa fa-trash"></i></button>

											<button class="btn btn-xs <?=$btn?>" title="<?=$title?>" onclick="Stjabatan('<?=$row['id_jabatan']?>','<?=$st?>')" <?php if($public_id_jabatan != 1){ print "disabled";}else if($row['id_jabatan'] == 1){ print "disabled";}?>><i class="fa fa-power-off"></i></button>

										</td></tr><?php
									} $box3 = $no3;
								?>
							</tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-left:5px;padding-right:15px;margin-top: -10px;"> 
      <div class="box" style="border-top:#1E58C1 4px solid">
        <div class="box-header">
          <i class="fa fa-list-ul"></i><h3 class="box-title" style="margin-top:3px"> Sub Menu Samping</h3>

          <button class="btn btn-sm btn-primary pull-right" style="margin-top: 0px;" onclick="ShowAddmenu2()" <?php if($public_id_jabatan != 1){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah Sub Menu </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="min-height: 700px;">
          <table id="example4" class="table table-bordered table-striped" style="font-size: 11px;">
            <thead>
            <tr>
							<td width="5%" align="center">No</td>
							<td width="20%" align="center" >Nama Menu</td>
							<td width="20%" align="center" >Nama Sub Menu</td>
							<td width="10%" align="center" >Icon</td>
							<td width="10%" align="center" >Link</td>
							<td width="10%" align="center" >Urutan</td>
							<td width="15%" align="center" >Aksi</td>
						</tr>
            </thead>
              <tbody>
								<?php $no4=0;
									$query = "SELECT tb_left_menu.nama_menu as menu_utama, tb_sub_left_menu.* from tb_sub_left_menu 
									inner join tb_left_menu on tb_sub_left_menu.id_menu = tb_left_menu.id_menu
									where id_sub_menu order by id_menu ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
									{ 
										$no4++;
										?>
										<tr>
											<td align="center"><?=$no4?></td>
											<td align="left"><?=$row['menu_utama']?></td>
											<td align="left"><?=$row['nama_menu']?></td>
											<td align="left"><?=$row['icon']?></td>
											<td align="left"><?=$row['link']?></td>
											<td align="center"><?=$row['urutan']?></td>
											<td align="center">

											<button class="btn btn-xs btn-danger" title="Hapus Data" onclick="Hapusmenu2('<?=$row['id_sub_menu']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 1){ print "disabled";}?>></i></button> 

											</td>
										
										</tr>
										<?php
									} $box4 = $no4;
								?>
						</tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->


<div id="Modal" class="modal fade" aria-hidden="true">
<div class="modal-dialog modal-md" >
	
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="judul"></h4>
	  </div>
	  <div class="modal-body row">
	  
		  <input type="hidden" id="id_user" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Nama Pengguna</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="nama" id="nama" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hak Akses</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;">
				<select class="select2 form-control" name="hak_akses" id="hak_akses" style="width: 100%">
					<option value="">Pilih Jabatan</option>
					<?php 
						$query_as = "select * from tb_jabatan where id_jabatan <> 1 order by id_jabatan ASC";
						$result_as = mysqli_query($conn, $query_as);
						while($row_as = mysqli_fetch_assoc($result_as)) 
						{ 
							?><option value="<?=$row_as['id_jabatan']?>"><?=$row_as['nama_jabatan']?></option><?php
						} 
					?>
				</select>
			</div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Username</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="username" id="username" class="form-control"/></div>

		  <div class="form-group" id="f_pass">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Password</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="password" id="password" class="form-control"/></div>
		  </div>

		 </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_save"><i class="fa fa-save"></i> Simpan</button>
	  </div>
	</div>

</div>
</div>

<div id="Modalmenu" class="modal fade" aria-hidden="true">
<div class="modal-dialog modal-md" >
	
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="judulmenu"></h4>
	  </div>
	  <div class="modal-body row">
	  
		  <input type="hidden" id="id_menu" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Nama Menu</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="nama_menu" id="nama_menu" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Icon</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="icon" id="icon" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Sub Menu</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;">
				<select class="select2 form-control" name="submenu" id="submenu" style="width: 100%">
				<option value="" read only>Pilih Salah Satu</option>
					<option value="y">Ya</option>
					<option value="n">Tidak</option>
				</select>
			</div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Link</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="link" id="link" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Urutan</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="number" name="urutan" id="urutan" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hak Akses</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;">
				<select class="select2 form-control" name="id_jabatan_akses" id="id_jabatan_akses" style="width: 100%">
				<option value="">Pilih Jabatan</option>
					<?php $query_as = "select * from tb_jabatan";
					$result_as = mysqli_query($conn, $query_as);
					while($row_as = mysqli_fetch_assoc($result_as)) 
					{ 
						?><option value="<?=$row_as['id_jabatan']?>"><?=$row_as['nama_jabatan']?></option><?php
					} ?>
				</select>
			</div>
		  
		 </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_save_menu"><i class="fa fa-save"></i> Simpan</button>
	  </div>
	</div>
</div>
</div>

<div id="Modaljabatan" class="modal fade" aria-hidden="true">
<div class="modal-dialog modal-md" >		
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="juduljabatan">Tambah Jabatan</h4>
	  </div>
	  <div class="modal-body row">
		  <input type="hidden" id="id_jabatan" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Nama Jabatan</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="nm_jabatan" id="nm_jabatan" class="form-control"/></div>
	  </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_save_jabatan"><i class="fa fa-save"></i> Simpan</button>
	  </div>
	</div>		
</div>
</div>

<div id="Modalsubmenu" class="modal fade" aria-hidden="true">
<div class="modal-dialog modal-md" >
	
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="judulmenu"> Tambah Sub Menu</h4>
	  </div>
	  <div class="modal-body row">

	  	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Nama Sub Menu</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="sub_menu" id="sub_menu" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Menu</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;">
				<select class="select2 form-control" name="id_menu2" id="id_menu2" style="width: 100%;">
				<option value="">Pilih Menu</option>
					<?php $query_as = "select * from tb_left_menu where has_submenu = 'y'";
					$result_as = mysqli_query($conn, $query_as);
					while($row_as = mysqli_fetch_assoc($result_as)) 
					{ 
						?><option value="<?=$row_as['id_menu']?>"><?=$row_as['nama_menu']?></option><?php
					} ?>
				</select>
			</div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Icon</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="icon2" id="icon2" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Link</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="link2" id="link2" class="form-control"/></div>

		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Urutan</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="number" name="urutan2" id="urutan2" class="form-control"/></div>
		  
		 </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_save_menu2"><i class="fa fa-save"></i> Simpan</button>
	  </div>
	</div>
</div>
</div>

<script type="text/javascript" class="init">
var token = document.querySelector("meta[property='rtoken']").getAttribute("content");

$('#btn_save').on('click', function (e) {
	var id_user = $('#id_user').val(); 
	var nama = $('#nama').val(); 
	var username = $('#username').val();
	var password = $('#password').val();
	var hak_akses = $('#hak_akses').val();

	if(id_user == '')
	{
		if(nama == "" || username == "" || password == "" || hak_akses == "")
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_user:'', nama:nama, username:username, password:password, hak_akses:hak_akses, kode:'user'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data user berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({icon: 'error',title: 'Oops...',text: data,})
				}
			});
		}
	}
	else
	{
		$.post("func/func_administrator.php",{token:token, id_user:id_user, nama:nama, username:username, password:'', hak_akses:hak_akses, kode:'user'},
		function(data)
		{
			if(data == 1)
			{				
				swal({text: "Data user berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',icon: data,})
			}
		});
	}
	
});

function Hapus(id){
	swal({
  title: "",
  text: "Yakin ingin menghapus data user ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_user:id, kode:'del_user'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data user berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({icon: 'error',title: 'Oops...',text: data,})
				}	
			});
	  }
	});
}

function Stjabatan(id, st){
	if(st == 1)
	{
		swal({
	  title: "",
	  text: "Yakin ingin menonaktifkan jabatan ini? Hal ini menyebabkan akun user dengan jabatan ini tidak dapat mengakses sistem!",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Nonaktifkan"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id:id, st:'0', kode:'st_jabatan'},
				function(data)
				{
					if(data == 1)
					{				
						swal({text: "Jabatan berhasil dinonaktifkan!",icon: 'success',}).then((result) => {window.location.reload();})
					}
					else
					{
						swal({icon: 'error',title: 'Oops...',text: data,})
					}	
				});
		  }
		});
	}
	else
	{
		swal({
	  title: "",
	  text: "Yakin aktifkan jabatan ini? Hal ini menyebabkan akun user dengan jabatan ini dapat mengakses kembali sistem!",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Aktifkan"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id:id, st:'1', kode:'st_jabatan'},
				function(data)
				{
					if(data == 1)
					{				
						swal({text: "Jabatan berhasil diaktifkan!",icon: 'success',}).then((result) => {window.location.reload();})
					}
					else
					{
						swal({icon: 'error', title: 'Oops...', text: data,})
					}	
				});
		  }
		});
	}
}

function Status(id, st){	
	if(st == 0)
	{
		swal({
	  title: "",
	  text: "Yakin ingin menonaktifkan akun ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Nonaktifkan"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id_user:id, st:st, kode:'st_akun'},
				function(data)
				{
					if(data == 1)
					{				
						swal({text: "Data user berhasil dinonaktifkan!",icon: 'success',}).then((result) => {window.location.reload();})
					}
					else
					{
						swal({icon: 'error', title: 'Oops...', text: data,})
					}	
				});
		  }
		});
	}
	else
	{
		swal({
	  title: "",
	  text: "Yakin ingin mengaktifkan akun ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Aktifkan"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   $.post("func/func_administrator.php",{token:token, id_user:id, st:st, kode:'st_akun'},
				function(data)
				{
					if(data == 1)
					{				
						swal({text: "Data user berhasil diaktifkan!",icon: 'success',}).then((result) => {window.location.reload();})
					}
					else
					{
						swal({icon: 'error',title: 'Oops...', text: data,})
					}	
				});
		  }
		});
	}
}

$('#btn_save_jabatan').on('click', function (e) {
	var id_jabatan = $('#id_jabatan').val(); 
	var nm_jabatan = $('#nm_jabatan').val(); 
	
	if(id_jabatan == "")
	{
		if(nm_jabatan == "")
		{
			swal({icon: 'error',title: 'Oops...',text: 'Form tidak boleh kosong!',})
		}
		else
		{
			$.post("func/func_administrator.php",{token:token, id_jabatan:'', nm_jabatan:nm_jabatan, kode:'jabatan'},
			function(data){
				if(data == 1)
				{				
					swal({text: "Data jabatan berhasil disimpan!",icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({icon: 'error',title: 'Oops...',text: data,})
				}	
			});
		}
	}
	else
	{
		$.post("func/func_administrator.php",{token:token, id_jabatan:id_jabatan, nm_jabatan:nm_jabatan, kode:'jabatan'},
			function(data){
				if(data == 1)
				{				
					swal({text: "Data jabatan berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({icon: 'error',title: 'Oops...',text: data,})
				}	
			});
	}
});

function Hapusjabatan(id){
	swal({
	  title: "",
	  text: "Yakin ingin menghapus jabatan ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Hapus"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id_jabatan:id, kode:'del_jabatan'},
				function(data){
					if(data == 1)
					{				
						swal({text: "Data jabatan berhasil dihapus!",type: 'success',showCancelButton: false,confirmButtonText: 'OK',}).then((result) => {if (result.value) {window.location.reload();}})
					}
					else
					{
						swal({type: 'error',title: 'Oops...',text: data,})
					}	
			});
		 }
	});
}

$('#btn_save_menu').on('click', function (e) {
	var id_menu = $('#id_menu').val();
	var nama_menu = $('#nama_menu').val(); 
	var icon = $('#icon').val();
	var submenu = $('#submenu').val();
	var link = $('#link').val();
	var urutan = $('#urutan').val();
	var id_jabatan_akses = $('#id_jabatan_akses').val();

	if(id_menu == "")
	{
		$.post("func/func_administrator.php",{token:token, id_menu:'', nama_menu:nama_menu, icon:icon, submenu:submenu, link:link, urutan:urutan, id_jabatan_akses:id_jabatan_akses, kode:'menu_samping'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Menu samping berhasil ditambahkan!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({icon: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	else
	{
		$.post("func/func_administrator.php",{token:token, id_menu:id_menu, nama_menu:nama_menu, icon:icon, submenu:submenu, link:link, urutan:urutan, id_jabatan_akses:id_jabatan_akses, kode:'menu_samping'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Menu samping berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
});

$('#btn_save_menu2').on('click', function (e) {
	var sub_menu = $('#sub_menu').val(); 
	var id_menu = $('#id_menu2').val(); 
	var icon = $('#icon2').val();
	var link = $('#link2').val();
	var urutan = $('#urutan2').val();

		$.post("func/func_administrator.php",{token:token, sub_menu:sub_menu, id_menu:id_menu, icon:icon, link:link, urutan:urutan, kode:'sub_menu'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Sub menu samping berhasil ditambahkan!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({icon: 'error',title: 'Oops...',text: data,})
			}	
		});
});

function Hapusmenu(id){
	swal({
	  title: "",
	  text: "Yakin ingin menghapus menu samping ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Hapus"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id_menu:id, kode:'del_menu'},
				function(data){
				if(data == 1)
				{				
					swal({text: "Menu samping berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({type: 'error',title: 'Oops...',text: data,})
				}	
			});
		 }
	});
}

function Hapusmenu2(id){
		swal({
	  title: "",
	  text: "Yakin ingin menghapus sub menu samping ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Hapus"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   $.post("func/func_administrator.php",{token:token, id_sub_menu:id, kode:'del_sub_menu'},
				function(data){
				if(data == 1)
				{				
					swal({text: "Sub menu samping berhasil dihapus!",type: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({type: 'error',title: 'Oops...',text: data,})
				}	
			});
		}
	});
}

function ShowAdd(){
	$("#judul").html("Tambah Data User");
	$("#Modal").modal('show');
}

function Edituser(id, username, nama, id_jabatan){
	$('#id_user').val(id);
	$('#nama').val(nama);
	$('#username').val(username);
	//$('#password1').val(password1);
	$('#hak_akses').val(id_jabatan).change();
	$("#judul").html("Edit Data User");
	document.getElementById('f_pass').style.visibility = 'hidden';
	
	$("#Modal").modal('show');
}

function ShowAddjabatan(){
	$("#juduljabatan").html("Tambah Data Jabatan");
	$("#Modaljabatan").modal('show');
}

function Editjabatan(id_jabatan, nm_jabatan){
	$('#id_jabatan').val(id_jabatan);
	$('#nm_jabatan').val(nm_jabatan);
	$("#juduljabatan").html("Edit Data Jabatan");

	$("#Modaljabatan").modal('show');
}

function ShowAddmenu(){
	$("#judulmenu").html("Tambah Data Menu");
	$("#Modalmenu").modal('show');
}

function updatemenu(id, nm_menu, icon, has_submenu, link, urutan, id_jabatan_akses){
	$('#id_menu').val(id);
	$('#nama_menu').val(nm_menu);
	$('#icon').val(icon);
	$('#submenu').val(has_submenu).change();
	$('#link').val(link);
	$('#urutan').val(urutan);
	$('#id_jabatan_akses').val(id_jabatan_akses).change();
	$("#judulmenu").html("Edit Menu Samping");

	$("#Modalmenu").modal('show');
}

function ShowAddmenu2(){
	$("#Modalsubmenu").modal('show');
}

$('#box1').text('<?=$box1?>');
$('#box2').text('<?=$box2?>');
$('#box3').text('<?=$box4?>');
$('#box4').text('<?=$box3?>');

</script>

<?php
}
else
{
?>
	<!-- Main content -->
	<section class="content">
	    <div class="error-content">
	      <h3><i class="fa fa-warning text-yellow"></i> Oops! Access denied.</h3>

	      <p>
	       	 Anda tidak diizinkan untuk mengakses halaman ini. Kembali ke halaman sebelumnya.
	      </p>

	    </div>
	    <!-- /.error-content -->
	</section>
	<!-- /.content -->
<?php
}
?>