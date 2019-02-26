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
		return $this->model->latest()->paginate(2);
	}

}