<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.pages.role.index',[
            'title' => 'Data Role'
        ]);
    }

    public function get()
    {
        if(request()->ajax())
        {
            $roles = Role::get();
            return response()->json($roles);
        }
    }

    public function data()
    {
        if(request()->ajax())
        {
            $data = Role::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($model){
                        $action = "<button class='btn btn-sm btn-warning btnPermission mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-eye'></i> Hak Akses</button><button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
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
            'name' => ['required',Rule::unique('roles')->ignore(request('id'))]
        ]);

        Role::updateOrCreate([
            'id'  => request('id')
        ],[
            'name' => request('name')
        ]);

        if(request('id'))
        {
            $message = 'Role berhasil disimpan.';
        }else{
            $message = 'Role berhasil ditambahakan.';
        }
        return response()->json(['status'=>'success','message' => $message]);
    }

    public function removePermission()
    {
        $role_id = request('role_id');
        $permission = request('permission');
        Role::findById($role_id)->revokePermissionTo($permission);
        return response()->json(['status'=>'success','message' => 'Hak Akses di role berhasil dihapus.']);
    }

    public function addPermission()
    {
        $id = request('id');
        $name = request('name');
        Role::findById($id)->givePermissionTo($name);
        return response()->json(['status'=>'success','message' => 'Hak Akses di role berhasil ditambahkan.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return response()->json(['status'=>'success','message' => 'Data Role berhasil dihapus.']);
    }
}
