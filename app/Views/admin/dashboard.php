  <?= $this->extend('layout/template_admin') ?>

  <?= $this->section('content') ?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold mb-2">UMKM Yang Terverifikasi</p>
                    <h5 class="font-weight-bolder">
                      150
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-9">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold mb-2">UMKM Yang Belum Terverifikasi</p>
                    <h5 class="font-weight-bolder">
                      5
                    </h5>
                  </div>
                </div>
                <div class="col-3 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold mb-2">UMKM Yang Terdaftar</p>
                    <h5 class="font-weight-bolder">
                      155
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-basket text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold mb-2">Produk</p>
                    <h5 class="font-weight-bolder">
                      351
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Pendapatan UMKM Kabupaten Tasikmalaya</h6>
              <form action="post">
              <div class="row">
                <div class="col-2">
                <select class="form-control" name="month" id="month">
                  <option value="1" <?= $month == 1 ? 'selected' : '' ?>>Januari</option>
                  <option value="2" <?= $month == 2 ? 'selected' : '' ?>>Februari</option>
                  <option value="3" <?= $month == 3 ? 'selected' : '' ?>>Maret</option>
                  <option value="4" <?= $month == 4 ? 'selected' : '' ?>>April</option>
                  <option value="5" <?= $month == 5 ? 'selected' : '' ?>>Mei</option>
                  <option value="6" <?= $month == 6 ? 'selected' : '' ?>>Juni</option>
                  <option value="7" <?= $month == 7 ? 'selected' : '' ?>>Juli</option>
                  <option value="8" <?= $month == 8 ? 'selected' : '' ?>>Agustus</option>
                  <option value="9" <?= $month == 9 ? 'selected' : '' ?>>September</option>
                  <option value="10" <?= $month == 10 ? 'selected' : '' ?>>Oktober</option>
                  <option value="11" <?= $month == 11 ? 'selected' : '' ?>>November</option>
                  <option value="12" <?= $month == 12 ? 'selected' : '' ?>>Desember</option>
                </select>
                </div>
                <div class="col-1">
                  <select class="form-control" name="year" id="year">
                    <option value="2023" <?= $year == 2023 ? 'selected' : '' ?>>2023</option>
                    <option value="2024" <?= $year == 2024 ? 'selected' : '' ?>>2024</option>
                  </select>
              </div>
              <div class="col-1">
                <button type="submit" class="btn btn-primary">Cari</button>
                </div>
              </form>
              
            </div>
            
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        
      <div class="row mt-4">
        <div class="col-lg-12">
          <div class="card">
                <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Kategori</h6>
                </div>
                <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-box-2 text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Produk</h6>
                      <span class="text-xs">31</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-glasses-2 text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Fashion</h6>
                      <span class="text-xs">51</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-satisfied text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Makanan</h6>
                      <span class="text-xs">14</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Teknologi</h6>
                      <span class="text-xs font-weight-bold">42</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-delivery-fast text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Jasa</h6>
                      <span class="text-xs font-weight-bold">20</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-app text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Lainnya</h6>
                      <span class="text-xs font-weight-bold">36</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

  <?= $this->endSection() ?>

  <?= $this->section('chart') ?>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: [
          <?php foreach($pendapatan as $p) : ?>
            "<?= $p['nama_kecamatan'] ?>",
          <?php endforeach; ?>
        ],
        datasets: [{
          label: "Pendapatan",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [
            <?php foreach($pendapatan as $p) : ?>
              <?= $p['jumlah_pendapatan'] ?>,
            <?php endforeach; ?>
          ],
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 20,
              font: {
                size: 12,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
    </script>
    <?= $this->endSection() ?>

    <!-- "Bantarkalong", "Bojongasih", "Bojonggambir", "Ciawi", "Cibalong", "Cigalontang", "Cikalong", "Cikatomas", "Cineam", "Cipatujah", "Cisayong", "Culamega", "Gunungtanjung", "Jamanis", "Jatiwaras", "Kadipaten", "Karang Jaya", "Karangnunggal", "Leuwisari", "Mangunreja", "Manonjaya", "Padakembang", "Pagerageung", "Pancatengah", "Parungponteng", "Puspahiang", "Rajapolah", "Salawu", "Salopa", "Sariwangi", "Singaparna", "Sodonghilir", "Sukahening", "Sukaraja", "Sukarame", "Sukaratu", "Sukaresik", "Tanjungjaya", "Taraju", -->