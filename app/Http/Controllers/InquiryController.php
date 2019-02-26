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
        return view('inquiry');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(InquiryRequest $request)
    {
        $param = $request->only('name', 'email', 'gender', 'url', 'message');
        $request->session()->flash('inquiry', $param);
        $request->session()->keep(['inquiry']);
        return redirect()->route('inquiry.confirm');
    }

    public function confirm(Request $request){
        if (!$request->session()->exists('inquiry')) {
            return redirect('/');
        }
        $inquiry = $request->session()->get('inquiry');
        $request->session()->reflash();
        return view('inquiry_confirm', ['inquiry' => $inquiry]);
    }

    public function confirmback(Request $request){
        if (!$request->session()->exists('inquiry')) {
            return redirect('/');
        }
        $inquiry = $request->session()->get('inquiry');
        return redirect('/')->withInput($inquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (!$request->session()->exists('inquiry')) {
            return redirect('/');
        }
        $param = $request->session()->get('inquiry');        
        $arr = $this->inquiryRepo->create($param);
        return view('complete', ['result' => $arr]);
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
