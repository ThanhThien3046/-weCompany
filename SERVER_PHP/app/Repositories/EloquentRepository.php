<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model         = null;
    private   $_instanceEmpty = null;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Get object instance have properti null
     * @return mixed
     */
    public function getInstanceEmpty(){
        
        return $this->_instanceEmpty;
    }
    /**
     * Get object instance
     * @return mixed
     */
    public function getModelInstance(){
        
        return $this->_model;
    }
    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
        $this->_instanceEmpty = $this->_model;
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

        return $this->_model->create($attributes);
    }

    /**
     * save
     * @param array $attributes
     * @return mixed
     */
    public function save(array $attributes = array())
    {
        if(!empty($attributes)){

            if( isset( $attributes['id'] ) ){
                $id = $attributes['id'];
                unset($attributes['id']);
                if( $id ){
                    $this->_model = $this->_model->find($id);
                }
            }
            
            foreach ($attributes as $key => $value){
    
                $this->_model->$key = $value;
            }
        }

        return $this->_model->save();
    }
    /**
     * Insert
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function insert(array $attributes)
    {
        return $this->_model->insert($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * Pagination
     *
     * @param $id
     * @return bool
     */
    public function paginate($limit = 10)
    {
        return $this->_model->paginate($limit);
    }
    

    public function getBySlug( $slug ){
        
        return $this->_model->where('slug', $slug )->first();
    }

    public function get($param){
        
        return $this->_model->select($param)->get();
    }
    
    public function truncate(){
        
        return $this->_model->truncate();
    }

}