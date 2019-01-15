@extends('crudbooster::admin_template')
@section('content')

<div>

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
                //$action = (@$row) ? CRUDBooster::mainpath("edit-save/$_GET['id']") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>
            <form class='form-horizontal' id="form" enctype="multipart/form-data" method="POST" action="{{CRUDBooster::mainpath('save_surat')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="tender_id" value="{{$tender_id}}" class="hidden">
                <div class="nav-tabs-custom" style="margin-bottom:0px!important;">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false"style="pointer-events: none;cursor:not-allowed">Informasi Umum</a></li>
                        @if($command=='add')
                            <li class=""><a href="#" data-toggle="tab" aria-expanded="false" style="pointer-events: none;cursor:not-allowed">Jadwal Tender</a></li>
                            <li class=""><a href="#" data-toggle="tab" aria-expanded="false" style="pointer-events: none;cursor:not-allowed">Syarat Kualifikasi</a></li>
                            <li class="active"><a href="#" data-toggle="tab" aria-expanded="true" >Surat Korespondensi</a></li>
                        @endif
                        @if($command=='edit')
                            <li class=""><a href="{{CRUDBooster::mainpath('step2?id='.$_GET['id'])}}">Jadwal Tender</a></li>
                            <li class=""><a href="{{CRUDBooster::mainpath('step3?id='.$_GET['id'])}}">Syarat Kualifikasi</a></li>
                            <li class="active"><a <a href="#" data-toggle="tab" aria-expanded="true">Surat Korespondensi</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                        <table class="table table-bordered table-striped table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Surat</th>
                                            <th>Sequence</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php ($i=1)
                                    @foreach($list_surat as $ut)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td><input type="checkbox" value="{{$ut->id}}" name="surat_id[{{$ut->id}}]" class="check-surat" @if(in_array($ut->id, $checked_val)) checked @endif> {{$ut->name}}</td>
                                            <td><input type="text" value="{{$arr_seq[$ut->id]}}" name="sequence[{{$ut->id}}]"></td>
                                            <td>
                                                <div id="download-{{$ut->id}}">
                                                    <a href="/admin/tender/surat?file={{$ut->location}}&id={{$tender_id}}" class="btn btn-default">Download</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php ($i++)
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                        <!-- /.tab-pane -->
                        {{-- <div class="tab-pane" id="tab_2">
                            <div id="js-tree" class="treeMasterSyaratKualifikasi" js-tree="treeConfig" should-apply="applyModelChanges()" ng-model="treeData" tree="treeInstance"
                                tree-events-obj="treeEventsObj"></div>

                        </div> --}}
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
                            <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}' class='btn btn-default'><i
                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                            @endif
                            @endif
                            @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                            {{-- @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                            <input type="submit" name="submit" value='{{trans("crudbooster.button_save_more")}}' class='btn btn-success'>
                            @endif --}}

                            @if($button_save && $command != 'detail')
                            <input type="submit" name="submit" value='Finish' class='btn btn-primary'>
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
@push('bottom')
<script type="text/javascript">
$(function () {
    // $('.check-surat').each(function(){
    //     var id = $(this).val();
    //     if($(this).is(':checked')){
    //         $('#upload-'+id).show();
    //         $('#download-'+id).hide();
    //     }else{
    //         $('#upload-'+id).hide();
    //         $('#download-'+id).show();
    //     }
    // });
    // $(document).on("click",".check-surat",function() {
    //     var id = $(this).val();
    //     if($(this).is(':checked')){
    //         $('#upload-'+id).show();
    //         $('#download-'+id).hide();
    //     }else{
    //         $('#upload-'+id).hide();
    //         $('#download-'+id).show();
    //     }
    // });
    //
    // $(document).on("click",".delete-input",function() {
    //     var id = $(this).attr("data-id");
    //     $('#upload-'+id).removeClass('hidden');
    //     $('#control-'+id).addClass('hidden');
    // });

});
</script>

@endpush
