<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Route;
	use Illuminate\Http\Request as DRequest;
	use Illuminate\View\View;

	class AdminTenagaKerjaController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama";
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
			$this->table = "tenaga_kerja";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nama","name"=>"nama"];
			//$this->col[] = ["label"=>"Jabatan","name"=>"jabatan"];
			$this->col[] = ["label"=>"Alamat","name"=>"jabatan"];
            $this->col[] = ["label"=>"Tanggal Lahir","name"=>"tanggal_lahir"];
            $this->col[] = ['label'=>'Tempat Lahir','name'=>'tempat_lahir',"visible"=>false];
			$this->col[] = ["label"=>"Pendidikan","name"=>"pendidikan_formal"];
			$this->col[] = ["label"=>"Lama Pengalaman Kerja","name"=>"lama_pengalaman_kerja"];
            $this->col[] = ["label"=>"Tahun Ijazah","name"=>"tahun_ijazah"];
            $this->col[] = ['label'=>'No Ktp','name'=>'no_ktp','visible'=>false];
            $this->col[] = ['label'=>'No Npwp','name'=>'no_npwp',"visible"=>false];
            $this->col[] = ['label'=>'Teknik / None Teknik','name'=>'teknik_id','join'=>'enumeration,value',"visible"=>false];
			$this->col[] = ['label'=>'Strata','name'=>'strata_id','join'=>'enumeration,value',"visible"=>false];
			$this->col[] = ['label'=>'Jurusan','name'=>'jurusan',"visible"=>false];
			$this->col[] = ['label'=>'Institusi','name'=>'institusi',"visible"=>false];
			$this->col[] = ['label'=>'Pendidikan Non Formal','name'=>'pendidikan_non_formal',"visible"=>false];
			$this->col[] = ['label'=>'Status Kepegawaian','name'=>'status_kepegawaian',"visible"=>false];
			$this->col[] = ['label'=>'Sertifikat Training','name'=>'sertifikat_training'];
			$this->col[] = ['label'=>'No Sertifikat','name'=>'no_sertifikat',"visible"=>false];
			$this->col[] = ['label'=>'TKDN/PTSI','name'=>'tkdn_ptsi'];
			$this->col[] = ['label'=>'Nomor Sertifikat TKDN Migas','name'=>'no_sertifikat_tkdn_migas'];
			$this->col[] = ['label'=>'Tanggal Sertifikat TKDN Migas','name'=>'tgl_sertifikat_tkdn_migas'];
			$this->col[] = ['label'=>'Masa Berlaku Sertifikat TKDN Migas','name'=>'masa_berlaku_tkdn_migas'];
			$this->col[] = ['label'=>'SKA/Brevet','name'=>'ska'];
			$this->col[] = ['label'=>'Nomor SKA/Brevet','name'=>'no_ska'];
			$this->col[] = ['label'=>'Tanggal SKA/Brevet','name'=>'tgl_ska'];
			$this->col[] = ['label'=>'Masa Berlaku SKA/Brevet','name'=>'masa_berlaku_ska'];
			$this->col[] = ['label'=>'Asosiasi','name'=>'asosiasi'];
			$this->col[] = ['label'=>'Referensi','name'=>'referensi'];
			$this->col[] = ['label'=>'KTP','name'=>'ktp',"visible"=>false];
			$this->col[] = ['label'=>'KTP','name'=>'npwp',"visible"=>false];
			$this->col[] = ['label'=>'KTP','name'=>'bukti_pajak',"visible"=>false];
			$this->col[] = ['label'=>'Attachment','callback'=>function($row){
				$datas['row'] = $row;
				$datas['sertifikat'] = DB::table('tenaga_kerja_sertifikat')->where('tenaga_kerja_id',$row->id)->get();
				return View('tenagakerja.attachment', $datas);
			}];

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nama','name'=>'nama','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			//$this->form[] = ['label'=>'Jabatan','name'=>'jabatan','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jabatan','name'=>'jabatan','type'=>'textarea','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tempat Lahir','name'=>'tempat_lahir','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tanggal Lahir','name'=>'tanggal_lahir','type'=>'date','validation'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Ktp','name'=>'no_ktp','type'=>'number','validation'=>'required|digits:16','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'KTP','name'=>'ktp','type'=>'upload','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Npwp','name'=>'no_npwp','type'=>'text','validation'=>'digits:15','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'NPWP','name'=>'npwp','type'=>'upload','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Bukti Pajak','name'=>'bukti_pajak','type'=>'upload','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pendidikan Formal','name'=>'pendidikan_formal','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Lama Pengalaman Kerja','name'=>'lama_pengalaman_kerja','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tahun Ijazah','name'=>'tahun_ijazah','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Bukti Ijasah','name'=>'bukti_ijasah','type'=>'upload','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Teknik / None Teknik','name'=>'teknik_id','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key`=\'Teknik\''];
			$this->form[] = ['label'=>'Strata','name'=>'strata_id','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key`=\'Strata\''];
			$this->form[] = ['label'=>'Jurusan','name'=>'jurusan','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Institusi','name'=>'institusi','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pendidikan Non Formal','name'=>'pendidikan_non_formal','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status Kepegawaian','name'=>'status_kepegawaian','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sertifikat','name'=>'sertifikat','type'=>'upload','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sertifikat Training','name'=>'sertifikat_training','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Sertifikat','name'=>'no_sertifikat','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Sertifikat TKDN Migas','name'=>'no_sertifikat_tkdn_migas','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tanggal Sertifikat TKDN Migas','name'=>'tgl_sertifikat_tkdn_migas','type'=>'date','validation'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Masa Berlaku TKDN Migas','name'=>'masa_berlaku_tkdn_migas','type'=>'date','validation'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'SKA/Brevet','name'=>'ska','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No SKA/Brevet','name'=>'no_ska','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tanggal SKA/Brevet','name'=>'tgl_ska','type'=>'date','validation'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Masa Berlaku SKA/Brevet','name'=>'masa_berlaku_ska','type'=>'date','validation'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Asosiasi','name'=>'asosiasi','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Referensi','name'=>'referensi','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];

			# END FORM DO NOT REMOVE THIS LINE

			$columns[] = ['label'=>'Sertifikat','name'=>'sertifikat','type'=>'upload'];
			$this->form[] = ['label'=>'Sertifikat Detail','name'=>'tenaga_kerja_sertifikat','type'=>'child','columns'=>$columns,'table'=>'tenaga_kerja_sertifikat','foreign_key'=>'tenaga_kerja_id'];

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nama','name'=>'nama','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			//$this->form[] = ['label'=>'Jabatan','name'=>'jabatan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tempat Lahir','name'=>'tempat_lahir','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tanggal Lahir','name'=>'tanggal_lahir','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'No Ktp','name'=>'no_ktp','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'No Npwp','name'=>'no_npwp','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pendidikan Formal','name'=>'pendidikan_formal','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Lama Pengalaman Kerja','name'=>'lama_pengalaman_kerja','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tahun Ijazah','name'=>'tahun_ijazah','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Teknik / None Teknik','name'=>'teknik_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key`=\'Teknik\''];
			//$this->form[] = ['label'=>'Strata','name'=>'strata_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,id','datatable_where'=>'`key`=\'Strata\''];
			//$this->form[] = ['label'=>'Jurusan','name'=>'jurusan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Institusi','name'=>'institusi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pendidikan Non Formal','name'=>'pendidikan_non_formal','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status Kepegawaian','name'=>'status_kepegawaian','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sertifikat Training','name'=>'sertifikat_training','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'No Sertifikat','name'=>'no_sertifikat','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
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
	        $this->alert        = array();



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
				$(document).on('click','#btn-add-table-sertifikatdetail', function(e){
					e.preventDefault();
					if($('.sertifikat')){
						var count = $('.sertifikat').length;
						if(count >= 15){
							$('#btn-add-table-sertifikatdetail').attr('disabled');
							alert('Jumlah Maksimal Sertifikat yang Dapat Di Upload Hanya 15.');
						}else{
							$('#btn-add-table-sertifikatdetail').removeAttr('disabled');
						}
					}
				});

				function getAttachmentFile(id){
					//alert($('#select-attachment-'+id).val());
					var val = $('#select-attachment-'+id).val();
					$('#modal-trigger-'+id).attr('data-target','#'+val+'-'+id);
				}
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
	        $this->style_css = NULL;



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
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here

	    }


	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate query of index result
	    | ----------------------------------------------------------------------
	    | @query = current sql query
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate row of index table html
	    | ----------------------------------------------------------------------
	    |
	    */
	    public function hook_row_index($column_index,&$column_value) {
	    	//Your code here
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before add data is execute
	    | ----------------------------------------------------------------------
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {
			//Your code here
			$postdata["created_by"] = CRUDBooster::myId();

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {
	        //Your code here
			$this->return_url=url('/admin/tenaga_kerja/step2?id='.$id);
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before update data is execute
	    | ----------------------------------------------------------------------
	    | @postdata = input post data
	    | @id       = current id
	    |
	    */
	    public function hook_before_edit(&$postdata,$id) {
			//Your code here
			$postdata["updated_by"] = CRUDBooster::myId();

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_edit($id) {
	        //Your code here
			$this->return_url=url('/admin/tenaga_kerja/step2?id='.$id);
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_before_delete($id) {
	        //Your code here
			DB::table('tenaga_kerja_pengalaman')->where('tenaga_kerja_id', $id)->delete();
			DB::table('tenaga_kerja_uraian')->where('tenaga_kerja_id', $id)->delete();
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_delete($id) {
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
	        $this->cbView('tenagakerja.custom_add', $data);
	    }

		public function getEdit($id)
	    {
	        $this->cbLoader();
	        $data = [];
	        $data['row'] = DB::table($this->table)->where($this->primary_key, $id)->first();
			$data['data_child'] = DB::table('tenaga_kerja_sertifikat')->where('tenaga_kerja_id', $id)->get();
			//print_r($data['form']);die();
			// $data['row'] = DB::table($this->table)
			// ->join('tenaga_kerja_sertifikat', 'tenaga_kerja.id', '=', 'tenaga_kerja_sertifikat.tenaga_kerja_id')
			// ->where('tenaga_kerja.id', $id)->get();

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

	        $this->cbView('tenagakerja.custom_add', $data);
	    }

	    public function getStep2(DRequest $request)
	    {
	        if (!CRUDBooster::isCreate() && $this->global_privilege == false || $this->button_add == false) {
	            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
	        }

	        $data = [];
	        $data['page_title'] = trans("crudbooster.edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name]);
	        $data['page_menu'] = Route::getCurrentRoute()->getActionName();
	        $data['command'] = 'edit';
			$data['pengalaman_kerja'] = DB::table('pengalaman_uraian_kerja')->get();
			$data['tenaga_kerja_id'] = $_GET['id'];
			$tableName = 'tenaga_kerja_pengalaman';
			//ketika edit
			$data['checked_val'] = [];
			$cekData = DB::table($tableName)->where('tenaga_kerja_id', $_GET['id'])->exists();
			if($cekData){
				$check_val = DB::table($tableName)->select('pengalaman_id')->where('tenaga_kerja_id', $_GET['id'])->get();
				$arr_checked = [];
				foreach($check_val as $c){
					$arr_checked[] = $c->pengalaman_id;
				}
				$data['checked_val'] = $arr_checked;
				//print_r($data['checked_val']);die();
			}

			//if($request->input('tenaga_kerja_id')){
			if($request->input('submit')){
				//print_r($request->input());die();
				$rules = [
				    'tenaga_kerja_id' => 'required',
				    'pengalaman_id' => 'required',
				];

				if($request->validate($rules)){
					$tk_id = $request->input('tenaga_kerja_id');
					$p_id = $request->input('pengalaman_id');

					$cek = DB::table($tableName)->where('tenaga_kerja_id', $tk_id)->exists();
					if($cek){
						$query = DB::table($tableName)->where('tenaga_kerja_id', $tk_id)->delete();
					}

					foreach($p_id as $p){
						$value=[
						 	'tenaga_kerja_id' => $tk_id,
							'pengalaman_id' => $p
						];
						$query = DB::table($tableName)->insert($value);
					}

					if($query){
						return redirect('admin/tenaga_kerja/step3?id='.$tk_id);
					}
				}
			}

			    //Please use cbView method instead view method from laravel
	        $this->cbView('tenagakerja.custom_add_step2', $data);
	    }

	    public function getStep3(DRequest $request)
	    {
	        if (!CRUDBooster::isCreate() && $this->global_privilege == false || $this->button_add == false) {
	            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
	        }

	        $data = [];
	        $data['page_title'] = trans("crudbooster.edit_data_page_title", ['module' => CRUDBooster::getCurrentModule()->name]);
	        $data['page_menu'] = Route::getCurrentRoute()->getActionName();
	        $data['command'] = 'edit';
			$tableName = 'tenaga_kerja_uraian';

			$data['uraian_tugas'] = DB::table('daftar_uraian_tugas')->get();
			$data['tenaga_kerja_id'] = $_GET['id'];
			//ketika edit
			$data['checked_val'] = [];
			$cekData = DB::table($tableName)->where('tenaga_kerja_id', $_GET['id'])->exists();
			if($cekData){
				$check_val = DB::table($tableName)->select('uraian_id')->where('tenaga_kerja_id', $_GET['id'])->get();
				$arr_checked = [];
				foreach($check_val as $c){
					$arr_checked[] = $c->uraian_id;
				}
				$data['checked_val'] = $arr_checked;
				//print_r($data['checked_val']);die();
			}

			//if($request->input('tenaga_kerja_id')){
			if($request->input('submit')){
				$rules = [
				    'tenaga_kerja_id' => 'required',
				    'uraian_id' => 'required',
				];

				if($request->validate($rules)){
					$tk_id = $request->input('tenaga_kerja_id');
					$p_id = $request->input('uraian_id');

					$cek = DB::table($tableName)->where('tenaga_kerja_id', $tk_id)->exists();
					if($cek){
						$query = DB::table($tableName)->where('tenaga_kerja_id', $tk_id)->delete();
					}

					foreach($p_id as $p){
						$value=[
						 	'tenaga_kerja_id' => $tk_id,
							'uraian_id' => $p
						];
						$query = DB::table($tableName)->insert($value);
					}

					if($query){
						return redirect('admin/tenaga_kerja');
					}
				}
			}
	        //Please use cbView method instead view method from laravel
	        $this->cbView('tenagakerja.custom_add_step3', $data);
	    }

	}
