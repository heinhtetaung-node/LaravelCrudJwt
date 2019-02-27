<?php

namespace App\Repositories;

use App\Models\Inquiry;
use App\Repositories\BaseRepository;

class InquiryRepository extends BaseRepository
{
	public function __construct(Inquiry $inquiry){
		$this->model = $inquiry;
	}

	public function getAll($param){
		try{
			$query = $this->model->select('*');
			
			if(isset($param['name']) && $param['name'] != ''){
				$keyword = $param['name'];
				$arr = explode(' ', $keyword);
				if(sizeof($arr) > 1){
					$query = $query->search($keyword); // call custom fuzzy search function
				}else{
					$query = $query->where('name', 'like', '%'.$keyword.'%');
				}
			}

			if(isset($param['email']) && $param['email'] != ''){
				$query = $query->where('email', 'like', '%'.$param['email'].'%');
			}
			
			$orderarr = ['created_at','name'];
			$orderbyarr = ['asc','desc'];
			if(isset($param['order']) && isset($param['orderby']) && in_array($param['order'], $orderarr) && in_array($param['orderby'], $orderbyarr)){
				$query = $query->orderBy($param['order'], $param['orderby']);
			}else{
				$query = $query->orderBy('created_at', 'desc');
			}

			$arr = $query->paginate(2);
		
		}catch(\Exception $e){
			return ['success' => false, 'result' => []];
		}
		return ['success' => true, 'result' => $arr];
	}

}
