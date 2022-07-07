<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            // if($menu->parent_id == $parent_id) {
            //     $html .= '
            //     <tr>
            //     <td>'. $menu->id .'</td>
            //     <td>'. $char.$menu->name.'</td>
            //     <td>'. $menu->active .'</td>
            //     <td>'. $menu->updated_at .'</td>
            //     <td>&nbsp;</td>
            //     <td style="display: flex;">
            //         <a href="/admin/menus/edit/'.$menu->id.'">Edit</a>
            //         <a style="color: red;margin-left: 10px;padding-left: 10px; border-left: 1px solid #000;" href="javascript:void(0)" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')">Delete</a>
            //     </td>
            //     </tr>';
            // };
            $status = 'No';
            if ($menu->active == 1) {
                $status = 'Yes';
            }
            $html .= '
                <tr>
                <td>' . $menu->id . '</td>
                <td>' . $char . $menu->name . '</td>
                <td>' . $status . '</td>
                <td>' . $menu->updated_at . '</td>
                <td>&nbsp;</td>
                <td style="display: flex;">
                    <a href="/admin/menus/edit/' . $menu->id . '">Sửa</a>
                    <a style="color: red;margin-left: 10px;padding-left: 10px; border-left: 1px solid #000;" href="javascript:void(0)" onclick="removeRow(' . $menu->id . ',\'/admin/menus/destroy\')">Xoá</a>
                </td>
                </tr>';
            // unset($menus[$key]);

            // $html .= self::menu($menus, $menu->id, $char . '--');
        }
        return $html;
    }
}