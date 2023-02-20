<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

// use DataTables;
// use Session;

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
                // ->editColumn('id', 'ID: {{$id}}')
                // ->rawColumns(['action', 'sub_navigation'])
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
        
        return view('navigations.index');
    }
    // public function navigation_index(Request $request){
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
    //                 if ($nav->route != '') return $nav->route;
    //                 // return 'Cancel';
    //             })
    //             ->addColumn('action', function ($nav) {
    //                 $statusAction = '<td>
    //                                     <span class="badge '.($nav->is_active == 1 ? "bg-success" : "bg-danger").'">'.($nav->is_active == 1 ? "Active" : "Inactive").'</span>
    //                                     <div class="overlay-edit">                                        
    //                                         <button type="button" value="'.$nav->uuid.'" class="btn btn-icon btn-secondary" id="editNavigation"><i class="feather icon-edit-2"></i></button> 
    //                                         <a href="'.route('navigation.updateStatus', $nav->uuid).'" class="btn btn-icon '.($nav->is_active == 1 ? "btn-danger" : "btn-success").' btn-status"><i class="feather '.($nav->is_active == 1 ? "icon-eye-off" : "icon-eye").'"></i></a>
    //                                         <a href="'.route('navigation.destroy', $nav->uuid).'" class="btn btn-icon btn-danger btn-delete"><i class="feather icon-trash-2"></i></a>
    //                                     </div>
    //                                 </td>';
    //                 return $statusAction;
    //             })
    //             ->addColumn('sub_navigation', function ($nav){
    //                 $sub = '<td>
    //                             <span class="badge '.($nav->sub_nav == 1 ? "bg-primary" : "bg-danger").'">'.($nav->sub_nav == 1 ? "Sub-Navigation" : "Sub-Navigation").'</span>
    //                             <div class="overlay-edit">
    //                                 <a href="'.route('users.edit', $nav->uuid).'" class="btn btn-icon btn-secondary"><i class="feather icon-list"></i></a>
    //                             </div>
    //                         </td>';
    //                 return $sub;
    //             })
    //             ->editColumn('id', 'ID: {{$id}}')
    //             ->rawColumns(['action', 'sub_navigation'])
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
    //     return view('navigations.navigation_index');
    // }
    public function store(Request $request){
        request()->validate([
            'name' => 'required',
            ],
            // [
            //     'name.required'=>"Navigation not add Name Field Required.",
            // ]
        );
        // dd($request->all());
        // Navigation::create($request->all());
        $table = new Navigation();
        $table->name = $request->get('name');
        $table->icon = $request->get('icon');
        $table->sub_nav = $request->get('sub_nav');
        $table->is_show = $request->get('is_show');
        $table->route = $request->get('route');
        $table->is_active = $request->get('status');
        $table->save();
        Session::flash('success', __('Navigation created.'));

        return redirect()->route('navigation.index');
    }
    public function edit($id){
        $navigation = Navigation::where('uuid', $id)->get();
        // dd($navigation);
        // dd($id);
        return response()->json([
            'status' => 200,
            'navigation' => $navigation,
        ]);
    }
    public function update(Request $request){
        // dd($request->id);
        // $id = Navigation::where('uuid',$request->id)->get('id');
        // echo $id;
        // $table = Navigation::find($request->id);
        $table = Navigation::where('uuid',$request->id)->first();
        // dd($table);
        $table->name = $request->get('name');
        $table->icon = $request->get('icon');
        $table->sub_nav = $request->get('sub_nav');
        $table->is_show = $request->get('is_show');
        $table->route = $request->get('route');
        $table->is_active = $request->get('status');
        $table->update();

        Session::flash('success', __('Navigation updated.'));

        return redirect()->route('navigation.index');
    }
    public function updateStatus(Navigation $navigation){
        // dd(!$navigation->is_active);
        if ($navigation) {
            $navigation->is_active = !$navigation->is_active;
            $navigation->save();
            return $this->sendResponse(true, 'Navigation status updated successfully.');
        }

        return $this->sendResponse(false, 'Navigation not found.', [], 404);
    }
    public function destroy(Navigation $navigation)
    {
        if ($navigation) {
            $navigation->delete();
            return $this->sendResponse(true, 'Navigation deleted successfully.');
        }

        return $this->sendResponse(false, 'Navigation not found.', [], 404);
    }
}
