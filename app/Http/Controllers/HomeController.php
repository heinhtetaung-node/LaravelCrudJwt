<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InquiryRepository;

class HomeController extends Controller
{
    private $inquiryRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InquiryRepository $inquiryRepo)
    {
        $this->inquiryRepo = $inquiryRepo;
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $param = $request->only('page', 'limit', 'name', 'email', 'sort', 'orderby', 'order');
        $datas = $this->inquiryRepo->getAll($param);
        return view('home', ['datas' => $datas['result'], 'param' => $param]);
    }

    public function detail($id)
    {
        $inquiry = $this->inquiryRepo->detail($id);
        if($inquiry['success'] == false){
            return response(view('errors.404'), 404);
        }
        return view('detail', ['inquiry' => $inquiry['result']]);  
    }
}
