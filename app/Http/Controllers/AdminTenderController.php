<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;
use Route;
use Illuminate\Http\Request as DRequest;
use Illuminate\Support\Facades\Storage;

class AdminTenderController extends \crocodicstudio\crudbooster\controllers\CBController
{
    public function cbInit()
    {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "nama_tender";
        $this->limit = "10";
        $this->orderby = "id,desc";
        $this->global_privilege = false;
        $this->button_table_action = true;
        $this->button_bulk_action = true;
        $this->button_action_style = "button_icon";
        $this->button_add = true;
        $this->button_edit = true;
        $this->button_delete = true;
        $this->button_detail = false;
        $this->button_show = false;
        $this->button_filter = true;
        $this->button_import = true;
        $this->button_export = true;
        $this->table = "tender";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"No Tender","name"=>"no_tender",'callback'=>function($row){
				if($this->countExpire($row->tanggal_terkirim) <= 2){
					return $row->id.'<br><span class="alert-danger">Due Date < dari 2 hari</span>';
				}else{
					return $row->id;
				}
			}];
			$this->col[] = ["label"=>"Nama Tender","name"=>"nama_tender"];
			$this->col[] = ["label"=>"Nama Pengguna Jasa","name"=>"nama_pengguna_jasa"];
			$this->col[] = ["label"=>"Kategori Pengguna Jasa","name"=>"pengguna_jasa_id","join"=>"enumeration,value"];
			$this->col[] = ["label"=>"Bidang / Sub Bidang","name"=>"pengguna_jasa_id","join"=>"enumeration,value"];
            $this->col[] = ["label"=>"Nilai Tender", "name"=>"nilai_pagu", "callback_php" => 'Rp.number_format($row->nilai_pagu,0,".",",")'];
            
			$this->col[] = ["label"=>"Jadwal Tender", "name"=>"jadwal_pengumuman_pemenang"];
			$this->col[] = ["label"=>"Metode Kualifikasi","name"=>"metode_kualifikasi_id","join"=>"enumeration,value"];
			$this->col[] = ["label"=>"AO Name","name"=>"ao_name",'join'=>'enumeration,value'];
			$this->col[] = ["label"=>"Status","name"=>"hasil_tender_text",'join'=>'enumeration,value'];
			$this->col[] = ['label'=>'Update Status','callback'=>function($row){
				$datas['row'] = $row;
				$datas['status'] = DB::table('enumeration')->where('key','HasilTender')->get();
				return View('tender.status', $datas);
			}];

