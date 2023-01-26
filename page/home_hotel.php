<?php

if($public_id_jabatan == 8)
{

?>
<!-- Content Header (Page header) -->
<section class="content-header" style="margin-top: -25px">
  <h3>Dashboard Hotel</h3>
</section>

<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TOTAL HOTEL TRANSACTION</span>
          <span class="info-box-number" id="box1"></span>
          <a href="index.php?h=hotel_transaction">More info</a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-purple"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">CLEAN LINEN</span>
          <a href="index.php?h=clean">More info</a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">LINEN AGING</span>
          <a href="index.php?h=linen_aging">More info</a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">DISCARD LINEN</span>
          <a href="index.php?h=discard">More info</a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">LINEN TO RECEIVE</span>
          <a href="index.php?h=linen_receive">More info</a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->


<script type="text/javascript" class="init">
var token = document.querySelector("meta[property='rtoken']").getAttribute("content");



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