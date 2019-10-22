<ul class="breadcrumbs">
	<li class="nav-home">
		<a href="#">
			<i class="flaticon-home"></i>
		</a>
	</li>
</ul>

  <div class="btn-group btn-group-page-header ml-auto">
    <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-ellipsis-h"></i>
    </button>
    <div class="dropdown-menu">
      <div class="arrow"></div>
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </div>

</div>

<div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body ">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Visitors</p>
                <h4 class="card-title">1,294</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-info bubble-shadow-small">
                <i class="far fa-newspaper"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Subscribers</p>
                <h4 class="card-title">1303</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-success bubble-shadow-small">
                <i class="far fa-chart-bar"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Sales</p>
                <h4 class="card-title">$ 1,345</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-secondary bubble-shadow-small">
                <i class="far fa-check-circle"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Order</p>
                <h4 class="card-title">576</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">

    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Feed Activity</div>
        </div>
        <div class="card-body">
          <ol class="activity-feed">
            <li class="feed-item feed-item-secondary">
              <time class="date" datetime="9-25">Sep 25</time>
              <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
            </li>
            <li class="feed-item feed-item-success">
              <time class="date" datetime="9-24">Sep 24</time>
              <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
            </li>
            <li class="feed-item feed-item-info">
              <time class="date" datetime="9-23">Sep 23</time>
              <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
            </li>
            <li class="feed-item feed-item-warning">
              <time class="date" datetime="9-21">Sep 21</time>
              <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
            </li>
            <li class="feed-item feed-item-danger">
              <time class="date" datetime="9-18">Sep 18</time>
              <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
            </li>
            <li class="feed-item">
              <time class="date" datetime="9-17">Sep 17</time>
              <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
            </li>
          </ol>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-head-row">
            <h4 class="card-title">Top Buku</h4>
          </div>
          <!-- <p class="card-category">Map of the distribution of users around the world</p> -->
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive table-hover table-sales">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Cover</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Jumlah Buku</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($top as $top) {?>                    
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="<?php echo base_url('assets/upload/buku/thumbs/'.$top->cover_buku) ?>" alt="indonesia" style="width:30px; height:50px;">
                        </div>
                      </td>
                      <td><?php echo $top->judul_buku ?></td>
                      <td><?php echo $top->penulis_buku ?></td>
                      <td class="text-right">
                        <?php echo $top->jumlah_buku ?>
                      </td>
                      <td class="text-right">
                        <?php echo number_format($top->harga,'0',',','.') ?>
                      </td>
                      <td class="text-right">
                        <?php echo $top->tot ?>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Presentase peminjaman</div>
        </div>
        <div class="card-body">

          <!-- <div class="col-md-2">
            <div class="form-group form-floating-label">
              <select class="form-control" id="selectFloatingLabel2" name="lmt" id="lmt" required="">
                <option value="">&nbsp;</option>
                <option value="<?php echo $lmt5?>"><?php echo $lmt5?></option>
                <option value="<?php echo $lmt10?>"><?php echo $lmt10?></option>
                <option value="<?php echo $lmt25?>"><?php echo $lmt25?></option>
                <option value="<?php echo $lmt50?>"><?php echo $lmt50?></option>
                <option value="<?php echo $lmt100?>"><?php echo $lmt100?></option>
              </select>
              <label for="selectFloatingLabel2" class="placeholder">Select</label>
            </div>
          </div> -->

          <div class="chart-container">
            <canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Data Per Kecamatan</div>
        </div>
        <div class="card-body">

          <!-- <div class="col-md-2">
            <div class="form-group form-floating-label">
              <select class="form-control" id="selectFloatingLabel2" name="" required="">
                <option value="">&nbsp;</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <label for="selectFloatingLabel2" class="placeholder">Select</label>
            </div>
          </div> -->

          <div class="chart-container">
            <canvas id="barChart" ></canvas>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Data Per Kecamatan</div>
        </div>
        <div class="card-body">

          <div class="col-md-2">
            <div class="form-group form-floating-label">
              <select class="form-control" id="alamat" name="alamat" required="">
                <option value="">&nbsp;</option>
                <?php
                  // foreach($year_list->result_array() as $row)
                  // {
                  //     echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
                  // }
                ?>
              </select>
              <label for="selectFloatingLabel2" class="placeholder">Select</label>
            </div>
          </div>

          <div class="chart-container">
            <canvas id="chart_area" style="width: 1000px; height: 620px;"></canvas>
          </div>
        </div>
      </div>
    </div>

</div>

  