<?php

namespace App\Http\Controllers;

use App\Tender;
use Exception;
use Illuminate\Http\Request;
use App\MasterSyaratKualifikasi;
use App\MasterSyaratKualifikasiDetail;
use App\TenderSyaratKualifikasi;
use App\TenderSyaratKualifikasiDetail;
use App\Http\Resources\TenderSyaratKualifikasiResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KelengkapanSyaratKualifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tender_id != null) {
            $tender = Tender::find($request->tender_id);

            // if pra
            if($tender->metode_kualifikasi_id==20){
                $display_kualifikasi = ($tender->hasil_tender_text==35) ? 1 : 2;
                $text_kualifikasi = "Pra Kualifikasi";
                $data = MasterSyaratKualifikasi::where('display', $display_kualifikasi)->get();
            } else {
                $text_kualifikasi = "Pasca Kualifikasi";
                $data = MasterSyaratKualifikasi::all();
            }
            $data_response = [];
            foreach ($data as $k=>$row) {
                $tender_syarat_kualifikasi = TenderSyaratKualifikasi::with('details')
                    ->where('master_syarat_kualifikasi_id', $row->id)
                    ->where('tender_id',$request->tender_id)
                    ->where('active',1)->first();
                $row->complete = false;

                if ($tender_syarat_kualifikasi == null) {
                    if($row->is_leaf != 0){ // if children and not active, hide
                        unset($data[$k]);
                        continue;
                    }
                    $row->active = false;
                } else {
                    $row->active = true;
                    if($row->is_dokumen){
                        if(Storage::exists($tender_syarat_kualifikasi->value) || file_exists($tender_syarat_kualifikasi->value)){
                            $row->complete = true;
                        }
                    }else{
                        if($tender_syarat_kualifikasi->details->count() > 0){
                            $row->complete = true;
                        }
                    }
                    $row->completed = $tender_syarat_kualifikasi->completed;
                    $row->verified = $tender_syarat_kualifikasi->verified;
                    $row->sequence = $tender_syarat_kualifikasi->sequence;
                }
                $data_response[] = $row;
            }
            return response()->json(['data' => $data_response, 'tender'=> $text_kualifikasi]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->mode == "active") {
                $tender_syarat_kualifikasi = TenderSyaratKualifikasi::where('master_syarat_kualifikasi_id', $request->id)->where('tender_id',$request->tender_id)->first();
                if ($tender_syarat_kualifikasi != null) {
                    $tender_syarat_kualifikasi->active = true;
                    $tender_syarat_kualifikasi->save();
                } else {
                    $master_syarat_kualifikasi = MasterSyaratKualifikasi::findOrFail($request->id);
                    $tender_syarat_kualifikasi = new TenderSyaratKualifikasi;
                    $tender_syarat_kualifikasi->active = true;
                    $tender_syarat_kualifikasi->tender_id = $request->tender_id;
                    $tender_syarat_kualifikasi->master_syarat_kualifikasi_id = $request->id;
                    $tender_syarat_kualifikasi->save();
                }
                $resource = new TenderSyaratKualifikasiResource(TenderSyaratKualifikasi::with('details')->find($tender_syarat_kualifikasi->id));
            }
            else if ($request->mode == "deactive") {
                $tender_syarat_kualifikasi = TenderSyaratKualifikasi::where('master_syarat_kualifikasi_id', $request->id)->where('tender_id',$request->tender_id)->first();
                $tender_syarat_kualifikasi->active = false;
                $tender_syarat_kualifikasi->save();
                $resource = new TenderSyaratKualifikasiResource(TenderSyaratKualifikasi::with('details')->find($tender_syarat_kualifikasi->id));
            }else{
                try {
                    $dokumen = $request->file("dokumen");
                    if ($dokumen != null) {
                        $request->model = json_decode($request->model);
                        $tender_syarat_kualifikasi = TenderSyaratKualifikasi::with('details')->findOrFail($request->model->id);
                        $folder =  public_path().'/../storage/app/uploads/tender/'.$tender_syarat_kualifikasi->tender_id;
                        File::isDirectory($folder) or File::makeDirectory($folder, 0777, true, true);
                        $path = Storage::putFile('uploads/tender/'.$tender_syarat_kualifikasi->tender_id, $dokumen);
                        $request->model->value = $path;
                        $tender_syarat_kualifikasi->update((array)$request->model);
                    }else{
                        $tender_syarat_kualifikasi = TenderSyaratKualifikasi::with('details')->findOrFail($request->id);
                        $tender_syarat_kualifikasi->update($request->all());
                        $tender_syarat_kualifikasi->details()->sync($request->details);
                    }
                    $tender_id = $tender_syarat_kualifikasi->tender_id;
                    $verified = TenderSyaratKualifikasi::where('tender_id',$tender_id)->where('verified',true)->count();
                    $total_data = TenderSyaratKualifikasi::where('tender_id',$tender_id)->count();
                    $persentase = ($verified/$total_data)*100;
                    $tender = Tender::findOrFail($tender_id);
                    $tender->progress_kelengkapan = $persentase;
                    $tender->save();
                    $resource = new TenderSyaratKualifikasiResource(TenderSyaratKualifikasi::with('tender', 'master_syarat_kualifikasi.details', 'details')->findOrFail($tender_syarat_kualifikasi->id));
                }catch(Exception $e){
                    if(Storage::exists($path) || file_exists($path)){
                        Storage::delete($path);
                    }
                    throw $e;
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return response()->json(['data' => $resource]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->tender_id != null && $request->master_syarat_kualifikasi_id != null){
            $data = TenderSyaratKualifikasi::with('tender','master_syarat_kualifikasi.details','details')->where('tender_id',$request->tender_id)->where('master_syarat_kualifikasi_id',$request->master_syarat_kualifikasi_id)->first();
            if(Storage::exists($data->value) || file_exists($data->value)){
                $data->is_dokumen_exist = true;
            }else{
                $data->is_dokumen_exist = false;
            }
            $resource = new TenderSyaratKualifikasiResource($data);
        }
        return response()->json(['data' => $resource]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
