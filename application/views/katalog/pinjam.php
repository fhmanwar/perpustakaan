<!-- banner -->
<div class="banner-bg-inner">
  <!-- banner-text -->
  <div class="banner-text-inner">
    <div class="container">
      <h2 class="title-inner">
        <?php echo $title?>
      </h2>

    </div>
  </div>
  <!-- //banner-text -->
</div>
<!-- //banner -->
<!-- breadcrumbs -->
<div class="crumbs text-center">
    <div class="container">
        <div class="row">
            <ul class="btn-group btn-breadcrumb bc-list">
                <li class="btn btn1">
                    <a href="<?php echo base_url()?>">
                        <i class="glyphicon glyphicon-home"></i>
                    </a>
                </li>
                <li class="btn btn2">
                    <a href="<?php echo base_url('katalog/list') ?>">Katalog Buku</a>
                </li>
                <!-- <li class="btn btn3 btn3a">
                    <a href="single_product.html">Single product</a>
                </li> -->
                <li class="btn btn4">
                    <a href="checkout.html">Checkout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--//breadcrumbs ends here-->

<!--checkout-->
<div class="innerf-pages section">
    <div class="container">
        <div class="privacy about">
            <h4 class="rad-txt">
                <span class="abtxt1">Data</span>
                <span class="abtext">Pinjaman</span>
            </h4>

            <div class="checkout-right">
                <h4>Buku yang anda pinjam :
                    <span><?php echo count($limit)?> Products</span>
                </h4>
                <table class="timetable_sub table-responsive">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Buku</th>
                            <th>Judul Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Harus Kembali</th>  
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($limit as $lmt ) {?>
                        <tr class="rem1">
                            <td class="invert"><?php echo $i ?></td>
                            <td class="invert-image">
                                <a href="<?php echo base_url('katalog/detail/'.$lmt->id_buku)?>">
                                    <img src="<?php echo base_url('assets/upload/buku/'.$lmt->cover_buku) ?>" alt=" " class="img-responsive">
                                </a>
                            </td>
                            <td class="invert"><?php echo $lmt->judul_buku?></td>

                            <td class="invert"><?php echo date('d-m-Y', strtotime($lmt->tanggal_pinjam)) ?></td>
                            <td class="invert"><?php echo date('d-m-Y', strtotime($lmt->tanggal_kembali)) ?></td>
                            <td class="invert">
                                <div class="rem">
                                    <!-- <div class="close1"> </div> -->
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $lmt->id_peminjaman ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <div class="modal fade" id="Delete<?php echo $lmt->id_peminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Delete Data User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                        <p class="alert alert-warning">Are you sure want to delete this data?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?php echo base_url('admin/peminjaman/delete/'.$lmt->id_peminjaman) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Yes. Delete this Data</a>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $i++;} ?>
                            <!-- <pre><?php print_r($limit)?></pre> -->
                    </tbody>
                </table>
            </div>
            

        </div>

    </div>
</div>
<!--//checkout-->
