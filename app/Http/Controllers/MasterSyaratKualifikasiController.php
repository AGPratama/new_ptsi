<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\MasterSyaratKualifikasi;
use App\MasterSyaratKualifikasiDetail;
use App\Http\Resources\MasterSyaratKualifikasiResource;
use App\Http\Requests\MasterSyaratKualifikasiRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MasterSyaratKualifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MasterSyaratKualifikasiResource::collection(MasterSyaratKualifikasi::with('details')->get());
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
            $request->request->add(['is_leaf' => true]);
            $request->model = json_decode($request->model);
            $master_syarat_kualifikasi = new MasterSyaratKualifikasi((array)$request->model);
            $master_syarat_kualifikasi->save();
            $details = array();
            foreach($request->model->details as $k=>$v){
                $details[] = (array)$v;
            }
            $master_syarat_kualifikasi->details()->sync($details);
            if ($master_syarat_kualifikasi->parent_id != null) {
                $parent = MasterSyaratKualifikasi::findOrFail($master_syarat_kualifikasi->parent_id);
                $parent->is_leaf = false;
                $parent->save();
            }
            $resource = new MasterSyaratKualifikasiResource(MasterSyaratKualifikasi::with('details')->findOrFail($master_syarat_kualifikasi->id));
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
    public function show($id)
    {
        return new MasterSyaratKualifikasiResource(MasterSyaratKualifikasi::with('details')->findOrFail($id));
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
        DB::beginTransaction();
        try {
            $data = MasterSyaratKualifikasi::with('details')->findOrFail($id);
            $request->model = json_decode($request->model);
            if($request->file_detail){
                $folder =  public_path().'/../storage/app/uploads/fixedfile/';
                File::isDirectory($folder) or File::makeDirectory($folder, 0777, true, true);
                $path = Storage::putFile('uploads/fixedfile', $request->file_detail['file']);
                $request->model->file_upload = $path;
            }
            $data->update((array)$request->model);
            $details = array();
            foreach($request->model->details as $k=>$v){
                $details[] = (array)$v;
            }
            $data->details()->sync($details);
            $resource = new MasterSyaratKualifikasiResource(MasterSyaratKualifikasi::with('details')->findOrFail($id));
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return response()->json(['data' => $resource]);
    }

    private function deleteChildrenData($id){
        $data = MasterSyaratKualifikasi::where('parent_id',$id)->get();
        foreach($data as $row){
            if(!$row->is_leaf){
                $this->deleteChildrenData($row->id);
            }
            $row->delete();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = MasterSyaratKualifikasi::with('details')->findOrFail($id);
            $data->delete();
            if(!$data->is_leaf) {
                $this->deleteChildrenData($id);
            }else{
                $getChild = MasterSyaratKualifikasi::where('parent_id',$data->parent_id)->get();
                if($getChild->count() == 0){
                    $parent = MasterSyaratKualifikasi::find($data->parent_id);
                    $parent->is_leaf = true;
                    $parent->save();
                }
            }

            $resource = new MasterSyaratKualifikasiResource($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return response()->json(['data' => $resource]);
    }
}
