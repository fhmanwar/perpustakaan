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
                <span class="abtext">Keranjang</span>
            </h4>
        </div>
    </div>

    <div class="container-cart">
      <?php
      // cetak error
      echo $this->session->flashdata('pesan');

      ?>

      <!-- product right -->
      <div class="left-ads-display col-md-9">

          <table class="timetable_sub table-responsive">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Buku</th>
                      <th>Judul Buku</th>
                      <th>Harga Satuan</th>
                      <th>Quantity</th>
                      <th>Total Harga</th>
                      <th>Remove</th>
                  </tr>
              </thead>
              <tbody>
                  <?php

                      $i=1;
                      $total = 0;
                      $shipping = 12000;
                      if (count($order)>0) {
                          foreach ($order as $item) {
                                $total += $item->subtotal;
                  ?>
                  <tr class="rem1">
                      <td class="invert"><?php echo $i ?></td>
                      <td class="invert-image" style="width:250px;height:150px">
                          <a href="<?php echo base_url('katalog/detail/'.$item->id_order)?>">
                              <img src="<?php echo base_url('assets/upload/buku/'.$item->cover_buku) ?>" alt=" " class="img-responsive" style="width:130px;height:150px">
                          </a>
                      </td>
                      <td class="invert"><?php echo $item->judul_buku ?></td>

                      <td class="invert">Rp. <?php echo number_format($item->harga, '0', ',', '.'); ?></td>

                      <?php echo form_open_multipart(base_url('katalog/updateCart/'.$item->id_order)); ?>
                      <td class="invert">
                        <div class="form-group">
                          <?php
                            echo form_hidden('id_buku', $item->id_buku);
                            echo form_hidden('harga', $item->harga);
                          ?>
                          <input type="number" name="qty" value="<?php echo $item->qty?>" class="form-control text-center" min="1" max="100"style="width:4em; margin:auto;">
                        </div>
                        </td>

                      <td class="invert">Rp <?php echo number_format($item->subtotal, '0', ',', '.'); ?></td>
                      <?php echo form_close(); ?>

                      <td class="invert">
                          <div class="rem">
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $item->id_order ?>">
                                  <i class="fa fa-trash-o"></i>
                              </button>
                              <div class="modal fade" id="Delete<?php echo $item->id_order ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                              <a href="<?php echo base_url('katalog/delCart/'.$item->id_order); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Yes. Delete this Data</a>
                                              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </td>
                  </tr>

                  <?php
                              $i++;
                          }
                      } else {
                          echo ' <tr>
                                  <td colspan="7" class="col-md-12 text-center">
                                      <h3>Keranjang Belanja Kosong.</h3>
                                  </td>
                                  </tr>';
                      }

                  ?>
              </tbody>
          </table>
      </div>

      <!-- product left -->
      <div class="col-md-3">
        <div class="alert alert-info text-center">
          <h4>Total Pembelian</h4>
        </div>
        <div class="row">
          <div class="col-md-8">SubTotal</div>
          <div class="col-md-4 ml-auto pull-right">Rp <div class="pull-right"><?php echo number_format($total, '0', ',', '.'); ?></div> </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-8">Ongkos Kirim</div>
          <div class="col-md-4 ml-auto pull-right">Rp <div class="pull-right"><?php echo number_format($shipping, '0', ',', '.'); ?></div></div>
        </div>
        <hr style="border-width: 1px 1px ;border-style: solid;">
        <div class="row">
          <div class="col-md-8">Total Pembayaran</div>
          <div class="col-md-4 ml-auto pull-right">Rp <div class="pull-right"><?php echo number_format($Gtotal=$total+$shipping, '0', ',', '.'); ?></div></div>
        </div>
        <hr style="border-width: 1px 1px ;border-style: solid;">
        <div class="row">
          <div class="col-md-8">Buat Pesanan</div>
          <div class="col-md-3 ml-auto pull-right">
            <form action="<?php echo base_url('katalog/invoice') ?>" method="post">
              <div class="pull-right">
                <button type="submit" class="btn btn-sm btn-success">
                  <i class="fa fa-send" aria-hidden="true"></i>
                </button>
              </div>
            </form>
          </div>
        </div>


      </div>
      <!-- //product left -->
      <div class="clearfix"></div>

    </div>
</div>
<!--//checkout-->
