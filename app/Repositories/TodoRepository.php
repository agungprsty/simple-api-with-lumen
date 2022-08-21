<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository extends BaseRepository
{
    /**
    * Initiation todo by user ID.
    *
    * @return Todo
    */
    protected function todos()
    {
        $uid = auth()->user()->id;
        return Todo::where('uid', $uid);
    }

     /**
     * Get all todo.
     *
     * @return Todo
     */
    public function all()
    {
        return $this->todos()->get();
    }

     /**
     * Get by id todo.
     *
     * @param String $id
     * @return Todo
     */
    public function get_by_id(string $id)
    {
        return $this->todos()->find($id);
    }

    /**
     * Create new todo
     *
     * @return Todo
     */
    public function store()
    {
        $input = request()->all();
        $input['uid'] = auth()->user()->id;
    
        $todo = Todo::create($input);
        return $this->get_by_id($todo->id);
    }

    /**
     * Update todo
     *
     * @param Object $data
     * @return Todo
     */
    public function update(object $data)
    {
        $todo = $this->todos()->find($data->id);
        $todo->title = request()->input('title');
        $todo->complated = request()->input('complated');
        $todo->save();

        return $this->get_by_id($todo->id); 
    }

     /**
     * Delete todo.
     *
     * @param String $id
     * @return Todo
     */
    public function delete(string $id)
    {
        $todo = $this->todos()->find($id);
        if ($todo){
            $todo->delete();
        }

        return $todo;
    }
}