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
            <form class='form-horizontal' id="tenaga_kerja_pengalaman">
                <div class="nav-tabs-custom" style="margin-bottom:0px!important;">
                    <ul class="nav nav-tabs">
                        <li><a href="{{ CRUDBooster::mainpath('edit/'.$_GET['id']) }}">Informasi Umum</a></li>
                        <li><a href="{{CRUDBooster::mainpath('step2?id='.$_GET['id'])}}">Pengalaman Kerja</a></li>
                        <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false" >Uraian Tugas</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active">
                            <div class="" id="form-group-jadwal_upload_dokumen_prakualifikasi" style="">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>Harap Cek list minimal 1 uraian tugas.</li>
                                        </ul>
                                    </div>
                                @endif
                                <input type="text" name="tenaga_kerja_id" value="{{$tenaga_kerja_id}}" class="hidden">
                                <table class="table table-bordered table-striped table-hovered">
                                    <thead>
                                        <tr>
                                            <th>&nbsp</th>
                                            <th>Nama Posisi</th>
                                            <th>Nama Proyek</th>
                                            <th>Uraian Tugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($uraian_tugas as $ut)
                                        <tr>
                                            <td><input type="checkbox" name="uraian_id[]" value="{{$ut->id}}" @if(in_array($ut->id, $checked_val)) checked @endif></td>
                                            <td>{{$ut->nama_posisi}}</td>
                                            <td>{{$ut->nama_proyek}}</td>
                                            <td>{{$ut->uraian_tugas}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                             <input type="submit" name="submit" value='Finish' class='btn btn-primary'>
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
<style>
    .form-group label{
        font-weight: bold;
        line-height: inherit;
    }
</style>
<div id="context"></div>
@endpush
@push('bottom')


@endpush
