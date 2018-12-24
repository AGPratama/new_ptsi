<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Route;

	class AdminPengalamanUraianKerjaController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama_pekerjaan";
			$this->limit = "20";
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
			$this->table = "pengalaman_uraian_kerja";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nama Pekerja","name"=>"nama_pekerjaan","join"=>"tenaga_kerja,nama"];
			$this->col[] = ["label"=>"Nama Perusahaan","name"=>"nama_perusahaan"];
			$this->col[] = ["label"=>"Tempat Lahir","name"=>"tempat_lahir"];
			$this->col[] = ["label"=>"Tanggal Lahir","name"=>"ttl"];
			$this->col[] = ["label"=>"Pendidikan Formal","name"=>"pendidikan_formal"];
			$this->col[] = ["label"=>"Penguasaan Bahasa","name"=>"penguasaan_bahasa"];
			$this->col[] = ["label"=>"Pendidikan Non Formal","name"=>"pendidikan_non_formal"];
			$this->col[] = ["label"=>"Posisi Yang Diusulkan","name"=>"posisi_yang_diusulkan"];
			$this->col[] = ['label'=>'Tahun','name'=>'tahun'];
			$this->col[] = ['label'=>'Nama Proyek','name'=>'nama_proyek'];
			$this->col[] = ['label'=>'Lokasi Proyek','name'=>'lokasi_proyek'];
			$this->col[] = ['label'=>'Pengguna Jasa','name'=>'pengguna_jasa_id'];
			$this->col[] = ['label'=>'Waktu Pelaksanaan Mulai','name'=>'waktu_pelaksanaan_start'];
			$this->col[] = ['label'=>'Waktu Pelaksanaan Selesai','name'=>'waktu_pelaksanaan_end'];
			$this->col[] = ["label"=>"Lama Pekerjaan","name"=>"lama_pekerjaan"];
			$this->col[] = ["label"=>"Posisi Penugasan","name"=>"uraian_tugas"];
			$this->col[] = ["label"=>"Uraian Pekerjaan","name"=>"uraian_tugas"];
			$this->col[] = ['label'=>'Status Kepegawaian','name'=>'status_kepegawaian'];
			$this->col[] = ['label'=>'Surat Referensi','name'=>'surat_referensi'];
			$this->col[] = ['label'=>'Generate CV','callback'=>function($row){
				$datas['row'] = $row;
				$datas['penggunajasa'] = DB::table('enumeration')->where('key','KategoriPenggunaJasa')->get();
				return View('tenagakerja.generatecv', $datas);
			}];

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nama Pekerja','name'=>'nama_pekerjaan','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10', 'datatable'=>'tenaga_kerja,nama'];
			$this->form[] = ['label'=>'Nama Perusahaan','name'=>'nama_perusahaan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'PT. Surveyor Indonesia'];
			$this->form[] = ['label'=>'Tanggal Lahir','name'=>'ttl','type'=>'date','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pendidikan Formal','name'=>'pendidikan_formal','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>'readonly'];
			$this->form[] = ['label'=>'Pendidikan Non Formal','name'=>'pendidikan_non_formal','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Penguasaan Bahasa','name'=>'penguasaan_bahasa','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'Baik'];
			$this->form[] = ['label'=>'Posisi Yang Diusulkan','name'=>'posisi_yang_diusulkan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sertifikat','name'=>'sertifikat','type'=>'textarea'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Nama Proyek','name'=>'pengalaman_perusahaan_id','type'=>'select', 'datatable' => 'pengalaman_perusahaan,nama_paket_perusahaan'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Tahun Proyek','name'=>'tahun','type'=>'text'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Lokasi Proyek','name'=>'lokasi_proyek','type'=>'text'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Pengguna Jasa','name'=>'nama_pengguna_jasa','type'=>'text'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Waktu Pelaksaan Mulai','name'=>'periode_kerja_dari','type'=>'date'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Waktu Pelaksaan Selesai','name'=>'periode_kerja_sampai','type'=>'date'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Durasi (bulan)','name'=>'durasi','type'=>'text'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Posisi Penugasan','name'=>'daftar_uraian_tugas_id','type'=>'select', 'datatable' => 'daftar_uraian_tugas,nama_posisi'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Posisi Penugasan Detail','name'=>'uraian_tugas','type'=>'text'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Status Kepegawaian','name'=>'status_kepegawaian','type'=>'text'];
			$columns_pengalaman_perusahaan[] = ['label'=>'Surat Referensi','name'=>'surat_referensi','type'=>'upload'];
			$this->form[] = ['label'=>'Pengalaman Kerja','name'=>'pengalaman_perusahaan','type'=>'child','columns'=>$columns_pengalaman_perusahaan,'table'=>'tenaga_kerja_pengalaman_perusahaan','foreign_key'=>'tenaga_kerja_id'];
			// $this->form[] = ['label'=>'Tahun','name'=>'tahun','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Nama Proyek','name'=>'nama_proyek','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Lokasi Proyek','name'=>'lokasi_proyek','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Pengguna Jasa','name'=>'pengguna_jasa_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value','datatable_where'=>'`key`=\'KategoriPenggunaJasa\''];
			// $this->form[] = ['label'=>'Status Kepegawaian','name'=>'status_kepegawaian','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Surat Referensi','name'=>'surat_referensi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Waktu Pelaksanaan Mulai','name'=>'waktu_pelaksanaan_start','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Waktu Pelaksanaan Selesai','name'=>'waktu_pelaksanaan_end','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Posisi Penugasan','name'=>'uraian_tugas','type'=>'textarea','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nama Pekerjaan','name'=>'nama_pekerjaan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nama Perusahaan','name'=>'nama_perusahaan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tanggal Lahir','name'=>'ttl','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pendidikan Formal','name'=>'pendidikan_formal','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pendidikan Non Formal','name'=>'pendidikan_non_formal','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Penguasaan Bahasa','name'=>'penguasaan_bahasa','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Posisi Yang Diusulkan','name'=>'posisi_yang_diusulkan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tahun','name'=>'tahun','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nama Proyek','name'=>'nama_proyek','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Lokasi Proyek','name'=>'lokasi_proyek','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pengguna Jasa Id','name'=>'pengguna_jasa_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'enumeration,value'];
			//$this->form[] = ['label'=>'Status Kepegawaian','name'=>'status_kepegawaian','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Surat Referensi','name'=>'surat_referensi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Waktu Pelaksanaan','name'=>'waktu_pelaksanaan','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
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
	        $this->script_js = "$(function(){
				$('[name=nama_pekerjaan').change(function(){
					self = $(this);
					$.ajax({
						url: '/api/tenaga_kerja?id='+self.val()
					}).done(function(msg){
						$('#ttl').val(msg.tanggal_lahir);
						$('#pendidikan_formal').val(msg.pendidikan_formal);
						$.ajax({
							url: '/api/pendidikan_non_formal?tenaga_kerja_id='+self.val()
						}).done(function(msg){
							html = '';
							msg.data.forEach((v,i)=>{
								if(v.nama!=null)
									html += '- ' + v.nama + '\\n';
							});
							$('#pendidikan_non_formal').html(html);
						});

						$.ajax({
							url: '/api/sertifikat?tenaga_kerja_id='+self.val()
						}).done(function(msg){
							html = '';
							msg.data.forEach((v,i)=>{
								if(v.nama_sertifikat!=null)
									html += '- ' + v.nama_sertifikat + '\\n';
							});
							$('#sertifikat').html(html);
						});
					});
				})	
				$('#pengalamankerjapengalaman_perusahaan_id').change(function(){
					$.ajax({
						url: '/api/pengalaman_perusahaan?id='+$(this).val()
					}).done(function(msg){
						$('#pengalamankerjalokasi_proyek').val(msg.lokasi_proyek);
						$('#pengalamankerjanama_pengguna_jasa').val(msg.nama_pengguna_jasa);
						from = new Date(msg.periode_kerja_dari);
						to = new Date(msg.periode_kerja_sampai);
						$('#pengalamankerjadurasi').val(to.getMonth() - from.getMonth() + (12 * (to.getFullYear() - from.getFullYear())));
						$('#pengalamankerjaperiode_kerja_dari').val(msg.periode_kerja_dari);
						$('#pengalamankerjaperiode_kerja_sampai').val(msg.periode_kerja_sampai);
						$('#pengalamankerjatahun').val(msg.tahun);
					});
				});

				$('#pengalamankerjadaftar_uraian_tugas_id').change(function(){
					$.ajax({
						url: '/api/daftar_uraian_tugas?id='+$(this).val()
					}).done(function(msg){
						$('#pengalamankerjauraian_tugas').val(msg.uraian_tugas);
					});
				});

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

				$('#select-sertifikat').on('change', function(){
					$('#modal-trigger-sertifikat').attr('data-target','#sertifikat-'+$(this).val())
				})
			});
			function submitform(id)
			{
				var type = $('#typecv-'+id).val();
				window.open('/admin/tenaga_kerja/generatecv?tenaga_kerja_id='+id+'&typecv='+type, '_blank');
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
	        $postdata["created_by"] = CRUDBooster::myId();

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
	    //By the way, you can still create your own method in here... :)
	}