            //$this->col[] = ["label"=>"Bidang / Sub Bidang","name"=>"sub_bidang"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nama Tender','name'=>'nama_tender','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Tender','name'=>'no_tender','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Berita Acara','name'=>'no_berita_acara','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nama Pengguna Jasa','name'=>'nama_pengguna_jasa','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kategori Pengguna Jasa','name'=>'pengguna_jasa_id','type'=>'radio','validation'=>'required','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key` = \'KategoriPenggunaJasa\''];
            $this->form[] = ['label'=>'Bidang / Sub Bidang','name'=>'sub_bidang','type'=>'radio','validation'=>'required','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key` = \'SubBidang\''];
			$this->form[] = ['label'=>'Metode Kualifikasi','name'=>'metode_kualifikasi_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`Key` = \'MetodeKualifikasi\''];
			$this->form[] = ['label'=>'No Kualifikasi','name'=>'no_kualifikasi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Dokumen Tender Text','name'=>'dokumen_tender_text','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            
            $columns_tender_file[] = ['label'=>'File','name'=>'dokumen_tender_file','type'=>'upload'];
			$this->form[] = ['label'=>'Tender File','name'=>'dokumen_tender_file','type'=>'child','columns'=>$columns_tender_file,'table'=>'tender_file','foreign_key'=>'tender_id'];

			$this->form[] = ['label'=>'Ao Name','name'=>'ao_name','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key`=\'AOName\''];
			$this->form[] = ['label'=>'Email Ao Name','name'=>'email_ao_name','type'=>'email','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nama Penandatangan Surat','name'=>'signing_name','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jabatan Penandatangan Surat','name'=>'signing_jabatan','type'=>'text','width'=>'col-sm-10'];
            
            $this->form[] = ['label'=>'Nilai Pagu','name'=>'nilai_pagu','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Nilai Hps','name'=>'nilai_hps','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Metode Dokumen','name'=>'metode_dokumen_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`Key` = \'MetodeDokumen\''];
			$this->form[] = ['label'=>'Metode Evaluasi','name'=>'metode_evaluasi_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`Key` = \'MetodeEvaluasi\''];

            $columns_lainnya[] = ['label'=>'Lainnya','name'=>'lainnya','type'=>'text'];
			$this->form[] = ['label'=>'Lainnya','name'=>'lainnya','type'=>'child','columns'=>$columns_lainnya,'table'=>'tender_lainnya','foreign_key'=>'tender_id'];

            $this->form[] = ['label'=>'Status Tender','name'=>'hasil_tender_text','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key` = \'HasilTender\''];
            $this->form[] = ['label'=>'Pengumuman Hasil Tender','name'=>'pengumuman_hasil_tender','type'=>'upload','width'=>'col-sm-10'];

            # END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label' => 'Nama Tender', 'name' => 'nama_tender', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'No Tender', 'name' => 'no_tender', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'No Berita Acara', 'name' => 'no_berita_acara', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Pengguna Jasa', 'name' => 'pengguna_jasa_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'enumeration,value', 'datatable_where' => '`key` = \'KategoriPenggunaJasa\''];
			//$this->form[] = ['label' => 'Metode Kualifikasi', 'name' => 'metode_kualifikasi_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'enumeration,value', 'datatable_where' => '`Key` = \'MetodeKualifikasi\''];
			//$this->form[] = ['label' => 'No Kualifikasi', 'name' => 'no_kualifikasi', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Dokumen Tender Text', 'name' => 'dokumen_tender_text', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Dokument Tender File', 'name' => 'dokument_tender_file', 'type' => 'upload', 'validation' => 'required', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Nilai Pagu', 'name' => 'nilai_pagu', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Nilai Hps', 'name' => 'nilai_hps', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Metode Dokumen', 'name' => 'metode_dokumen_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'enumeration,value', 'datatable_where' => '`Key` = \'MetodeDokumen\''];
			//$this->form[] = ['label' => 'Metode Evaluasi', 'name' => 'metode_evaluasi_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'enumeration,value', 'datatable_where' => '`Key` = \'MetodeEvaluasi\''];
			//$this->form[] = ['label' => 'Bidbond Text', 'name' => 'bidbond_text', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Bidbond File', 'name' => 'bidbond_file', 'type' => 'upload', 'validation' => 'required', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Hasil Tender Text', 'name' => 'hasil_tender_text', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Hasil Tender File', 'name' => 'hasil_tender_file', 'type' => 'upload', 'validation' => 'required', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Ao Name', 'name' => 'ao_name', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Lainnya', 'name' => 'lainnya', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Jadwal Upload Dokumen Prakualifikasi', 'name' => 'jadwal_upload_dokumen_prakualifikasi', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Jadwal Pembuktian Prakualifikasi', 'name' => 'jadwal_pembuktian_prakualifikasi', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Jadwal Download Dokumen Pemilihan', 'name' => 'jadwal_download_dokumen_pemilihan', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Jadwal Pemberian Penjelasan', 'name' => 'jadwal_pemberian_penjelasan', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Jadwal Upload Dokumen Penawaran', 'name' => 'jadwal_upload_dokumen_penawaran', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
			//$this->form[] = ['label' => 'Jadwal Pengumuman Pemenang', 'name' => 'jadwal_pengumuman_pemenang', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
			# OLD END FORM

			/*
            | ----------------------------------------------------------------------
            | Sub Module
            | ----------------------------------------------------------------------
            | @label          = Label of action
            | @path           = Path of sub module
            | @foreign_key 	  = foreign key of sub table/module
            | @button_color   = Bootstrap Class (primary,success,warning,danger)
            | @button_icon    = Font Awesome Class
            | @parent_columns = Sparate with comma, e.g : name,created_at
            |
         */
        $this->sub_module = array();


            /*
            | ----------------------------------------------------------------------
            | Add More Action Button / Menu
            | ----------------------------------------------------------------------
            | @label       = Label of action
            | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
            | @icon        = Font awesome class icon. e.g : fa fa-bars
            | @color 	   = Default is primary. (primary, warning, succecss, info)
            | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
            |
         */
        $this->addaction = array();


            /*
            | ----------------------------------------------------------------------
            | Add More Button Selected
            | ----------------------------------------------------------------------
            | @label       = Label of action
            | @icon 	   = Icon from fontawesome
            | @name 	   = Name of button
            | Then about the action, you should code at actionButtonSelected method
            |
         */
        $this->button_selected = array();


            /*
            | ----------------------------------------------------------------------
            | Add alert message to this module at overheader
            | ----------------------------------------------------------------------
            | @message = Text of message
            | @type    = warning,success,danger,info
            |
         */
        $this->alert = array();



            /*
            | ----------------------------------------------------------------------
            | Add more button to header button
            | ----------------------------------------------------------------------
            | @label = Name of button
            | @url   = URL Target
            | @icon  = Icon from Awesome.
            |
         */
        $this->index_button = array();



            /*
            | ----------------------------------------------------------------------
            | Customize Table Row Color
            | ----------------------------------------------------------------------
            | @condition = If condition. You may use field alias. E.g : [id] == 1
            | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.
            |
         */
        $this->table_row_color = array();


            /*
            | ----------------------------------------------------------------------
            | You may use this bellow array to add statistic at dashboard
            | ----------------------------------------------------------------------
            | @label, @count, @icon, @color
            |
         */
        $this->index_statistic = array();



            /*
            | ----------------------------------------------------------------------
            | Add javascript at body
            | ----------------------------------------------------------------------
            | javascript code in the variable
            | $this->script_js = "function() { ... }";
            |
         */
        $this->script_js = "
            function submitform(id, status, status_text)
            {
                $.get('/admin/tender/updatestatus?tender_id='+id+'&status='+status+'&status_text='+status_text, function(rs){
                    if(rs==1){
                        alert('Berhasil Diubah');
                    }
                    window.location.reload();
                });
            }

            $(function(){
                $('#form-group-nilai_pagu').hide();
                $('#form-group-nilai_hps').hide();
                $('#form-group-metode_dokumen_id').hide();
                $('#form-group-metode_evaluasi_id').hide();
                $('#form-group-lainnya').hide();

                $('[name=hasil_tender_text]').change(function(){
                    if($(this).val()==37){
                        $('#form-group-nilai_pagu').hide();
                        $('#form-group-nilai_hps').hide();
                        $('#form-group-metode_dokumen_id').hide();
                        $('#form-group-metode_evaluasi_id').hide();
                        $('#form-group-lainnya').hide();
                    }else{
                        $('#form-group-nilai_pagu').show();
                        $('#form-group-nilai_hps').show();
                        $('#form-group-metode_dokumen_id').show();
                        $('#form-group-metode_evaluasi_id').show();
                        $('#form-group-lainnya').show();
                    }
                });
            });
        ";


            /*
            | ----------------------------------------------------------------------
            | Include HTML Code before index table
            | ----------------------------------------------------------------------
            | html code to display it before index table
            | $this->pre_index_html = "<p>test</p>";
            |
         */
        $this->pre_index_html = null;



            /*
            | ----------------------------------------------------------------------
            | Include HTML Code after index table
            | ----------------------------------------------------------------------
            | html code to display it after index table
            | $this->post_index_html = "<p>test</p>";
            |
         */
        $this->post_index_html = null;



            /*
            | ----------------------------------------------------------------------
            | Include Javascript File
            | ----------------------------------------------------------------------
            | URL of your javascript each array
            | $this->load_js[] = asset("myfile.js");
            |
         */
        $this->load_js = array();



            /*
            | ----------------------------------------------------------------------
            | Add css style at body
            | ----------------------------------------------------------------------
            | css code in the variable
            | $this->style_css = ".style{....}";
            |
         */
        $this->style_css = null;



            /*
            | ----------------------------------------------------------------------
            | Include css File
            | ----------------------------------------------------------------------
            | URL of your css each array
            | $this->load_css[] = asset("myfile.css");
            |
         */
        $this->load_css = array();
    }


