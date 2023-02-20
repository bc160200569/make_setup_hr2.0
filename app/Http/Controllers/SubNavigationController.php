<?php

namespace App\Http\Controllers;

use App\Models\SubNavigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

// use DataTables;
// use Session;
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
                ->editColumn('is_show', function ($data){
                    if ($data->is_show == 0) return 'No';
                    if ($data->is_show == 1) return 'Yes';
                    // return 'Cancel';
                })
                ->editColumn('route', function ($data){
                    if ($data->route == '') return 'No Route';
                    if ($data->route != '') return $data->route;
                    // return 'Cancel';
                })
                ->addColumn('action', function ($data) {
                    $statusAction = '<td>
                                        <span class="badge '.($data->is_active == 1 ? "bg-success" : "bg-danger").'">'.($data->is_active == 1 ? "Active" : "Inactive").'</span>
                                        <div class="overlay-edit">                                        
                                            <button type="button" value="'.$data->uuid.'" class="btn btn-icon btn-secondary" id="editSub"><i class="feather icon-edit-2"></i></button> 
                                            <a href="'.route('sub_navigation.updateStatus', $data->uuid).'" class="btn btn-icon '.($data->is_active == 1 ? "btn-danger" : "btn-success").' btn-status"><i class="feather '.($data->is_active == 1 ? "icon-eye-off" : "icon-eye").'"></i></a>
                                            <a href="'.route('sub_navigation.destroy', $data->uuid).'" class="btn btn-icon btn-danger btn-delete"><i class="feather icon-trash-2"></i></a>
                                        </div>
                                    </td>';
                    return $statusAction;
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['action'])
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
    public function edit($id){
        $data = SubNavigation::where('uuid', $id)->get();
        // dd($navigation);
        // dd($id);
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }
    public function update(Request $request){
        // dd($request->all());
        // dd($request->id);
        // $id = Navigation::where('uuid',$request->id)->get('id');
        // echo $id;
        // $table = Navigation::find($request->id);
        $nav_id = $request->get('nav_id');
        $table = SubNavigation::where('uuid',$request->id)->first();
        // dd($table);
        $table->name = $request->get('name');
        $table->is_show = $request->get('is_show');
        $table->route = $request->get('route');
        $table->is_active = $request->get('status');
        $table->update();

        Session::flash('success', __('Sub Navigation updated.'));

        return redirect()->route('sub_navigation.index', $nav_id);
    }
    public function updateStatus(SubNavigation $subnavigation){
        // dd($subnavigation);
        // dd(!$navigation->is_active);
        if ($subnavigation) {
            $subnavigation->is_active = !$subnavigation->is_active;
            $subnavigation->save();
            return $this->sendResponse(true, 'Sub Navigation status updated successfully.');
        }

        return $this->sendResponse(false, 'Navigation not found.', [], 404);
    }
    public function destroy(SubNavigation $subnavigation)
    {
        if ($subnavigation) {
            $subnavigation->delete();
            return $this->sendResponse(true, 'Sub Navigation deleted successfully.');
        }

        return $this->sendResponse(false, 'Sub Navigation not found.', [], 404);
    }
}
