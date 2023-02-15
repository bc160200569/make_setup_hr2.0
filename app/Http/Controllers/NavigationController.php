<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;

use DataTables;


class NavigationController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $navigations = Navigation::query();
            // dd($navigations);

            return Datatables::of($navigations)
                ->editColumn('sub_nav', function ($nav){
                    if ($nav->sub_nav == 0) return 'No';
                    if ($nav->sub_nav == 1) return 'Yes';
                    // return 'Cancel';
                })
                ->editColumn('is_show', function ($nav){
                    if ($nav->is_show == 0) return 'No';
                    if ($nav->is_show == 1) return 'Yes';
                    // return 'Cancel';
                })
                ->editColumn('route', function ($nav){
                    if ($nav->route == '') return 'No Route';
                    if ($nav->route != '') return 'route';
                    // return 'Cancel';
                })
                ->addColumn('action', function ($nav) {
                    $statusAction = '<td>
                                        <span class="badge '.($nav->is_active == 1 ? "bg-success" : "bg-danger").'">'.($nav->is_active == 1 ? "Active" : "Inactive").'</span>
                                        <div class="overlay-edit">
                                            <a href="'.route('users.edit', $nav->uuid).'" class="btn btn-icon btn-secondary"><i class="feather icon-edit-2"></i></a>
                                            <a href="'.route('users.updateStatus', $nav->uuid).'" class="btn btn-icon '.($nav->is_active == 1 ? "btn-danger" : "btn-success").' btn-status"><i class="feather '.($nav->is_active == 1 ? "icon-x-circle" : "icon-check-circle").'"></i></a>
                                            <a href="'.route('users.destroy', $nav->uuid).'" class="btn btn-icon btn-danger btn-delete"><i class="feather icon-trash-2"></i></a>
                                        </div>
                                    </td>';
                    return $statusAction;
                })
                ->addColumn('sub_navigation', function ($nav){
                    $sub = '<td>
                                <span class="badge '.($nav->sub_nav == 1 ? "bg-primary" : "bg-danger").'">'.($nav->sub_nav == 1 ? "View Sub-Navigation" : "Add Sub-Navigation").'</span>
                                <div class="overlay-edit">
                                    <a href="'.route('users.edit', $nav->uuid).'" class="btn btn-icon btn-secondary"><i class="feather icon-list"></i></a>
                                </div>
                            </td>';
                    return $sub;
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['action', 'sub_navigation'])
                ->make(true);
        }
        
        return view('navigations.index');
    }
}
