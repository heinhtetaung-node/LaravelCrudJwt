<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InquiryRepository;
use App\Http\Requests\InquiryRequest;

class InquiryController extends Controller
{
    private $inquiryRepo;

    public function __construct(InquiryRepository $inquiryRepo)
    {
        $this->inquiryRepo = $inquiryRepo;
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InquiryRequest $request)
    {        
        $param = $request->only('name', 'email', 'gender', 'url', 'message');
        $arr = $this->inquiryRepo->create($param);
        if($arr['success'] == true){
            return response()->json($arr);
        }
        return response()->json($arr)->setStatusCode(422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
