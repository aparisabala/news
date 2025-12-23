<?php

namespace App\Repositories\Admin\Articles\Crud;

use App\Http\Requests\Admin\Articles\Crud\ValidateUpdateDynArticle;
use App\Models\DynArticle;
use App\Models\DynArticleComponent;
use App\Repositories\BaseRepository;
use App\Traits\BaseTrait;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Auth;
use DB;
use Webpatser\Uuid\Uuid;
use Str;
class  DynArticleCrudRepository extends BaseRepository implements IDynArticleCrudRepository {

    use BaseTrait;
    public function __construct() {
        $this->LoadModels(['DynArticle']);
        $this->sizes =  [
            ['width'=> 1280, 'height'=> 720,'com'=> 100],
            ['width'=> 360, 'height'=> 240,'com'=> 100],
            ['width'=> 80, 'height'=> 80,'com'=> 100],
        ];
    }

    /**
     * Get the page default resource
     *
     * @param Request $request
     * @param integer|string $id
     * @return array
     */
    public function index($request,$id=null) : array
    {
       return $this->getPageDefault(model: $this->DynArticle, id: $id);
    }


    /**
     * Yajra datatbale list resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list($request) : JsonResponse
    {
        $model = DynArticle::query();
        $this->saveTractAction(
            $this->getTrackData(
                title: 'DynArticle was viewed by '.$request?->auth?->name.' at '.Carbon::now()->format('d M Y H:i:s A'),
                request: $request,
                onlyTitle: true
            )
        );
        return DataTables::of($model)
        ->editColumn('created_at', function($item) {
            return  Carbon::parse($item->created_at)->format('d-m-Y');
        })
        ->addColumn('image', function($item) {
            $image = getRowImage(row: $item, col: 'feature_image');
            return  "<img src='$image'  class='img-fluid'/>";
        })
        ->escapeColumns([])
        ->make(true);
    }

    /**
     * Store resource
     *
     * @param Request  $request
     * @return JsonResponse
     */
    public function store($request) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $insert = [...$request->all(),'slug' => Str::slug($request->name)];
            $path = imagePaths()['dyn_image'];
            $image = $request->file('feature_image');
            if ($request->hasFile('feature_image')) {
                $image_link = (string) Uuid::generate(4);
                $extension = $image->getClientOriginalExtension();
                $image = $this->imageVersioning([
                    'image' => $image, 'path' => $path, 'image_link' => $image_link, 'extension' => $extension,
                    'appendSize' => true,
                    'onlyAppend' => $this->sizes
                ]);
                $insert['feature_image'] = $image_link;
                $insert['extension'] = $extension;
            }
            $article = DynArticle::create($insert);
            if(isset($request->components)){
                foreach ($request->components as $key => $value) {
                    $c = new  DynArticleComponent;
                    $c->dyn_article_id = $article->id;
                    $c->componet_type = 'components';
                    $c->type = $value;
                    $c->save();
                }
            }
            if(isset($request->categories)){
                foreach ($request->categories as $key => $value) {
                    $c = new  DynArticleComponent;
                    $c->dyn_article_id = $article->id;
                    $c->dyn_category_id = $value;
                    $c->type = 'categories';
                    $c->save();
                }
            }
            $response['extraData'] = ['inflate' => pxLang($request->lang,'','common.action_success') ];
            $this->saveTractAction($this->getTrackData(title: "DynArticle was created by ".$request?->auth?->name,request: $request));
            DB::commit();
            return $this->response(['type' => 'success', 'data' => $response]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->saveError($this->getSystemError(['name' => 'DynArticle_store_error']), $e);
            return $this->response(['type' => 'noUpdate', 'title' => pxLang($request->lang,'','common.server_wrong')]);
        }
    }

    /**
     * Update resource
     *
     * @param Requets $request
     * @param integer|string $id
     * @return JsonResponse
     */
    public function update($request,$id) : JsonResponse
    {
        $row = DynArticle::find($id);
        if(empty($row)){
            return  $this->response(['type' => 'noUpdate', 'title' =>  '<span class="text-danger">'.pxLang($request->lang,'','common.no_resourse').'</span>']);
        }
        $rowRef = [...$row->toArray()];
        $row->fill([
            ...$request->all(),
            'slug' => Str::slug($request->name)
        ]);
        $path = imagePaths()['dyn_image'];
        $image = $request->file('feature_image');
        if(isset($request->components)){
            DynArticleComponent::where([['dyn_article_id','=',$row->id],['componet_type','=','components']])->delete();
            foreach ($request->components as $key => $value) {
                $c = new  DynArticleComponent;
                $c->dyn_article_id = $row->id;
                $c->componet_type = 'components';
                $c->type = $value;
                $c->save();
            }
        }
        if(isset($request->categories)){
            DynArticleComponent::where([['dyn_article_id','=',$row->id],['type','=','categories']])->delete();
            foreach ($request->categories as $key => $value) {
                $c = new  DynArticleComponent;
                $c->dyn_article_id = $row->id;
                $c->dyn_category_id = $value;
                $c->type = 'categories';
                $c->save();
            }
        }
        if($row->isDirty() || $image != '' || isset($request->components) || isset($request->categories)){
            $validator = Validator::make($request->all(), (new ValidateUpdateDynArticle())->rules($request,$row));
            if ($validator->fails()) {
                return $this->response(['type' => 'validation','errors' => $validator->errors()]);
            }
            DB::beginTransaction();
            try {
                 if ($request->hasFile('feature_image')) {
                    $this->deleteImageVersions([
                        'path' => imagePaths()['dyn_image'],
                        'image_link' => $row->image,
                        'extension' => $row->extension,
                        'sizes' =>  $this->sizes
                    ]);
                    $image_link = (string) Uuid::generate(4);
                    $extension = $image->getClientOriginalExtension();
                    $image = $this->imageVersioning([
                        'image' => $image, 'path' => $path, 'image_link' => $image_link, 'extension' => $extension,
                        'appendSize' => true,
                        'onlyAppend' => $this->sizes
                    ]);
                    $row->feature_image =  $image_link;
                    $row->extension = $extension;
                }
                $row->save();
                $data['extraData'] = ["inflate" =>  pxLang($request->lang,'','common.action_success')];
                $this->saveTractAction($this->getTrackData(title: " DynArticle ".$row?->name.' was updated by '.$request?->auth?->name,request: $request, row: $rowRef, type: 'to'));
                DB::commit();
                return $this->response(['type' => 'success','data' => $data]);
            } catch (\Exception $e) {
                DB::rollback();
                $this->saveError($this->getSystemError(['name'=>'DynArticle_update_error']), $e);
                return $this->response(["type"=>"wrong","lang"=>"server_wrong"]);
            }
        } else {
            return $this->response(['type' => 'noUpdate', 'title' =>  '<span class="text-success">'.pxLang($request->lang,'','common.no_change').'</span>']);
        }
    }

    /**
     *  Bulk update list resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateList($request) : JsonResponse
    {
        $i = DynArticle::whereIn('id',$request->ids)->select(['id','name'])->get();;
        $dirty = [];
        if (count($i) > 0) {
            foreach ($i as $key => $value) {
                //$value->serial = $request->serial[$value->id];
                if ($value->isDirty()) {
                    $dirty[$key] = "yes";
                }
            }
            if (count($dirty) > 0) {
                DB::beginTransaction();
                try {
                    foreach ($i as $key => $value) {
                        $value->save();
                    }
                    $data['extraData'] = [
                        "inflate" => pxLang($request->lang,'','common.action_update_success')
                    ];
                    $this->saveTractAction($this->getTrackData(title: "DynArticle list was updated by ".$request?->auth?->name, request: $request));
                    DB::commit();
                    return $this->response(['type' => 'success','data' => $data]);
                } catch (\Exception $e) {
                    DB::rollback();
                    $this->saveError($this->getSystemError(['name' => 'DynArticle_bulk_update_error']), $e);
                    return $this->response(['type' => 'wrong', 'lang' => 'server_wrong']);
                }
            } else {
                return $this->response(['type' => 'noUpdate', 'title' =>  '<span class="text-success"> '.pxLang($request->lang,'','common.no_change').'  </span>']);
            }

        } else {
            return $this->response(['type' => 'noUpdate', 'title' => pxLang($request->lang,'','common.went_wrong')]);
        }
    }

    /**
     * Bulk delete list resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteList($request) : JsonResponse
    {
        $errors = [];
        $i = DynArticle::whereIn('id',$request->ids)->select(['id'])->get();
        if (count($i) > 0) {
            // $errors = $this->checkInUse([
            //     "rows" => $i,
            //     "search" => ["id","id"],
            //     "denined" => ["name","name"],
            //     "targetModel" => [$this->StudentAdmission,$this->ExamResult],
            //     "targetCol" => ["lib_category_id","lib_category_id"],
            //     "exists" => ["Class Category","Class Category"],
            //     "in" => ["Stduent Table","Result Table"]
            // ]);
            if (count($errors) > 0) {
                return $this->response(['type'=>'bigError','errors'=>$errors]);
            }
            DB::beginTransaction();
            try {
                foreach ($i as $key => $value) {
                    $this->deleteImageVersions([
                        'path' => imagePaths()['dyn_image'],
                        'image_link' => $value->image,
                        'extension' => $value->extension,
                        'sizes' =>  $this->sizes
                    ]);
                    $value->delete();
                }
                $data['extraData'] = [
                    "inflate" => pxLang($request->lang,'','common.action_delete_success'),
                    "redirect" => null
                ];
                $this->saveTractAction($this->getTrackData(title: "DynArticle list was deleted by ".$request?->auth?->name, request: $request));
                DB::commit();
                return $this->response(['type' => 'success',"data"=>$data]);
            } catch (\Exception $e) {
                DB::rollback();
                $this->saveError($this->getSystemError(['name' => 'DynArticle_store_error']), $e);
                return $this->response(['type' => 'wrong', 'lang' => 'server_wrong']);
            }
        } else {
            return $this->response(['type' => 'noUpdate', 'title' =>  pxLang($request->lang,'','common.no_data_selected')]);
        }
    }

}
