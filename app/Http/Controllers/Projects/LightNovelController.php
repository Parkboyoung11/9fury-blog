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
            $number_parts = $lightnovel->getNumberPart(str_replace("-","", $name), $volume_index);
            $number_volumes = $lightnovel->getNumberVolume(str_replace("-","", $name));
            $number_parts_previous = $lightnovel->getNumberPart(str_replace("-","", $name), $volume_index - 1);
            $data['part'] = $result ;
            $data['number_parts'] = $number_parts ;
            $data['number_volumes'] = $number_volumes ;
            $data['current_part'] = $part_index ;
            $data['current_volume'] = $volume_index ;
            $data['number_parts_previous'] = $number_parts_previous ;
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
