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
                //$action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
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
                            <li class=""><a href="{{CRUDBooster::mainpath('step2?id='.$row->id)}}">Jadwal Tender</a></li>
                            <li class=""><a href="{{CRUDBooster::mainpath('step3?id='.$row->id)}}">Syarat Kualifikasi</a></li>
                            <li class="active"><a <a href="#" data-toggle="tab" aria-expanded="true">Surat Korespondensi</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body" id="parent-form-area">
                                @foreach($list_surat as $ls)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="{{$ls->id}}" name="surat_id[{{$ls->id}}]" class="check-surat" @if(in_array($ls->id, $checked_val)) checked @endif> {{$ls->name}}
                                        </label>
                                        <?php
                                        // $style="";
                                        // $link="#";
                                        // if(isset($arr_input)){
                                        //     if(array_key_exists ( $ls->id , $arr_input )){
                                        //         $style = "hidden";
                                        //         $link = url($arr_input[$ls->id]);
                                        ?>
                                            <!-- <div id="control-{{$ls->id}}">
                                                <a href="{{$link}}" target="_blank" class="btn btn-success style">View</a>
                                                <a href="#"  class="btn btn-danger delete-input" data-id="{{$ls->id}}">delete</a>
                                            </div> -->
                                        <?php
                                        //     }
                                        //
                                        // } ?>

                                        <!-- <div id="upload-{{$ls->id}}" class="upload {{$style}}">
                                            <input type="file" name="surat_korespondesi[{{$ls->id}}]" class="form-control">
                                        </div> -->
                                        <div id="download-{{$ls->id}}">
                                            <a href="{{url($ls->location)}}" class="btn btn-default">Download</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- /.box-body -->
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
