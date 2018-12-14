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
                        @if($command=='add')
                            <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Pengalaman Kerja</a></li>
                            <li class=""><a href="#" data-toggle="tab" aria-expanded="false" style="pointer-events: none;cursor:not-allowed">Uraian Tugas</a></li>
                        @endif
                        @if($command=='edit')
                            <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Pengalaman Kerja</a></li>
                            <li><a id="a-step3" class="btn" href="#">Uraian Tugas</a></li>
                            {{--<li class=""><a href="{{CRUDBooster::mainpath('step3?id='.$_GET['id'])}}">Uraian Tugas</a></li>--}}
                        @endif
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active">
                            <div class="" id="form-group-jadwal_upload_dokumen_prakualifikasi" style="">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>Harap Cek list minimal 1 pengalaman kerja.</li>
                                        </ul>
                                    </div>
                                @endif
                                <input type="text" name="tenaga_kerja_id" value="{{$tenaga_kerja_id}}" class="hidden">
                                <table class="table table-bordered table-striped table-hovered">
                                    <thead>
                                        <tr>
                                            <th>&nbsp</th>
                                            <th>Nama Pekerja</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Pendidikan Formal</th>
                                            <th>Posisi Yang Diusulkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pengalaman_kerja as $pe)
                                        <tr>
                                            <td><input type="checkbox" name="pengalaman_id[]" value="{{$pe->id}}" @if(in_array($pe->id, $checked_val)) checked @endif></td>
                                            <td>{{$pe->nama_pekerja}}</td>
                                            <td>{{$pe->nama_perusahaan}}</td>
                                            <td>{{$pe->pendidikan_formal}}</td>
                                            <td>{{$pe->posisi_yang_diusulkan}}</td>
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
                             <input type="submit" name="submit" value='Step 3' class='btn btn-primary' id="btn-step3">
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
<script type="text/javascript">
$(function () {
    $(document).on("click","#a-step3",function() {
        $('#btn-step3').click();
    });

});
</script>

@endpush
