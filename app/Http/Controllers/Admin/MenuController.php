<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menus\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create()
    {
        return view('admin.menus.add', [
            'title' => 'GotechJSC - Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function index()
    {
        return view('admin.menus.list', [
            'title' => 'GotechJSC - Danh Sách Danh Mục',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);
        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công!'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function show(Menu $menu)
    {
        return view('admin.menus.edit', [
            'title' => 'GotechJSC - Chỉnh Sửa Danh Mục ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);

        return redirect('/admin/menus/list');
    }
}