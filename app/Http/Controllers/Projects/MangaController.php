<?php
/**
 * Created by PhpStorm.
 * User: nightfury
 * Date: 14/03/2019
 * Time: 15:01
 */

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MangaInterface;

class MangaController extends Controller {

    public function overview(MangaInterface $manga, $name, Request $request) {
        if ($request->input('c')) {
            $chap_index = $request->input('c');
            $result = $manga->getChap(str_replace("-","", $name), $chap_index);
            $number_chaps = $manga->getNumberChap(str_replace("-","", $name));
            $data['chap'] = $result ;
            $data['number_chaps'] = $number_chaps ;
            $data['current_chap'] = $chap_index ;
            return view('frontend.projects.manga.content', $data);
        }else {
            $overview = array();
            $results = $manga->getOverView(str_replace("-","", $name));
            foreach ($results as $result) {
                if (isset($overview["$result->index"])) {
                    array_push($overview["$result->index"], $result);
                }else {
                    $overview["$result->index"] = $result;
                }
            }
            $data['chaps'] = $overview ;
            $data['manga_name'] = $name ;
            return view('frontend.projects.manga.overview', $data);
        }
    }
}
