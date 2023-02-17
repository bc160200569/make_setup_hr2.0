<?php

namespace App\Http\Controllers;

use App\Models\SubNavigation;
use Illuminate\Http\Request;

use DataTables;
use Session;
class SubNavigationController extends Controller
{
    //
    public function index(Request $request){
        // dd($id);
        $nav_id = $request->id;
        // dd($nav_id);
        // $data = SubNavigation::where('nav_id', $nav_id)->get();

        if ($request->ajax()) {
            // $nav_id = $request->id;
            // $navigations = SubNavigation::query();
            $sub_navigations = SubNavigation::where('nav_id', $nav_id)->get();
            // dd($sub_navigations);

            return Datatables::of($sub_navigations)
                // ->editColumn('sub_nav', function ($nav){
                //     if ($nav->sub_nav == 0) return 'No';
                //     if ($nav->sub_nav == 1) return 'Yes';
                //     // return 'Cancel';
                // })
                ->editColumn('is_show', function ($nav){
                    if ($nav->is_show == 0) return 'No';
                    if ($nav->is_show == 1) return 'Yes';
                    // return 'Cancel';
                })
                ->editColumn('route', function ($nav){
                    if ($nav->route == '') return 'No Route';
                    if ($nav->route != '') return $nav->route;
                    // return 'Cancel';
                })
                ->addColumn('action', function ($nav) {
                    $statusAction = '<td>
                                        <span class="badge '.($nav->is_active == 1 ? "bg-success" : "bg-danger").'">'.($nav->is_active == 1 ? "Active" : "Inactive").'</span>
                                        <div class="overlay-edit">                                        
                                            <button type="button" value="'.$nav->uuid.'" class="btn btn-icon btn-secondary" id="editNavigation"><i class="feather icon-edit-2"></i></button> 
                                            <a href="'.route('navigation.updateStatus', $nav->uuid).'" class="btn btn-icon '.($nav->is_active == 1 ? "btn-danger" : "btn-success").' btn-status"><i class="feather '.($nav->is_active == 1 ? "icon-eye-off" : "icon-eye").'"></i></a>
                                            <a href="'.route('navigation.destroy', $nav->uuid).'" class="btn btn-icon btn-danger btn-delete"><i class="feather icon-trash-2"></i></a>
                                        </div>
                                    </td>';
                    return $statusAction;
                })
                ->addColumn('sub_navigation', function ($nav){
                    $sub = '<td>
                                <span class="badge '.($nav->sub_nav == 1 ? "bg-primary" : "bg-danger").'">'.($nav->sub_nav == 1 ? "Sub-Navigation" : "Sub-Navigation").'</span>
                                <div class="overlay-edit">
                                    <a href="'.route('sub_navigation.index', $nav->uuid).'" class="btn btn-icon btn-secondary"><i class="feather icon-list"></i></a>
                                </div>
                            </td>';
                    return $sub;
                })
                ->editColumn('icon', function ($nav){
                    $icon = '<td>
                                <i class="'.($nav->icon).'"></i>
                            </td>';
                    return $icon;
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['action', 'sub_navigation', 'icon'])
                ->make(true);
        }
        return view('sub-navigations.index',compact('nav_id'));
    }
    public function store(Request $request){
        // dd($request->all());
        request()->validate([
            'name' => 'required',
            'route' => 'required',
            ],
            // [
            //     'name.required'=>"Navigation not add Name Field Required.",
            // ]
        );
        // dd($request->all());
        // Navigation::create($request->all());
        $table = new SubNavigation();
        $table->name = $request->get('name');
        $table->is_show = $request->get('is_show');
        $table->route = $request->get('route');
        $table->nav_id = $request->get('nav_id');
        $table->is_active = $request->get('status');
        $table->save();
        Session::flash('success', __('Sub Navigation created.'));

        return redirect()->route('sub_navigation.index', $request->nav_id);
    }
}
