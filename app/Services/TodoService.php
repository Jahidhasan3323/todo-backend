<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TodoService
{
    /**
     * @param $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getData($request): LengthAwarePaginator
    {
        $query = Todo::query();
        $query->orderBy('id', 'DESC');
        return $query->paginate($request->get('per_page', config('constant.pagination')));
    }

    /**
     * @param $request
     * @return string
     */
    public function storeData($request): string
    {
        $data = $request->all();
        return Todo::create($data);
    }

    public function updateData($request, $id)
    {
        $data = $request->all();
        return Todo::where('id', $id)->update($data);
    }

    /**
     * @param $request
     * @return string
     */
    public function deleteData($id): string
    {
        return Todo::where('id', $id)->delete();
    }
}
