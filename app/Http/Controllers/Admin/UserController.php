<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Arr;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DB;
use App\Http\Controllers\Hash;
use App\Http\Controllers\Role;
use Illuminate\Http\Request;
use App\Models\User;
use function redirect;
use function view;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate(5)]);
    }

    /**
     * Отобразить форму для редактирования указанного

     * ресурса.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $res = false;
        foreach ($request->input('users') as $id => $user) {
            if ($id <= 1) continue;
            if( $usr = User::find((int)$id)) {
                $usr->is_admin = !empty($user['is_admin']) && $user['is_admin']==='on';
                $res = $usr->save();
            }
        }
        if ($res) {
            return redirect()->route('admin.users.index')->with('success', 'Изменения сохранены');
        }
        return back()->with('error', 'Не удалось сохраниться');
    }

    /**
     * Удалить указанный ресурс из хранилища
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer']
        ]);
        $user = User::destroy($request->get('id'));
        if ($user) {
            return redirect()->route('admin.users.index')->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось');
    }
}
