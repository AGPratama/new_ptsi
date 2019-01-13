@extends('crudbooster::admin_template')

@section('content')
<div ng-app="app" ng-controller="DashboardCtrl">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">INSTANSI</div>
                <div class="panel-body">
                <canvas id="pieChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">BIDANG/SUB BIDANG</div>
                <div class="panel-body">
                    <canvas id="pieChartBidang" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">STATUS LELANG</div>
                <div class="panel-body">
                    <canvas id="pie1Chart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">NILAI PROYEK</div>
                <div class="panel-body">
                    <canvas id="bar1Chart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">JUMLAH TENDER BERDASARKAN AD</div>
            <div class="panel-body">
                    <canvas id="bar2Chart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">NILAI KONTRAK BERDASARKAN AO</div>
                <div class="panel-body">
                    <canvas id="bar3Chart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Information Tender</div>
                <div class="panel-body">
                    <table class="table table-stripped table-bordered custom-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Tender</th>
                                <th>Nama Tender</th>
                                <th>Intansi</th>
                                <th>Bidang</th>
                                <th>Tnaggal AKhir Tender</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="12" class="text-center">Data Not Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
  {{-- Get Angularjs --}}
  @push('head')
  <link rel='stylesheet' href='<?php echo asset("bower_components/jstree/dist/themes/default/style.min.css")?>' />
  <link rel='stylesheet' href='<?php echo asset("bower_components/angular-ui-select/dist/select.css")?>' />
  <link rel='stylesheet' href='<?php echo asset("bower_components/bootstrap/dist/css/bootstrap.css")?>' />
  <link rel='stylesheet' href='<?php echo asset("bower_components/angular-toastr/dist/angular-toastr.css")?>' />
  <link rel='stylesheet' href='<?php echo asset("bower_components/angular-loading/angular-loading.css")?>' />
  <link rel='stylesheet' href='<?php echo asset("css/custom.css")?>' />
  @endpush
  @push('bottom')
  <script src='<?php echo asset("bower_components/angular/angular.js")?>'></script>
  {{-- <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
  <script src='<?php echo asset("bower_components/jstree/dist/jstree.js")?>'></script>
  <script src='<?php echo asset("bower_components/jstree/dist/ngJsTree.js")?>'></script>
  <script src='<?php echo asset("bower_components/angular-bootstrap/ui-bootstrap-tpls.js")?>'></script>
  <script src='<?php echo asset("bower_components/angular-ui-select/dist/select.js")?>'></script>
  <script src='<?php echo asset("bower_components/angular-toastr/dist/angular-toastr.tpls.js")?>'></script>
  <script src='<?php echo asset("bower_components/angular-loading/spin.js")?>'></script>
  <script src='<?php echo asset("bower_components/angular-loading/angular-loading.js")?>'></script>
  <script src='<?php echo asset("bower_components/angular-sanitize/angular-sanitize.js")?>'></script>
  <script src='<?php echo asset("custom/app.js")?>'></script>
  <script src='<?php echo asset("custom/DashboardCtrl.js")?>'></script>
  @endpush