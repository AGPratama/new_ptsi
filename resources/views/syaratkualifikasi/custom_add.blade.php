@extends('crudbooster::admin_template')
@section('content')

    <div ng-app="app" ng-controller="kelengkapanKualifikasiCtrl" ng-init="privilegeId = {{CRUDBooster::myPrivilegeId()}}">

        @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
            @if(g('return_url'))
                <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                    </a></p>
            @else
                <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                    </a></p>
            @endif
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title or "Page Title" !!}
                </strong>
            </div>

            <div class="panel-body" style="padding:0;">
                <?php
                // $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>
                <form class='form-horizontal'
                      ng-init="getTenderData({{Session::get('current_row_id')}})">
                    <div class="nav-tabs-custom" style="margin-bottom:0px!important;">
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="tab-pane active">
                                <div class="col-sm-6" style="margin-top: 30px">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td width="200">Nama Tender</td>
                                                <td>:</td>
                                                <td><%data.nama_tender%></td>
                                            </tr>
                                            <tr>
                                                <td>No. Kontrak</td>
                                                <td width="50">:</td>
                                                <td><%data.no_tender%></td>
                                            </tr>
                                            <tr>
                                                <td>Nilai</td>
                                                <td>:</td>
                                                <td><%data.nilai_pagu%></td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal Upload Dokumen Prakualifikasi</td>
                                                <td>:</td>
                                                <td><%data.jadwal_upload_dokumen_prakualifikasi%></td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal Pembuktian Prakualifikasi</td>
                                                <td>:</td>
                                                <td><%data.jadwal_pembuktian_prakualifikasi%></td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal Download Dokumen Pemilihan</td>
                                                <td>:</td>
                                                <td><%data.jadwal_download_dokumen_pemilihan%></td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal Pemberian Penjelasan</td>
                                                <td>:</td>
                                                <td><%data.jadwal_pemberian_penjelasan%></td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal Upload Dokumen Penawaran</td>
                                                <td>:</td>
                                                <td><%data.jadwal_upload_dokumen_penawaran%></td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal Pengumuman Pemenang</td>
                                                <td>:</td>
                                                <td><%data.jadwal_pengumuman_pemenang%></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <i class="fa fa-spinner fa-spin" ng-show="isLoading"></i>
                                    <div id="js-tree" class="treeMasterSyaratKualifikasi" js-tree="treeConfig"
                                         should-apply="applyModelChanges()" ng-model="treeData" tree="treeInstance"
                                         tree-events-obj="treeEventsObj"></div>
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
                                <a href='{{g("return_url")}}' class='btn btn-default'><i
                                            class='fa fa-chevron-circle-left'></i>
                                    {{trans("crudbooster.button_back")}}</a>
                            @else
                                <a href='{{ CRUDBooster::mainpath('edit/'.$_GET['id']) }}' class='btn btn-default'><i
                                            class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}
                                </a>
                            @endif
                        @endif
                        @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                            {{-- @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                            <input type="submit" name="submit" value='{{trans("crudbooster.button_save_more")}}' class='btn btn-success'>
                            @endif --}}

                            @if($button_save && $command != 'detail')
                                    <button ng-click="doSend('tender')" ng-show="privilegeId == 3" class='btn btn-primary'>Kirim</button>
                                    <button ng-click="doSend('verifikator')" ng-show="privilegeId == 4" class='btn btn-primary'>Status Verifikasi</button>
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
    <link rel='stylesheet' href='<?php echo asset("bower_components/jstree/dist/themes/default/style.min.css")?>'/>
    <link rel='stylesheet' href='<?php echo asset("bower_components/angular-ui-select/dist/select.css")?>'/>
    <link rel='stylesheet' href='<?php echo asset("bower_components/bootstrap/dist/css/bootstrap.css")?>'/>
    <link rel='stylesheet' href='<?php echo asset("bower_components/angular-toastr/dist/angular-toastr.css")?>'/>
    <link rel='stylesheet' href='<?php echo asset("bower_components/angular-loading/angular-loading.css")?>'/>
    <link rel='stylesheet' href='<?php echo asset("css/custom.css")?>'/>
    <style>
        .form-group label {
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
    <script src='<?php echo asset("custom/kelengkapanKualifikasiCtrl.js")?>'></script>

@endpush