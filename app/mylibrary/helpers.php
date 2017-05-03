<?php

/**
 * @Author: Nguyen Tien Dat
 * @Date:   2017-04-22 15:40:02
 * @Last Modified by:   H110
 * @Last Modified time: 2017-04-23 11:22:14
 */

function saiki_category($data, $parentid = 0, $str = '', $selected = 0)
{
    foreach ($data as $category) {
        if ($category->parent_id == $parentid) {
            if ($selected == $category->id && $selected != 0) {
                echo '<option value="'. $category->id  .'" selected>'. $str . $category->name .'</option>';
            } else {
                echo '<option value="'. $category->id  .'" >'. $str . $category->name .'</option>';
            }
            saiki_category($data, $category->id, $str . '--', $selected);
        }
    }
}

function listCategory($data, $parentid = 0, $str = '')
{
    foreach ($data as $category) {
        if ($category->parent_id == $parentid) {
            echo '<tr>';
            if ($str == '') {
                echo '<td><strong> ' . $str . $category->name . '</strong> </td>';
            } else {
                echo '<td>' . $str . $category->name . '</td>';
            }
            echo '<td> ' . $category->created_at->diffForHumans() . ' </td>
                <td><a href="category/' . $category->id . '/edit" ><button class="btn btn-link" ><i class="editu fa fa-edit"></i></button></a> </td>
                <td><form action="category/' . $category->id . '" method="POST" >
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="deleteu btn-link" onclick="return confirm(&quot;Do you want to delete ?&quot;)"" ><i class="deleteu fa fa-times"></i></button>
                    </form>
                </td>
             </tr>';
            listCategory($data, $category->id, $str .'-- ');
        }
    }
}
