<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class LinksController extends Controller
{
    public function index(Request $request)
    {


        if (request()->ajax()) {
            if ($request->show_menu == '1') {
                $links = DB::table('side_menu_links')->where('deleted_at', null)->select([
                    'id', 'title', 'url', 'icon', 'showinmenu', 'parent_id as main_menu'
                ])->where('showinmenu', $request->show_menu)->orderBy('id', 'DESC')->get();
            } elseif ($request->show_menu == '0') {
                $links = DB::table('side_menu_links')->where('deleted_at', null)->select([
                    'id', 'title', 'url', 'icon', 'showinmenu', 'parent_id as main_menu'
                ])->where('showinmenu', $request->show_menu)->orderBy('id', 'DESC')->get();
            } else {
                $links = DB::table('side_menu_links')->where('deleted_at', null)->select([
                    'id', 'title', 'url', 'icon', 'showinmenu', 'parent_id as main_menu'
                ])->orderBy('id', 'DESC')->get();
            }

            return DataTables::of($links)
                ->addColumn('actions', function ($links) {
                    $data = '';
                    if (auth()->user()->hasPermissionTo('links_edit')) {
                        $data .= '<a  href="/dashboard/links/edit/' . $links->id . '" class="btn btn-success btn-sm editLinks" >تعديل</a>';
                    }
                    if (auth()->user()->hasPermissionTo('links_delete')) {
                        $data .= '<button type="button" data-id="' . $links->id . '"  data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm btn-delete ml-2" id="getDeleteId">حذف</button>';
                    }
                    return $data;
                })->editColumn('show-menu', function ($links) {
                    return view('admin.links.show-menu', compact('links'));
                })->editColumn('menu-type', function ($links) {
                    return view('admin.links.menu-type', compact('links'));
                })->rawColumns(['actions', 'show-menu'])->make(true);

            return response()->json(["data" => $links]);
        }
        return view('admin.links.index');
    }

    public function edit($id)
    {
        $links = Links::where('parent_id', NULL)->get();
        $whereID = array('id' => $id);
        $data = Links::find($id);
        return view('admin.links.edit', compact('data', 'links'));
    }

    public function update(Request $request)
    {
        $link = Links::findOrFail($request->link_id);

        // dd($request->all());

        $array = [];

        if ($request->title != $link->title) {
            $array['title'] = $request->title;
        }

        if ($request->url != $link->url) {
            $array['url'] = $request->url;
        }

        if ($request->icon != $link->icon) {
            $array['icon'] = $request->icon;
        }

        if ($request->input('showinmenu') == null) {
            $array['showinmenu'] = 0;
        } else {
            $array['showinmenu'] = 1;
        }

        $link->parent_id = $request->input('link_type') == 0 ? null : $request->input('link_type');
        if ($request->input('link_type') != 0) {
            $order_id = \DB::table('side_menu_links')->where('parent_id', (int)$request->input('link_type'))->orderBy('order_id', 'desc')->first();
            if (is_null($order_id)) {
                $link->order_id = 1;
            } else {
                $link->order_id = $order_id->order_id + 1;
            }
        } else {
            $link->order_id = 0;
        }

        if (!empty($array)) {
            $link->update($array);
        }
        return response()->json(['status' => 200, 'success' => 'تم التحديث بنجاح']);
    }


    public function create(Request $request)
    {
        $links = new Links();
        $links->title = $request->input('title');
        $links->url = $request->input('url');
        $links->icon = $request->input('icon');
        $links->showinmenu = $request->input('showinmenu') == 1 ? 1 : 0;
        $links->parent_id = $request->input('link_type') == 0 ? null : $request->input('link_type');
        if ($request->input('link_type') != 0) {
            $order_id = \DB::table('side_menu_links')->where('parent_id', (int)$request->input('link_type'))->orderBy('order_id', 'desc')->first();
            if (is_null($order_id)) {
                $links->order_id = 1;
            } else {
                $links->order_id = $order_id->order_id + 1;
            }
        } else {
            $links->order_id = 0;
        }
        $links->save();
    }
    public function get_main()
    {
        $links = Links::where('parent_id', NULL)->select(['id', 'title'])->get();
        return response()->json(['status' => 200, 'data' => $links]);
    }
    public function test_status(Request $request)
    {
        $links_id = Links::where('id', $request->input('id'))->where('parent_id', null)->first();

        if (is_null($links_id)) {
            return response()->json(['status' => 404]);
        } else {
            return response()->json(['status' => 200, 'data' => $links_id]);
        }
    }
    public function confirm_delete(Request $request)
    {
        $delete = Links::where('parent_id', $request->input('id'))->delete();
        try {
            $parent = Links::findOrFail($request->input('id'));
            $deleted = $parent->delete();
            if ($deleted) {
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 500]);
            }
        } catch (ModelNotFoundException $exception) {
            return response()->json(['status' => 404]);
        }
    }
}
