<?php

namespace App\Helper;

trait BaseQuery
{
    /**
     * add new record
     */
    public function add($model, $data)
    {
        return $model->create($data);
    }

    /**
     * get all record
     */
    public function get_all($model)
    {
        return $model->all();
    }

    /**
     * get record by its id
     */
    public function get_by_id($model, $id)
    {
        return $model->findOrFail($id);
    }

    /**
     * get record by column
     */
    public function get_by_column($model, $column, $value)
    {
        return $model->where($column, $value)->get();
    }

    /**
     * get record by column single
     */
    public function get_by_column_single($model, $column, $value)
    {
        return $model->where($column, $value)->first();
    }

    /**
     * delete record by its id
     */
    public function delete($model, $id)
    {
        return $model->findOrFail($id)->delete();
    }
}
