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
                $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
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
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Informasi Umum</a></li>
                        @if($command=='add')
                            <li class=""><a href="#" data-toggle="tab" aria-expanded="false" style="pointer-events: none;cursor:not-allowed">Pengalaman Kerja</a></li>
                            <li class=""><a href="#" data-toggle="tab" aria-expanded="false" style="pointer-events: none;cursor:not-allowed">Uraian Tugas</a></li>
                        @endif
                        @if($command=='edit')
                            <li class=""><a href="{{CRUDBooster::mainpath('step2?id='.$row->id)}}">Pengalaman Kerja</a></li>
                            <li class=""><a href="{{CRUDBooster::mainpath('step3?id='.$row->id)}}">Uraian Tugas</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body" id="parent-form-area">
                                @if($command == 'detail')
                                @include("crudbooster::default.form_detail")
                                @else
                                @include("crudbooster::default.form_body")
                                @endif
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
                            <input type="submit" name="submit" value='Step2' class='btn btn-primary'>
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
