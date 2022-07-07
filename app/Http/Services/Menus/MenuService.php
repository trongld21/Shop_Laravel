<?php

namespace App\Http\Services\Menus;

use App\Models\Menu;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Contracts\Session\Session;

class MenuService
{

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            Menu::create([
                'name' => (string) $request->input('menu_name'),
                'parent_id' => (string) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'slug' => Str::slug($request->input('menu_name'), '-'),
                'active' => (string) $request->input('active')
            ]);

            $request->session()->flash('success', 'Thêm danh mục mới thành công!');
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function update($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->name = (string) $request->input('menu_name');
            $menu->parent_id = (int) $request->input('parent_id');
            $menu->description = (string) $request->input('description');
            $menu->content = (string) $request->input('content');
            $menu->active = (int) $request->input('active');

            // $menu->fill($request->input());
            $menu->save();
        }

        $request->session()->flash('success', 'Cập nhật thành công!');
        return true;
    }
}