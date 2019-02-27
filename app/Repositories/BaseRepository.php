<?php

namespace App\Repositories;

class BaseRepository
{
	protected $model;
	
	protected $defaulterr = ['success' => false, 'error' => 'db error occoured'];

	public function create($param){
		try{
			$arr = $this->model->create($param);
		}catch(\Exception $e){
			return $this->defaulterr;
		}
		return ['success' => true, 'result' => $arr];
	}

	public function detail($id){
		try{
			$arr = $this->model->findOrFail($id);
		}catch(\Exception $e){
			return $this->defaulterr;
		}
		return ['success' => true, 'result' => $arr];
	}

	public function update($id, $param){
		try{
			$arr = $this->model->findOrFail($id);
			$res = $this->model->update($arr);			
		}catch(\Exception $e){
			return $this->defaulterr;
		}
		return ['success' => true, 'result' => $res];
	}

	public function destroy($id)
    {
    	try{
        	$res = $this->model->destroy($id);
        }catch(\Exception $e){
			return $this->defaulterr;
		}
        return ['success' => true];
    }
}
