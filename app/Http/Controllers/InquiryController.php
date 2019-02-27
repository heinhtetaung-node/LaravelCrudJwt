<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InquiryRepository;
use App\Http\Requests\InquiryRequest;
use Illuminate\Notifications\Notifiable;
use App\Notifications\RegisterSuccess;

class InquiryController extends Controller
{
    use Notifiable;

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
     * Api Get api/get/summary?limit=&page=&name=&email=&order=&orderby=
     */
    public function getDatas(Request $request)
    {
        $param = $request->only('page', 'limit', 'name', 'email', 'sort', 'orderby', 'order');
        $datas = $this->inquiryRepo->getAll($param);
        if($datas['success'] == false){
            return response()->json($datas);
        }
        $res = $datas['result'];
        $arr = [];
        foreach ($res as $r) {
            $arr[] = [
                'name' => $r->name,
                'email' => $r->email,
                'url' => $r->url,
                'body' => $r->message,
                'date' => date('m-d-Y H:i:s', strtotime($r->created_at))
            ];
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Get Successfully',
            'datas' => $arr,
            'max' => $res->total()
        ]);
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
        if($arr['success'] == true){
            $this->notify(new RegisterSuccess($arr['result']));
        }
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
