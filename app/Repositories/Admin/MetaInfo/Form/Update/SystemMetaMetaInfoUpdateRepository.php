<?php

namespace App\Repositories\Admin\MetaInfo\Form\Update;

use App\Http\Requests\Admin\MetaInfo\Form\Update\ValidateSystemMetaMetaInfoUpdate;
use App\Models\SystemMeta;
use App\Repositories\BaseRepository;
use App\Traits\BaseTrait;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use DB;
use Webpatser\Uuid\Uuid;

class  SystemMetaMetaInfoUpdateRepository extends BaseRepository implements ISystemMetaMetaInfoUpdateRepository {

    use BaseTrait;
    public function __construct() {
        $this->LoadModels(['SystemMeta']);
    }

    /**
     * Get the page default resource
     *
     * @param Request $request
     * @param integer|string $id
     * @return array
     */
    public function index($request, $id=null) : array
    {
        $this->saveTractAction(
            $this->getTrackData(
                title: 'SystemMeta update was viewed by '.$request?->auth?->name.' at '.Carbon::now()->format('d M Y H:i:s A'),
                request: $request,
                onlyTitle: true
            )
        );
       return $this->getPageDefault(model: $this->SystemMeta, id: $id);
    }

    /**
     * Update resource
     *
     * @param Requets $request
     * @param integer|string $id
     * @return JsonResponse
     */
    public function update($request) : JsonResponse
    {
        $row = SystemMeta::find($request->id);
        if(empty($row)){
            return  $this->response(['type' => 'noUpdate', 'title' =>  '<span class="text-danger">'.pxLang($request->lang,'','common.no_resourse').'</span>']);
        }
        $rowRef = [...$row->toArray()];
        $row->fill($request->all());
        $path = imagePaths()['dyn_image'];
        $logo = $request->file('logo');
        $favicon = $request->file('favicon');
        $meta_image = $request->file('meta_image');
        if($row->isDirty() || $logo != '' || $favicon != '' || $meta_image != '' ){
            $validator = Validator::make($request->all(), (new ValidateSystemMetaMetaInfoUpdate())->rules($request,$row));
            if ($validator->fails()) {
                return $this->response(['type' => 'validation','errors' => $validator->errors()]);
            }
            DB::beginTransaction();
            try {
                if ($request->hasFile('logo')) {
                    $image_link = (string) Uuid::generate(4);
                    $extension = $logo->getClientOriginalExtension();
                    $logolInk = $image_link.'.'.$extension;
                    $logo->move($path,$logolInk);
                    $row->logo = $logolInk;
                }
                if ($request->hasFile('favicon')) {
                    $image_link = (string) Uuid::generate(4);
                    $extension = $favicon->getClientOriginalExtension();
                    $logolInk = $image_link.'.'.$extension;
                    $favicon->move($path,$logolInk);
                    $row->favicon = $logolInk;
                }
                if ($request->hasFile('meta_image')) {
                    $image_link = (string) Uuid::generate(4);
                    $extension = $meta_image->getClientOriginalExtension();
                    $logolInk = $image_link.'.'.$extension;
                    $meta_image->move($path,$logolInk);
                    $row->meta_image = $logolInk;
                }
                $row->save();
                $data['extraData'] = ["inflate" =>  pxLang($request->lang,'','common.action_success')];
                $this->saveTractAction($this->getTrackData(title: " SystemMeta ".$row?->name.' was updated by '.$request?->auth?->name,request: $request, row: $rowRef, type: 'to'));
                DB::commit();
                return $this->response(['type' => 'success','data' => $data]);
            } catch (\Exception $e) {
                DB::rollback();
                $this->saveError($this->getSystemError(['name'=>'SystemMeta_update_error']), $e);
                return $this->response(["type"=>"wrong","lang"=>"server_wrong"]);
            }
        } else {
            return $this->response(['type' => 'noUpdate', 'title' =>  '<span class="text-success">'.pxLang($request->lang,'','common.no_change').'</span>']);
        }
    }
}
