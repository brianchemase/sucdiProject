@extends('insuarance.inc.master')

@section('title','Dashboard')

@section('content')
<div class="content">

<div class="row">
<div class="col-md-12">
<div class="card card-stats">
<div class="card-body">
        <div class="row">
            <div class="col-md-3">
              <div class="statistics">
                <div class="info">
                  <div class="icon icon-primary">
                  <i class="now-ui-icons users_single-02"></i>
                  </div>
                    <h3 class="info-title">859</h3>
                    <h6 class="stats-title">Registered Clients</h6>
                </div>
            </div>
        </div>
          <div class="col-md-3">
            <div class="statistics">
              <div class="info">
                <div class="icon icon-success">
                <i class="now-ui-icons business_money-coins"></i>
                </div>
                  <h3 class="info-title"><small>$</small>3,521</h3>
                  <h6 class="stats-title">Today Revenue</h6>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="statistics">
              <div class="info">
                <div class="icon icon-info">
                <i class="now-ui-icons users_single-02"></i>
                </div>
                  <h3 class="info-title">562</h3>
                  <h6 class="stats-title">active Customers</h6>
              </div>
            </div>
          </div>
          <div class="col-md-3">
              <div class="statistics">
                <div class="info">
                  <div class="icon icon-danger">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  </div>
                      <h3 class="info-title">353</h3>
                      <h6 class="stats-title">Active Covers</h6>
                  </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
     </div>

      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="card card-stats">
              <div class="card-body ">
                <div class="statistics statistics-horizontal">
                          <div class="info info-horizontal">
                              <div class="row">
                                <div class="col-5">
                                  <div class="icon icon-primary icon-circle">
                                      <i class="now-ui-icons ui-2_chat-round"></i>
                                  </div>
                                </div>
                                <div class="col-7 text-right">
                                  <h3 class="info-title">167</h3>
                                  <h6 class="stats-title">Counter</h6>
                                </div>
                              </div>
                          </div>
                      </div>
                </div>
              </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="card card-stats">
              <div class="card-body ">
                <div class="statistics statistics-horizontal">
                          <div class="info info-horizontal">
                              <div class="row">
                                <div class="col-5">
                                  <div class="icon icon-primary icon-circle">
                                      <i class="now-ui-icons ui-2_chat-round"></i>
                                  </div>
                                </div>
                                <div class="col-7 text-right">
                                  <h3 class="info-title">167</h3>
                                  <h6 class="stats-title">Active Running Covers</h6>
                                </div>
                              </div>
                          </div>
                      </div>
                </div>
              </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="card card-stats">
              <div class="card-body ">
                <div class="statistics statistics-horizontal">
                          <div class="info info-horizontal">
                              <div class="row">
                                <div class="col-5">
                                  <div class="icon icon-primary icon-circle">
                                      <i class="now-ui-icons ui-2_chat-round"></i>
                                  </div>
                                </div>
                                <div class="col-7 text-right">
                                  <h3 class="info-title">167</h3>
                                  <h6 class="stats-title">Active Running Covers</h6>
                                </div>
                              </div>
                          </div>
                      </div>
                </div>
              </div>
        </div>

      </div>

      <div class="row">
        


      <div class="col-lg-6 col-sm-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Title</h5>
                <h4 class="card-title">Description</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                <canvas id="myChartProducts" style="width:100%;max-width:600px"></canvas>

                  <script>
                  const xValues = ["Product 1", "Product 1", "Product 2", "Product 3", "Product 4"];
                  const yValues = [55, 49, 44, 24, 15];
                  const barColors = [
                    "#b91d47",
                    "#00aba9",
                    "#2b5797",
                    "#e8c3b9",
                    "#1e7145"
                  ];

                  new Chart("myChartProducts", {
                    type: "doughnut",
                    data: {
                      labels: xValues,
                      datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                      }]
                    },
                    options: {
                      title: {
                        display: true,
                        text: "World Wide Wine Production 2018"
                      }
                    }
                  });
                  </script>
                  

                </div>
              </div>
            </div>
          </div>

        <div class="col-lg-6 col-sm-6">
         <div class="card card-stats">
          <div class="card-header ">
                <h5 class="card-category">Product Distribution</h5>
                <h4 class="card-title">Pie Showing the distribution</h4>
              </div>
              <div class="card-body ">
                <div id="ProductDist" style="width:100%; max-width:600px; height:500px;"></div>
                <script>
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                      // Set Data
                      const data = google.visualization.arrayToDataTable([
                        ['Contry', 'Mhl'],
                        ['Product 1',54.8],
                        ['Product 2',48.6],
                        ['Product 3 ',44.4],
                        ['Product 4',23.9],
                        ['Others',14.5]
                      ]);

                      // Set Options
                      const options = {
                        title:'Products Distribution',
                        is3D:true
                      };

                      // Draw
                      const chart = new google.visualization.PieChart(document.getElementById('ProductDist'));
                      chart.draw(data, options);

                      }
                </script>
              </div>
            </div>

      </div>

     






        <!-- <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Global Sales</h5>
                <h4 class="card-title">Shipped Products</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item text-danger" href="#">Remove Data</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="lineChartExample"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">2018 Sales</h5>
                <h4 class="card-title">All products</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item text-danger" href="#">Remove Data</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Email Statistics</h5>
                <h4 class="card-title">24 Hours Performance</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="barChartSimpleGradientsNumbers"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Backend development</h5>
                <h4 class="card-title">Tasks</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Persons List</h5>
                <h4 class="card-title"> Employees Stats</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Country
                      </th>
                      <th>
                        City
                      </th>
                      <th class="text-right">
                        Salary
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Dakota Rice
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <td class="text-right">
                          $36,738
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Minerva Hooper
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Sage Rodriguez
                        </td>
                        <td>
                          Netherlands
                        </td>
                        <td>
                          Baileux
                        </td>
                        <td class="text-right">
                          $56,142
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Doris Greene
                        </td>
                        <td>
                          Malawi
                        </td>
                        <td>
                          Feldkirchen in Kärnten
                        </td>
                        <td class="text-right">
                          $63,542
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Mason Porter
                        </td>
                        <td>
                          Chile
                        </td>
                        <td>
                          Gloucester
                        </td>
                        <td class="text-right">
                          $78,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>


@endsection