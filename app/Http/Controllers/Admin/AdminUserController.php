<?php
 namespace App\Http\Controllers\Admin;

 use App\Http\Controllers\Controller;

 use App\Http\Requests\Admin\AdminUserFormRequest;

 use App\Models\AdminUser;

class AdminUserController extends Controller
{
    // Метод для отображения списка пользователей
    public function index()
    {
        $users = AdminUser::orderBy("created_at", "DESC")->paginate(3);
        return view('admin.admin_users.index', compact('users'));
    }

    // Метод для отображения формы создания нового пользователя
    public function create()
    {
        return view('admin.admin_users.create');
    }

    // Метод для сохранения нового пользователя
    public function store(AdminUserFormRequest  $request)
    {
        $data = $request->validated();

        AdminUser::create($data);

        return redirect(route("admin.admin_users.index"));
    }


    // Метод для отображения формы редактирования пользователя
    public function edit($id)
    {
        $user = AdminUser::findOrFail($id);
        return view('admin.admin_users.create', [
            'user' => $user,
        ]);
    }


    public function update(AdminUserFormRequest $request, $id)
    {
        $user = AdminUser::findOrFail($id);

        $user->update($request->validated());

        return redirect(route("admin.admin_users.index"));
    }


    public function destroy($id)
    {
        AdminUser::destroy($id);

        return redirect(route("admin.admin_users.index"));
    }
}
