<?php

namespace App\Http\Controllers;

use App\Http\Resources\TenderResource;
use App\Tender;
use App\User;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenderController extends Controller
{
    public function send_notif_by_tender(Request $request)
    {
        DB::beginTransaction();
        try {
            $tender = Tender::findOrFail($request->id);
            if($tender->progress_kelengkapan < 100){
                return response()->json(['error_code' => 1,'message' => 'Syarat Kualifikasi Belum Lengkap']);
            }
            $tender->show_button = false;
            $tender->save();
            $id_user = array();
            $users = User::where('id_cms_privileges', 4)->get();
            foreach ($users as $user) {
                array_push($id_user, $user->id);
            }
            $config['content'] = "Dokumen Tender Sudah Lengkap dan Siap Untuk di verifikasi";
            $config['to'] = CRUDBooster::adminPath('syarat_kualifikasi/edit/' . $request->id);
            $config['id_cms_users'] = $id_user; //This is an array of id users
            CRUDBooster::sendNotification($config);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return response()->json(['error_code' => 0,'message' => 'Syarat Kualifikasi Berhasil di Kirim']);
    }

    public function send_notif_by_verifikator(Request $request)
    {
        DB::beginTransaction();
        try {
            $tender = Tender::findOrFail($request->id);
            if($tender->progress_kelengkapan < 100) {
                $tender->show_button = false;
                $tender->save();
                $config['content'] = "Dokumen belum lengkap  / salah dan masih butuh perbaikan";
            }else{
                $config['content'] = "Dokumen Siap Di print out";
            }
            $id_user = array();
            $users = User::where('id_cms_privileges', 3)->get();
            foreach ($users as $user) {
                array_push($id_user, $user->id);
            }
            $config['to'] = CRUDBooster::adminPath('syarat_kualifikasi/edit/' . $request->id);
            $config['id_cms_users'] = $id_user; //This is an array of id users
            CRUDBooster::sendNotification($config);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return response()->json(['error_code' => 0,'message' => 'Successfully Notification']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TenderResource(Tender::with(['penggunajasa','metodeevaluasi','metodekualifikasi','metodedokumen','hasiltender','bidang','ao'])->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Tender::findOrFail($id);
            $data->update($request->all());
            $resource = new TenderResource(Tender::findOrFail($id));
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return response()->json(['data' => $resource]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