        /*
        | ----------------------------------------------------------------------
        | Hook for button selected
        | ----------------------------------------------------------------------
        | @id_selected = the id selected
        | @button_name = the name of button
        |
     */
    public function actionButtonSelected($id_selected, $button_name)
    {
            //Your code here
    }

    public function getupdatestatus(DRequest $request)
    {
        $rs = DB::table('tender')->where('id', $request->tender_id)->update(['hasil_tender_text'=>$request->status]);
        return $rs;
    }

    public function getSurat(DRequest $request)
    {
        //print_r($data);die();
        $data = DB::table('tender')
            ->where('tender.id', $request->id)
            ->join('enumeration','enumeration.id','=','tender.sub_bidang')
            ->get();

        $direktur = DB::table('pengurus_badan_usaha')
            ->where('jabatan', 'Direktur')
            ->get();

        echo '<pre>';
        print_r($data);
        print_r($direktur);
        echo '</pre>';
        exit();
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(__DIR__.'/../../../storage/app/'.$request->file);
        $templateProcessor->setValue('signing_name', $data[0]->signing_name);
        $templateProcessor->setValue('signing_jabatan', $data[0]->signing_jabatan);
        $templateProcessor->setValue('sub_bidang', $data[0]->value);
        $templateProcessor->setValue('email_ao_name', $data[0]->email_ao_name);
        $day = [1 => "Senin", 2 => "Selasa", 3 => "Rabu", 4 => "Kamis", 5 => "Jum'at", 6 => "Sabtu", 7 => "Minggu"];
        $templateProcessor->setValue('hari', $day[date("N")]);
        $templateProcessor->setValue('date_now', date("d F, Y"));

        $templateProcessor->setValue('nama_direktur', $direktur[0]->nama);
        $templateProcessor->setValue('jabatan_direktur', 'Direktur');

        $filename = $data[0]->nama_tender.'.docx';
        $templateProcessor->saveAs(__DIR__.'/../../../public/'.$filename);
        header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
        header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
        header ( "Cache-Control: no-cache, must-revalidate" );
        header ( "Pragma: no-cache" );
        header ('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document;');
        header ( "Content-Disposition: attachment; filename=".$filename);
        readfile($filename);
        //return redirect('admin/tenaga_kerja');
    }


