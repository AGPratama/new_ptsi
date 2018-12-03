@extends('crudbooster::admin_template')
@section('content')

<div ng-app="app" ng-controller="treeCtrl">

    @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
    @if(g('return_url'))
    <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
            &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
    @else
    <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
            &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
    @endif
    @endif

    <div class="panel panel-default">
        {{-- <div class="panel-heading">
            <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title or "Page Title" !!}</strong>
        </div> --}}

        <div class="panel-body" style="padding:0;">
            <?php
                // $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>
            <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type='hidden' name='return_url' value='{{ @$return_url }}' />
                <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}' />
                <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}' />
                @if($hide_form)
                <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                @endif
                <div class="nav-tabs-custom" style="margin-bottom:0px!important;">
                    <ul class="nav nav-tabs">
                        <li><a href="{{ CRUDBooster::mainpath('edit/'.$_GET['id']) }}">Informasi Umum</a></li>
                        <li class=""><a href="{{CRUDBooster::mainpath('step2?id='.$_GET['id'])}}">Jadwal Tender</a></li>
                        <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false" >Syarat Kualifikasi</a></li>
                        <li class=""><a href="{{CRUDBooster::mainpath('step4?id='.$_GET['id'])}}" data-toggle="tab" aria-expanded="false">Surat Korespondensi</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active">
                            <i class="fa fa-spinner fa-spin" ng-show="isLoading"></i>
                            <div id="js-tree" class="treeMasterSyaratKualifikasi" js-tree="treeConfig" should-apply="applyModelChanges()" ng-model="treeData" tree="treeInstance"
                                tree-events-obj="treeEventsObj"></div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>


                <div class="box-footer" style="background: #F5F5F5">

                    <div class="form-group">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-10" style="text-align:right">
                            @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                            @if(g('return_url'))
                            <a href='{{g("return_url")}}' class='btn btn-default'><i class='fa fa-chevron-circle-left'></i>
                                {{trans("crudbooster.button_back")}}</a>
                            @else
                            <a href="{{CRUDBooster::mainpath('step2?id='.$_GET['id'])}}" class='btn btn-default'><i
                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                            @endif
                            @endif
                            @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                            {{-- @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                            <input type="submit" name="submit" value='{{trans("crudbooster.button_save_more")}}' class='btn btn-success'>
                            @endif --}}

                            @if($button_save && $command != 'detail')
                            {{-- <input type="submit" name="submit" value='Finish' class='btn btn-primary'> --}}
                            <a href="{{CRUDBooster::mainpath('step4?id='.$_GET['id'])}}" type="button" class='btn btn-primary'>Step 4</a>
                            @endif

                            @endif
                        </div>
                    </div>


                </div><!-- /.box-footer-->

            </form>

        </div>
    </div>
</div>
<!--END AUTO MARGIN-->
@endsection


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
<script src='<?php echo asset("bower_components/underscore/underscore-min.js")?>'></script>
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
<script src='<?php echo asset("custom/treeCtrl.js")?>'></script>
@endpush
