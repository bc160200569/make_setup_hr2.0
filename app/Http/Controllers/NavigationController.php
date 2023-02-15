<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;

use DataTables;
use Session;


class NavigationController extends Controller
{
    //
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
            
    //         $navigations = Navigation::query();
    //         // dd($navigations);

    //         return Datatables::of($navigations)
    //             ->editColumn('sub_nav', function ($nav){
    //                 if ($nav->sub_nav == 0) return 'No';
    //                 if ($nav->sub_nav == 1) return 'Yes';
    //                 // return 'Cancel';
    //             })
    //             ->editColumn('is_show', function ($nav){
    //                 if ($nav->is_show == 0) return 'No';
    //                 if ($nav->is_show == 1) return 'Yes';
    //                 // return 'Cancel';
    //             })
    //             ->editColumn('route', function ($nav){
    //                 if ($nav->route == '') return 'No Route';
    //                 if ($nav->route != '') return 'route';
    //                 // return 'Cancel';
    //             })
    //             ->addColumn('action', function ($nav) {
    //                 $statusAction = '<td>
    //                                     <span class="badge '.($nav->is_active == 1 ? "bg-success" : "bg-danger").'">'.($nav->is_active == 1 ? "Active" : "Inactive").'</span>
    //                                     <div class="overlay-edit">
    //                                         <a href="'.route('users.edit', $nav->uuid).'" class="btn btn-icon btn-secondary"><i class="feather icon-edit-2"></i></a>
    //                                         <a href="'.route('users.updateStatus', $nav->uuid).'" class="btn btn-icon '.($nav->is_active == 1 ? "btn-danger" : "btn-success").' btn-status"><i class="feather '.($nav->is_active == 1 ? "icon-eye-off" : "icon-eye").'"></i></a>
    //                                         <a href="'.route('users.destroy', $nav->uuid).'" class="btn btn-icon btn-danger btn-delete"><i class="feather icon-trash-2"></i></a>
    //                                     </div>
    //                                 </td>';
    //                 return $statusAction;
    //             })
    //             ->addColumn('sub_navigation', function ($nav){
    //                 $sub = '<td>
    //                             <span class="badge '.($nav->sub_nav == 1 ? "bg-primary" : "bg-danger").'">'.($nav->sub_nav == 1 ? "View Sub-Navigation" : "Add Sub-Navigation").'</span>
    //                             <div class="overlay-edit">
    //                                 <a href="'.route('users.edit', $nav->uuid).'" class="btn btn-icon btn-secondary"><i class="feather icon-list"></i></a>
    //                             </div>
    //                         </td>';
    //                 return $sub;
    //             })
    //             ->editColumn('icon', function ($nav){
    //                 $icon = '<td>
    //                             <i class="'.($nav->icon).'"></i>
    //                         </td>';
    //                 return $icon;
    //             })
    //             ->editColumn('id', 'ID: {{$id}}')
    //             ->rawColumns(['action', 'sub_navigation', 'icon'])
    //             ->make(true);
    //     }
        
    //     return view('navigations.index');
    // }
    public function navigation_index(Request $request){
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
                                            <button type="button" value="'.$nav->uuid.'" class="btn btn-icon btn-secondary" id="editNavigation"><i class="feather icon-edit-2"></i></button>
                                            
                                            <a href="'.route('users.updateStatus', $nav->uuid).'" class="btn btn-icon '.($nav->is_active == 1 ? "btn-danger" : "btn-success").' btn-status"><i class="feather '.($nav->is_active == 1 ? "icon-eye-off" : "icon-eye").'"></i></a>
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
<<<<<<< HEAD
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['action', 'sub_navigation'])
=======
                ->editColumn('icon', function ($nav){
                    $icon = '<td>
                                <i class="'.($nav->icon).'"></i>
                            </td>';
                    return $icon;
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['action', 'sub_navigation', 'icon'])
>>>>>>> b16822fd44c772a18b761493d0e17db839e1ed9d
                ->make(true);
        }
        return view('navigations.navigation_index');
    }
    public function store(Request $request){
        request()->validate([
            'name' => 'required',
            ],
            // [
            //     'name.required'=>"Navigation not add Name Field Required.",
            // ]
        );
        // dd($request->all());
        Navigation::create($request->all());
        Session::flash('success', __('messages.Navigation_created'));

        return redirect()->route('navigation_index');
    }
    public function navigation_edit($id){
        $navigation = Navigation::where('uuid', $id)->get();
        // dd($navigation);
        // dd($id);
        return response()->json([
            'status' => 200,
            'navigation' => $navigation,
        ]);
    }
    public function navigation_update(Request $request){
        // dd($request->all());
        $table = Navigation::where('uuid',$request->id);
        $table->name = $request->name;
        $table->icon = $request->icon;
        $table->sub_nav = $request->sub_nav;
        $table->is_show = $request->is_show;
        $table->route = $request->route;
        $table->is_active = $request->status;
        $table->update();

        Session::flash('success', __('messages.Navigation_updated'));

        return redirect()->route('navigation_index');
    }
}
