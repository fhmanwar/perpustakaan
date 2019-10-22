<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detail<?php echo $buku->id_buku ?>">
  <i class="fa fa-eye"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="detail<?php echo $buku->id_buku ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Data Buku : <?php echo $buku->judul_buku?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        <table class="table table-bordered table-striped">
          <tbody>
            <tr>
              <th width="30%">Judul Buku</th>
              <th>: <?php echo $buku->judul_buku ?></th>
            </tr>
            <tr>
              <td>Penulis</td>
              <th>: <?php echo $buku->penulis_buku ?></th>
            </tr>
            <tr>
              <td>Jenis Buku</td>
              <th>: <?php echo $buku->nama_jenis ?></th>
            </tr>
            <tr>
              <td>Bahasa Buku</td>
              <th>: <?php echo $buku->nama_bahasa ?></th>
            </tr>
            <tr>
              <td>Nomor Seri</td>
              <th>: <?php echo $buku->no_seri ?></th>
            </tr>
            <tr>
              <td>Kode Buku</td>
              <th>: <?php echo $buku->kode_buku ?></th>
            </tr>
            <tr>
              <td>Kolasi</td>
              <th>: <?php echo $buku->kolasi ?></th>
            </tr>
            <tr>
              <td>Penerbit</td>
              <th>: <?php echo $buku->penerbit ?></th>
            </tr>
            <tr>
              <td>Tahun Terbit</td>
              <th>: <?php echo $buku->tahun_terbit ?></th>
            </tr>
            <tr>
              <td>Subjek Buku</td>
              <th>: <?php echo $buku->subjek_buku ?></th>
            </tr>
            <tr>
              <td>Status Buku</td>
              <th>: <?php echo $buku->status_buku ?></th>
            </tr>
            <tr>
              <td>Ringkasan</td>
              <th>: <?php echo $buku->ringkasan ?></th>
            </tr>
            <tr>
              <td>Jumlah Buku</td>
              <th>: <?php echo $buku->jumlah_buku ?></th>
            </tr>
            <tr>
              <td>Harga Buku</td>
              <th>: Rp <?php echo number_format($buku->harga, '0', ',', '.')  ?></th>
            </tr>
            <tr>
              <td>Tanggal Entri</td>
              <th>: <?php echo date('d-m-Y H:i:s',strtotime($buku->tanggal_entri)) ?></th>
            </tr>
            <tr>
              <td>Tanggal Update</td>
              <th>: <?php echo date('d-m-Y H:i:s',strtotime($buku->tanggal)) ?></th>
            </tr>
          </tbody>
        </table>
			</div>
			<div class="modal-footer">
        <a href="<?php echo base_url('admin/buku/delete/'.$buku->id_buku) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Yes. Delete this Data</a>
        <a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit this Data</a>
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
			</div>
		</div>
	</div>
</div>
