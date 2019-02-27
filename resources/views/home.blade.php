@extends('layouts.app')

@section('content')
<?
$orderby = 'asc';
$orderbyarr = ['asc','desc'];
if(isset($param['orderby']) && $param['orderby'] != ''){
    $orderby = $param['orderby'];
    if(!in_array($orderby, $orderbyarr)){
        $orderby = 'asc';
    }
}
$order = '';
$orderarr = ['created_at','name'];
if(isset($param['order']) && $param['order'] != ''){
    $order = $param['order'];
    if(!in_array($orderby, $orderbyarr)){
        $orderby = 'created_at';
    }
}
if($order == ""){
    $orderby = "";
}
$created_order_arrow = "&#9660;"; //down
if($order == 'created_at' && $orderby == 'asc'){
    $created_order_arrow = "&#9650;"; //up
}
if($order == 'created_at' && $orderby == 'desc'){
    $created_order_arrow = "&#9660;";
}

if($order == 'name' && $orderby == 'asc'){
    $name_order_arrow = "&#9650;";
}
if($order == 'name' && $orderby == 'desc'){
    $name_order_arrow = "&#9660;";
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ一覧</div>

                <div class="card-body">
                    <form action="" >
                        <input type="text" class="" placeholder="名前" name="name" 
                        value="{{ isset($param['name'])? $param['name'] : '' }}" />
                        <input type="text" class="" placeholder="メールアドレス" name="email" 
                        value="{{ isset($param['email'])? $param['email'] : '' }}" />
                        <input type="hidden" id="order" name="order" value="{{ $order }}">
                        <input type="hidden" id="orderby" name="orderby" value="{{ $orderby }}">
                        <button class="btn btn-primary btn-sm" type="submit" id="search">検索</button>
                    </form>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><a href="#" onclick="makeSort('created_at', '{{ $orderby }}')">問い合わせ日時 {!! ($order=='created_at' || $order=='')? $created_order_arrow : '' !!}</a></th>
                                <th><a href="#" onclick="makeSort('name', '{{ $orderby }}')">名前
                                {!! ($order=='name')? $name_order_arrow : '' !!}</a></th>
                                <th>メールアドレス</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(sizeof($datas) > 0 )
                            @foreach($datas as $d)
                                <tr>
                                    <td>{{ date('Y/m/d', strtotime($d->created_at)) }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>
                                        <a href="{{ route('inquiry.detail', $d->id) }}" >
                                            <button class="btn btn-info btn-sm">詳細</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="4">No datas</td></tr>
                        @endif
                        </tbody>
                    </table>           
                    {{ $datas->appends($param)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function makeSort(order, orderby){
        if(orderby == ""){ orderby = "asc";}
        var oldorder = document.getElementById('order').value;
        var oldorderby = document.getElementById('orderby').value;
        if(oldorderby === orderby && oldorder == order){            
            orderby = (orderby == 'desc')? 'asc' : 'desc';
        }
        if(oldorder != order){
            orderby = 'asc';
        }
        document.getElementById('order').value = order;
        document.getElementById('orderby').value = orderby;
        document.getElementById('search').click();
        return false;
    }
</script>
@endsection
