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
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Cetak Dokumen</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body" id="parent-form-area">
                                <?php $i=0; ?>
                                @foreach($cetak as $ls)
                                    <div style="margin-bottom:10px;">
                                        <label>
                                            {{$ls->nama}}
                                        </label>
                                        <?php
                                            $url=($ls->value) ? url($ls->value) : "#";
                                            $disabled=($ls->value) ? "" : "disabled";
                                            $i++;
                                        ?>
                                        <div id="control-{{$ls->nama}}">
                                            @if(strpos($ls->value,'suratkorespondensi')===FALSE)
                                                <a href="{{$url}}" target="_blank" id="click-{{$i}}" data-cetak="{{$i}}" class="clickcetak btn btn-success style {{$disabled}}">View</a>
                                            @else
                                                <a href="/admin/tender/surat?file={{$ls->value}}&id={{$id}}" target="_blank" id="click-{{$i}}" data-cetak="{{$i}}" class="clickcetak btn btn-success style {{$disabled}}">View Surat</a>
                                            @endif
                                            <input type="checkbox" id="downloaded-{{$i}}" disabled />Downloaded
                                        </div>

                                    </div>
                                @endforeach
                            </div><!-- /.box-body -->
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
                            <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}' class='btn btn-default'><i
                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                            @endif
                            @endif
                        </div>
                    </div>


                </div><!-- /.box-footer-->

            </form>

        </div>
    </div>

</div>
@endsection