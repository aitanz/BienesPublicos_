<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 22/02/2015
 * Time: 11:59 AM
 */

namespace app\models;


class HtmlHelpers {

    public static function dropDownList($model, $parent_model_id, $id, $value, $string)
    {
        $rows = $model::find()->where([$parent_model_id => $id])->all();

        $droptions = "<option>Por favor elija una</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                $droptions .= '<option value='.$row->$value.'>'.$row->$string.'</option>';
            }
        }
        else{
            $droptions .= "<option>No results found</option>";
        }

        return $droptions;
    }

}

class HtmlHelpers2 {

    public static function dropDownList($model, $parent_model_id, $id, $second_parent, $id2, $value, $string)
    {
        $rows = $model::find()->where([$parent_model_id => $id, $second_parent => $id2])->all();

        $droptions = "<option>Por favor elija una</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                $droptions .= '<option value='.$row->$value.'>'.$row->$string.'</option>';
            }
        }
        else{
            $droptions .= "<option>No hay resultados</option>";
        }

        return $droptions;
    }

}