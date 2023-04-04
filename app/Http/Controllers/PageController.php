<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GetDataController;

class PageController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param
    */

    public function withSidebar($page){
        info('controller PageController withSidebar ----------');

        if(!view()->exists($page)){
            $content = view('404');
            return view('main', ['content' => $content]);
        }

        $content = view($page);
        return view('main', ['content' => $content]);
    }

    public static function includeSidebar($content){
        info('controller PageController includeSidebar ----------');

        return view('main', ['content' => $content]);
    }

    public function viewRoom($id){
        info('controller PageController viewRoom ----------');

        $content = view('ruang', ['id' => $id]);

        return $this->includeSidebar($content);
    }

    public function withFilter(){
        info('controller PageController withFilter ----------');

        if(session()->missing('filtered')){
            $content = view('404');
            return view('main', ['content' => $content]);
        }

        return session()->get('filtered');
    }

    public function callAjax($page){
        info('controller PageController callAjax ----------');

        if(!view()->exists('ajax/' . $page)){
            return view('404');
        }

        return view('ajax/' . $page);
    }
}
