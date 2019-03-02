<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Services\BreadcrumbService;
use Illuminate\Http\Request;

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

    public function show($name) {

        $data['name'] = str_replace("-","", $name);
        return view('frontend.projects.lightnovel.show', $data);
    }
}
