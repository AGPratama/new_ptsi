@section('content')
<style>.content-header>.breadcrumb{padding:0!important;}</style>
    <div ng-controller="MasterSyaratKualifikasiCtrl">
        <div class="box">
            <div class="box-body">
                <i class="fa fa-spinner fa-spin" ng-show="isLoading"></i>
                <div id="js-tree" js-tree="treeConfig" ng-model="treeData" tree="treeInstance" tree-events-obj="treeEventsObj" class="treeMasterSyaratKualifikasi"></div>
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
    <div id="context"></div>
    @endpush
    @push('bottom')
    <script src='<?php echo asset("bower_components/angular/angular.js")?>'></script>
    <script src='<?php echo asset("bower_components/jstree/dist/jstree.js")?>'></script>
    <script src='<?php echo asset("bower_components/jstree/dist/ngJsTree.js")?>'></script>
    <script src='<?php echo asset("bower_components/angular-bootstrap/ui-bootstrap-tpls.js")?>'></script>
    <script src='<?php echo asset("bower_components/angular-ui-select/dist/select.js")?>'></script>
    <script src='<?php echo asset("bower_components/angular-toastr/dist/angular-toastr.tpls.js")?>'></script>
    <script src='<?php echo asset("bower_components/angular-loading/spin.js")?>'></script>
    <script src='<?php echo asset("bower_components/angular-loading/angular-loading.js")?>'></script>
    <script src='<?php echo asset("bower_components/angular-sanitize/angular-sanitize.js")?>'></script>
    <script src='<?php echo asset("custom/app.js")?>'></script>
    <script src='<?php echo asset("custom/MasterSyaratKualifikasiCtrl.js")?>'></script>
    @endpush