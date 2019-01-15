<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;
use Route;
use Illuminate\Http\Request as DRequest;
use Illuminate\Support\Facades\Storage;

	class AdminSyaratKualifikasiController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama_tender";
			$this->limit = "10";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "tender";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nama Tender","name"=>"nama_tender"];
			$this->col[] = ["label"=>"Jadwal Tender","name"=>"jadwal_pengumuman_pemenang"];
			$this->col[] = ["label"=>"Status Dokumen","name"=>"status_kelengkapan"];
			$this->col[] = ["label"=>"Progress","name"=>"progress_kelengkapan","callback_php"=>'$row->progress_kelengkapan."%"'];
			$this->col[] = ["label"=>"Status Verifikasi","name"=>"status_verifikasi"];
			$this->col[] = ["label"=>"Tanggal Terkirim","name"=>"tanggal_terkirim"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nama Tender','name'=>'nama_tender','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'tender,nama'];
			//$this->form[] = ['label'=>'Pemberi Tender','name'=>'pemberi_tender','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Jadwal Tender','name'=>'jadwal_tender','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status Dokument','name'=>'status_dokument','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status Kelengkapan','name'=>'status_kelengkapan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tanggal Terkirim','name'=>'tanggal_terkirim','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Progress','name'=>'progress','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
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
	        $this->addaction = array(['label'=>'Print','url'=>'syarat_kualifikasi/cetak/[id]']);


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
				$(function(){
					$('.clickcetak').click(function(){
						$('#downloaded-'+$(this).data('cetak')).attr('checked',true);
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


        public function getEdit($id)
        {
            $this->cbLoader();
            $data = [];
            $data['row'] = DB::table($this->table)->where($this->primary_key, $id)->first();
			$data['surat'] = DB::table('tender_surat_korespondensi')
			->select('tender_surat_korespondensi.id as idsuratk', 'name', 'surat_korespondensi', 'surat_id', 'tender_id')
			->leftJoin('surat_korespondensi', 'surat_korespondensi.id', '=', 'surat_id')
			->where('tender_id',$id)->get();
			$data['tender_id'] = $id;
			$data['message'] = $message;

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

            $this->cbView('syaratkualifikasi.custom_add', $data);
        }

		public function getCetak($id){
            $data['page_menu'] = 'Cetak Dokumen';
			$data['page_title'] = 'Cetak Dokumen';
			$data['cetak'] = DB::table('tender_syarat_kualifikasi')
				->where('tender_syarat_kualifikasi.tender_id',$id)
				->where(function($query){
					$query->orWhere('master_syarat_kualifikasi.file_upload','<>','');
					$query->orWhere('master_syarat_kualifikasi.is_dokumen',1);
					$query->orWhere('master_syarat_kualifikasi_detail.field_type',64);
					return $query;
				})
				->leftJoin(
					'tender_syarat_kualifikasi_detail',
					'tender_syarat_kualifikasi_detail.tender_syarat_kualifikasi_id',
					'=',
					'tender_syarat_kualifikasi.id'
				)
				->leftJoin(
					'master_syarat_kualifikasi_detail',
					'master_syarat_kualifikasi_detail.id',
					'=',
					'tender_syarat_kualifikasi_detail.master_syarat_kualifikasi_detail_id'
				)
				->leftJoin(
					'master_syarat_kualifikasi',
					'master_syarat_kualifikasi.id',
					'=',
					'tender_syarat_kualifikasi.master_syarat_kualifikasi_id'
				)
				->select(
					DB::raw('
						CASE WHEN master_syarat_kualifikasi.file_upload<>""
						THEN master_syarat_kualifikasi.nama
						WHEN master_syarat_kualifikasi_detail.field_name<>""
						THEN CONCAT(master_syarat_kualifikasi.nama," - ",master_syarat_kualifikasi_detail.field_name)
						ELSE master_syarat_kualifikasi.nama
						END AS nama
					'),
					DB::raw('
						CASE WHEN master_syarat_kualifikasi.file_upload<>""
						THEN master_syarat_kualifikasi.file_upload
						WHEN master_syarat_kualifikasi_detail.field_name<>""
						THEN CONCAT("uploads/tender/details/",tender_syarat_kualifikasi_detail.value)
						ELSE tender_syarat_kualifikasi.value
						END AS value
					')
				)
				->orderBy('tender_syarat_kualifikasi.sequence', 'ASC')
				->orderBy('tender_syarat_kualifikasi_detail.sequence','ASC')
				->get();

			$data['id'] = $id;
			$this->cbView('syaratkualifikasi.cetak', $data);
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
					//'surat_korespondensi' => 'required',
				];
				if($request->validate($rules)){
					//echo "tes2";die();
					$t_id = $request->input('tender_id');
					$s_id = $request->input('surat_id');
					$s_k = $request->file('surat_korespondesi');


					foreach($s_k as $i=>$s){
						$cek = DB::table($tableName)->where([['tender_id','=', $t_id],['surat_id','=', $i]])->exists();
						if($cek){
							$val = DB::table($tableName)->where([['tender_id','=', $t_id],['surat_id','=', $i]])->first();
							if($val->surat_korespondensi !== null){
								storage::delete($val->surat_korespondensi);
							}

							$filename = time().$s_k[$i]->getClientOriginalName();
	    					$path = Storage::putFileAs('uploads/'.$t_id, $s_k[$i], $filename);

							$update = DB::table($tableName)
							->where([['tender_id','=', $t_id],['surat_id','=', $i]])
							->update(['surat_korespondensi'=>$path]);
						}
					}

					//if($query){
						return redirect('admin/syarat_kualifikasi');
					//}
				}else{
					return redirect()->route('edit',['id'=>$_GET['id'], 'message'=> 'Gagal Upload Surat Korespondensi']);
				}
			}
		}

	}
