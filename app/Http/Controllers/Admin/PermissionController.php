<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermissionM;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.pages.permission.index',[
            'title' => 'Data Hak Akses'
        ]);
    }

    public function data()
    {
        if(request()->ajax())
        {
            $data = Permission::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($model){
                        $action = "<button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function getByRole()
    {
        if(request()->ajax())
        {
            $id = request('id');
            $permissions = Role::findById($id)->permissions;
            return response()->json($permissions);
        }
    }

    public function get()
    {
        if(request()->ajax())
        {
            $id = request('id');
            $rolePermissions = Role::findById($id)->permissions->pluck('name');
            $permissions = PermissionM::WhereNotIn('name',$rolePermissions)->get();
            return response()->json($permissions);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required',Rule::unique('permissions')->ignore(request('id'))]
        ]);

        Permission::updateOrCreate([
            'id'  => request('id')
        ],[
            'name' => request('name')
        ]);

        if(request('id'))
        {
            $message = 'Hak Akses berhasil disimpan.';
        }else{
            $message = 'Hak Akses berhasil ditambahakan.';
        }
        return response()->json(['status'=>'succcess','message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return response()->json(['status'=>'succcess','message' => 'Data Hak Akses berhasil dihapus.']);
    }
}
