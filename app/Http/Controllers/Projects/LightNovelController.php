<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Services\BreadcrumbService;
use Illuminate\Http\Request;
use App\Repositories\LightnovelInterface;

class LightNovelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param BreadcrumbService $breadcrumbService
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, BreadcrumbService $breadcrumbService)
    {
        $data['breadcrumbs'] = $breadcrumbService->get('projects.lightnovel');
        return view('frontend.projects.lightnovel.show',$data);
    }

    public function overview(LightnovelInterface $lightnovel, $name, Request $request) {
        if ($request->input('p') && $request->input('v')) {
            $part_index = $request->input('p');
            $volume_index = $request->input('v');
            $result = $lightnovel->getPart(str_replace("-","", $name), $volume_index, $part_index);
            $data['part'] = $result ;
            return view('frontend.projects.lightnovel.content', $data);
        }else {
            $overview = array();
            $results = $lightnovel->getOverView(str_replace("-","", $name));
            foreach ($results as $result) {
                if (isset($overview["$result->volume_index"])) {
                    array_push($overview["$result->volume_index"], $result);
                }else {
                    $overview["$result->volume_index"] = array($result);
                }
            }
            $data['volumes'] = $overview ;
            return view('frontend.projects.lightnovel.overview', $data);
        }
    }


}
