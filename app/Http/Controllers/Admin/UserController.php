<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.user.index', [
            'title' => 'Data User'
        ]);
    }

    public function data()
    {
        if (request()->ajax()) {
            $data = User::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('avatar', function ($model) {
                    $img = '<img src=' . $model->avatar() . ' class="img-fluid rounded-circle" style="max-height:60px">';
                    return $img;
                })
                ->addColumn('role', function ($model) {
                    return $model->getRoleNames()->first() ?? '-';
                })
                ->editColumn('status', function ($model) {

                    if ($model->status == 1) {
                        $tog = '<div class="custom-control custom-switch">
                                <input type="checkbox" value=' . $model->status . ' class="custom-control-input btnStatus" checked id=' . $model->id . ' data-id="' . $model->id . '">
                                <label class="custom-control-label" for=' . $model->id . '></label>
                            </div>';
                    } else {
                        $tog = '<div class="custom-control custom-switch">
                                    <input type="checkbox"  value=' . $model->status . ' class="custom-control-input btnStatus" id=' . $model->id . ' data-id="' . $model->id . '">
                                    <label class="custom-control-label" for=' . $model->id . '></label>
                                </div>';
                    }

                    return $tog;
                })
                ->addColumn('action', function ($model) {
                    $role = $model->getRoleNames()->first();
                    $action = "<button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-name='$model->name'  data-role='$role' data-username='$model->username' data-email='$model->email' data-status='$model->status'><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                    return $action;
                })
                ->rawColumns(['action', 'status', 'avatar'])
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
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')->ignore(request('id')), 'alpha_num'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(request('id'))],
            'status' => ['required', 'in:1,0'],
            'role' => ['required'],
            'avatar' => ['image', 'mimes:jpg,jpeg,png']
        ]);

        if (request('id')) {
            $item = User::find(request('id'));
            if (request('password')) {
                request()->validate([
                    'password' => ['required', 'min:6', 'confirmed'],
                    'password_confirmation' => ['required'],
                ]);
                $password = bcrypt(request('password'));
            }else{
                $password = $item->password;
            }
            if (request()->file('avatar')) {
                Storage::disk('public')->delete($item->avatar);
                $avatar = request()->file('avatar')->store('users', 'public');
            } else {
                $avatar = $item->avatar;
            }
        } else {
            $password = bcrypt(request('password'));
            if (request()->file('avatar')) {
                $avatar = request()->file('avatar')->store('users', 'public');
            } else {
                $avatar = NULL;
            }
        }

        $user = User::updateOrCreate([
            'id'  => request('id')
        ], [
            'name' => request('name'),
            'email' => request('email'),
            'username' => request('username'),
            'password' => $password,
            'role' => request('role'),
            'avatar' => $avatar,
            'status' => request('status'),
        ]);
        request('id') !== NULL ?  $user->syncRoles(request('role')) :  $user->assignRole(request('role'));
      
        return response()->json(['status' => 'success', 'message' => 'User berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('admin.pages.user.edit', [
            'title' => 'Edit User',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->all();

        $item = User::findOrFail($id);
        request()->validate([
            'name' => ['required'],
            'username' => ['required', Rule::unique('users')->ignore($item->id), 'alpha_num'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($item->id)],
            'status' => ['required', 'in:1,0'],
            'role' => ['required'],
            'avatar' => ['image', 'mimes:jpg,jpeg,png']
        ]);
        if (request('password')) {
            request()->validate([
                'password' => ['required', 'min:6', 'confirmed'],
                'password_confirmation' => ['required'],
            ]);
            $data['password'] = bcrypt(request('password'));
        } else {
            $data['password'] = $item->password;
        }
        // dd($data);
        if (request()->file('avatar')) {
            if ($item->avatar) {
                Storage::disk('public')->delete($item->avatar);
            }
            $data['avatar'] = request()->file('avatar')->store('users', 'public');
        } else {
            $data['avatar'] = $item->avatar;
        }
        $item->update($data);
        $item->syncRoles(request('role'));
        return response()->json(['status' => 'success', 'message' => 'User berhasil diedit.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        Storage::disk('public')->delete($item->avatar);
        $item->delete();
        return response()->json(['status' => 'success', 'message' => 'User berhasil dihapus.']);
    }

    public function changeStatus()
    {
        $status = request('status');
        $item = User::findOrFail(request('id'));
        if ($status == 1) {
            $item->status = 0;
        } elseif ($status == 0) {
            $item->status = 1;
        }
        $item->save();

        return response()->json(['status' => 'success', 'message' => 'Status User berhasil diubah.']);
    }
}