        /*
        | ----------------------------------------------------------------------
        | Hook for manipulate query of index result
        | ----------------------------------------------------------------------
        | @query = current sql query
        |
     */
    public function hook_query_index(&$query)
    {
        $query->orderBy('tanggal_terkirim','desc');
    }

        /*
        | ----------------------------------------------------------------------
        | Hook for manipulate row of index table html
        | ----------------------------------------------------------------------
        |
     */
    public function hook_row_index($column_index, &$column_value)
    {
            //Your code here
    }

        /*
        | ----------------------------------------------------------------------
        | Hook for manipulate data input before add data is execute
        | ----------------------------------------------------------------------
        | @arr
        |
     */
    public function hook_before_add(&$postdata)
    {
            //Your code here
    }

        /*
        | ----------------------------------------------------------------------
        | Hook for execute command after add public static function called
        | ----------------------------------------------------------------------
        | @id = last insert id
        |
     */
    public function hook_after_add($id)
    {
            $this->return_url=url('/admin/tender/step2?id='.$id);
    }

        /*
        | ----------------------------------------------------------------------
        | Hook for manipulate data input before update data is execute
        | ----------------------------------------------------------------------
        | @postdata = input post data
        | @id       = current id
        |
     */
    public function hook_before_edit(&$postdata, $id)
    {
            //Your code here
    }

        /*
        | ----------------------------------------------------------------------
        | Hook for execute command after edit public static function called
        | ----------------------------------------------------------------------
        | @id       = current id
        |
     */
    public function hook_after_edit($id)
    {
        $this->return_url=url('/admin/tender/step2?id='.$id);
    }

        /*
        | ----------------------------------------------------------------------
        | Hook for execute command before delete public static function called
        | ----------------------------------------------------------------------
        | @id       = current id
        |
     */
    public function hook_before_delete($id)
    {
            //Your code here
    }

        /*
        | ----------------------------------------------------------------------
        | Hook for execute command after delete public static function called
        | ----------------------------------------------------------------------
        | @id       = current id
        |
     */
    public function hook_after_delete($id)
    {
            //Your code here
    }



        //By the way, you can still create your own method in here... :)


