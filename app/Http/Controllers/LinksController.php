<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\Link;

class LinksController extends Controller
{
    public function index(){
        return view('admin.links.index');
    }
    public function create(Request $request){
        $links = new Links();
        $links->title = $request->input('title');
        $links->url = $request->input('url');
        $links->icon = $request->input('icon');
        $links->showinmenu = $request->input('showinmenu')==1?1:0;
        $links->parent_id = $request->input('link_type') == 0? null:$request->input('link_type');
       if ($request->input('link_type') != 0 )
       {
           $order_id = \DB::table('side_menu_links')->where('parent_id',(int)$request->input('link_type'))->orderBy('order_id','desc')->first();
            if (is_null($order_id)){
                $links->order_id = 1;
            }else{
           $links->order_id = $order_id->order_id+1;
            }

       }
       else{
           $links->order_id = 0;
       }
        $links->save();

    }
    public function get_main(){
        $links = Links::where('parent_id',NULL)->select(['id','title'])->get();

        return response()->json(['status'=>200,'data'=>$links]);
    }
}
