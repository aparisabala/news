<?php

namespace App\Http\Middleware;

use App\Models\AppData;
use App\Models\SystemMeta;
use App\Traits\BaseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use File;
class SetBootConfig
{
    use BaseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $app_data = AppData::where('id',1)->select(['*'])->first();
        $metaInfo = SystemMeta::find(1);
        if(!empty($app_data) && !empty($metaInfo)) {
            $logoPath = 'uploads/app/'.$metaInfo->service_domain.'/dyn/images/'.$metaInfo->logo;
            $faviconPath = 'uploads/app/'.$metaInfo->service_domain.'/dyn/images/'.$metaInfo->favicon;
            $metaimagePath = 'uploads/app/'.$metaInfo->service_domain.'/dyn/images/'.$metaInfo->meta_image;
            $metaInfo['logo'] = (file_exists($logoPath)) ? url($logoPath) : url('images/system/logo.png');
            $metaInfo['favicon'] = (file_exists($faviconPath)) ? url($faviconPath) : url('images/system/favicon.png');
            $metaInfo['meta_image'] = (file_exists($metaimagePath)) ? url($metaimagePath) : url('images/system/logo.png');
            config(['a' => $app_data]);
            config(['i' => [...$metaInfo->toArray()]]);
            foreach (uploadsDir() as $key => $path) {
                if(!is_dir($path)) {
                    File::makeDirectory($path, 0755, true);
                }
            }
        } else {
            die('Something went wrong, contact webmaster, Error code: system 404');
        }
        return $next($request);
    }
}