    public function getAdd()
    {
            //Create an Auth
        if (!CRUDBooster::isCreate() && $this->global_privilege == false || $this->button_add == false) {
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
        }

        $data = [];
        $data['page_title'] = trans("crudbooster.add_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name]);
        $data['page_menu'] = Route::getCurrentRoute()->getActionName();
        $data['command'] = 'add';

            //Please use cbView method instead view method from laravel
        $this->cbView('tender.custom_add', $data);
    }

    public function getEdit($id)
    {
        $this->cbLoader();
        $data = [];
        $data['row'] = DB::table($this->table)->where($this->primary_key, $id)->first();

        if (! CRUDBooster::isRead() && $this->global_privilege == false || $this->button_edit == false) {
            CRUDBooster::insertLog(trans("crudbooster.log_try_edit", [
                'name' => $data['row']->{$this->title_field},
                'module' => CRUDBooster::getCurrentModule()->name,
            ]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $data['page_menu'] = Route::getCurrentRoute()->getActionName();
        $data['page_title'] = trans("crudbooster.edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name, 'name' => $data['row']->{$this->title_field}]);
        $data['command'] = 'edit';
        Session::put('current_row_id', $id);

        $this->cbView('tender.custom_add', $data);
    }

    public function getStep2()
    {
        if (!CRUDBooster::isCreate() && $this->global_privilege == false || $this->button_add == false) {
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
        }

        $data = [];
        $data['page_title'] = trans("crudbooster.edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name]);
        $data['page_menu'] = Route::getCurrentRoute()->getActionName();
        $data['command'] = 'edit';

            //Please use cbView method instead view method from laravel
        $this->cbView('tender.custom_add_step2', $data);
    }

    public function getStep3()
    {
        if (!CRUDBooster::isCreate() && $this->global_privilege == false || $this->button_add == false) {
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
        }

        $data = [];
        $data['page_title'] = trans("crudbooster.edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name]);
        $data['page_menu'] = Route::getCurrentRoute()->getActionName();
        $data['command'] = 'edit';

        //Please use cbView method instead view method from laravel
        $this->cbView('tender.custom_add_step3', $data);
    }

	public function getStep4(DRequest $request){
		if (!CRUDBooster::isCreate() && $this->global_privilege == false || $this->button_add == false) {
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
        }

        $data = [];
        $data['page_title'] = trans("crudbooster.edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name]);
        $data['page_menu'] = Route::getCurrentRoute()->getActionName();
        $data['command'] = 'edit';
        $data['list_surat'] = DB::table('surat_korespondensi')->get();
		$data['tender_id'] = $_GET['id'];
		//ketika edit
		$tableName = 'tender_surat_korespondensi';
		$data['checked_val'] = [];
        $cekData = DB::table($tableName)->where('tender_id', $_GET['id'])->exists();
		if($cekData){
			$check_val = DB::table($tableName)->where('tender_id', $_GET['id'])->get();
			$arr_checked = [];
			$arr_input = [];
			foreach($check_val as $c){
				$arr_checked[] = $c->surat_id;
				$arr_input[$c->surat_id] = $c->surat_korespondensi;
				$arr_seq[$c->surat_id] = $c->sequence;
			}
			$data['checked_val'] = $arr_checked;
			$data['arr_seq'] = $arr_seq;
			//print_r($data['arr_input']);die();
            foreach($data['list_surat'] as &$c){
                $c->seq = $arr_seq[$c->id];
            }

            $sorted = $data['list_surat']->sortBy(function ($a, $b){
                return !empty($a->seq) ? $a->seq : 9999;
            });
            $data['list_surat'] = $sorted->values()->all();
        } 

        $data['arr_input'] = $arr_input;

        //Please use cbView method instead view method from laravel
        $this->cbView('tender.custom_add_step4', $data);
	}

	public function postSave_surat(DRequest $request){
		$this->cbLoader();
        if (! CRUDBooster::isCreate() && $this->global_privilege == false) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_add_save', [
                'name' => Request::input($this->title_field),
                'module' => CRUDBooster::getCurrentModule()->name,
            ]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
        }
		$tableName = 'tender_surat_korespondensi';
		if($request->input('submit')){
			$rules = [
				'tender_id' => 'required',
                'surat_id' => 'required',
                'sequence' => 'required'
				//'surat_korespondensi' => 'required',
			];
			if($request->validate($rules)){
				//echo "tes2";die();
				$t_id = $request->input('tender_id');
				$s_id = $request->input('surat_id');
				$seq = $request->input('sequence');
				//$s_k = $request->file('surat_korespondesi');

                $insertedval = DB::table($tableName)->where([['tender_id','=', $t_id]])->get();
                foreach($insertedval as $val){
                    storage::delete($val->surat_korespondensi);
                }
                DB::table($tableName)->where([['tender_id','=', $t_id]])->delete();
        
                foreach($s_id as $i=>$s){
                    $value=[
                        'tender_id' => $t_id,
                        'surat_id' => $s,
                        'sequence' => $seq[$s]
                        //'surat_korespondensi' => $path
                    ];
                    $query = DB::table($tableName)->insert($value);
				}

				//if($query){
					return redirect('admin/tender');
				//}
			}
		}
	}

	public function countExpire($date){
		$date1 = date_create(date("Y-m-d"));
		$date2 = date_create($date);
		$diff = date_diff($date1,$date2);
		return $diff->format("%R%m%a");
	}
}
