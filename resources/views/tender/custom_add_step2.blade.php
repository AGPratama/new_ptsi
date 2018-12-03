@extends('crudbooster::admin_template')
@section('content')

<div ng-app="app" ng-controller="jadwalCtrl">

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
            <form class='form-horizontal' ng-submit="doEdit();">
                <div class="nav-tabs-custom" style="margin-bottom:0px!important;">
                    <ul class="nav nav-tabs">
                        <li><a href="{{ CRUDBooster::mainpath('edit/'.$_GET['id']) }}">Informasi Umum</a></li>
                        @if($command=='add')
                            <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Jadwal Tender</a></li>
                            <li class=""><a href="#" data-toggle="tab" aria-expanded="false" style="pointer-events: none;cursor:not-allowed">Syarat Kualifikasi</a></li>
                            <li class=""><a href="#" data-toggle="tab" aria-expanded="false" style="pointer-events: none;cursor:not-allowed">Surat Korespondensi</a></li>
                        @endif
                        @if($command=='edit')
                            <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Jadwal Tender</a></li>
                            <li class=""><a href="{{CRUDBooster::mainpath('step3?id='.$_GET['id'])}}">Syarat Kualifikasi</a></li>
                            <li class=""><a href="{{CRUDBooster::mainpath('step4?id='.$_GET['id'])}}">Surat Korespondensi</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active">
                            <div class="form-group form-datepicker header-group-0 " id="form-group-jadwal_upload_dokumen_prakualifikasi" style="">
                                <label class="control-label col-sm-2">Jadwal Upload Dokumen Prakualifikasi
                                    <span class="text-danger" title="This field is required">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                        <input type="text" title="Jadwal Upload Dokumen Prakualifikasi" readonly="" required="" ng-model="data.jadwal_upload_dokumen_prakualifikasi" class="form-control notfocus input_date" name="jadwal_upload_dokumen_prakualifikasi" id="jadwal_upload_dokumen_prakualifikasi">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-datepicker header-group-0 " id="form-group-jadwal_pembuktian_prakualifikasi" style="">
                                <label class="control-label col-sm-2">Jadwal Pembuktian Prakualifikasi
                                    <span class="text-danger" title="This field is required">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                        <input type="text" title="Jadwal Pembuktian Prakualifikasi" readonly="" ng-model="data.jadwal_pembuktian_prakualifikasi" required="" class="form-control notfocus input_date" name="jadwal_pembuktian_prakualifikasi" id="jadwal_pembuktian_prakualifikasi">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-datepicker header-group-0 " id="form-group-jadwal_download_dokumen_pemilihan" style="">
                                <label class="control-label col-sm-2">Jadwal Download Dokumen Pemilihan
                                    <span class="text-danger" title="This field is required">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                        <input type="text" title="Jadwal Download Dokumen Pemilihan" readonly="" required="" ng-model="data.jadwal_download_dokumen_pemilihan" class="form-control notfocus input_date" name="jadwal_download_dokumen_pemilihan" id="jadwal_download_dokumen_pemilihan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-datepicker header-group-0 " id="form-group-jadwal_pemberian_penjelasan" style="">
                                <label class="control-label col-sm-2">Jadwal Pemberian Penjelasan
                                    <span class="text-danger" title="This field is required">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                        <input type="text" title="Jadwal Pemberian Penjelasan" readonly="" required="" ng-model="data.jadwal_pemberian_penjelasan" class="form-control notfocus input_date" name="jadwal_pemberian_penjelasan" id="jadwal_pemberian_penjelasan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-datepicker header-group-0 " id="form-group-jadwal_upload_dokumen_penawaran" style="">
                                <label class="control-label col-sm-2">Jadwal Upload Dokumen Penawaran
                                    <span class="text-danger" title="This field is required">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                        <input type="text" title="Jadwal Upload Dokumen Penawaran" readonly="" required="" ng-model="data.jadwal_upload_dokumen_penawaran" class="form-control notfocus input_date" name="jadwal_upload_dokumen_penawaran" id="jadwal_upload_dokumen_penawaran">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-datepicker header-group-0 " id="form-group-jadwal_pengumuman_pemenang" style="">
                                <label class="control-label col-sm-2">Jadwal Pengumuman Pemenang
                                    <span class="text-danger" title="This field is required">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                        <input type="text" title="Jadwal Pengumuman Pemenang" readonly="" required="" ng-model="data.jadwal_pengumuman_pemenang" class="form-control notfocus input_date" name="jadwal_pengumuman_pemenang" id="jadwal_pengumuman_pemenang">
                                    </div>
                                </div>
                            </div>
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
                            <a href='{{ CRUDBooster::mainpath('edit/'.$_GET['id']) }}' class='btn btn-default'><i
                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                            @endif
                            @endif
                            @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                            {{-- @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                            <input type="submit" name="submit" value='{{trans("crudbooster.button_save_more")}}' class='btn btn-success'>
                            @endif --}}

                            @if($button_save && $command != 'detail')
                             <input type="submit" name="submit" value='Step 3' class='btn btn-primary'>
                            {{--<a href="{{CRUDBooster::mainpath()}}" type="button" class='btn btn-primary'>Step 3</a>--}}
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
<style>
    .form-group label{
        font-weight: bold;
        line-height: inherit;
    }
</style>
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
<script src='<?php echo asset("custom/jadwalCtrl.js")?>'></script>

<script type="text/javascript">
    var lang = 'en';
    $(function () {
        $('.input_date').datepicker({
            format: 'yyyy-mm-dd',
            language: lang
        });

        $('.open-datetimepicker').click(function () {
            $(this).next('.input_date').datepicker('show');
        });

    });

</script>

@endpush
