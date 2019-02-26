@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ一覧</div>

                <div class="card-body">
                    <form action="" >
                        <input type="text" class="" name="name" 
                        value="{{ isset($param['name'])? $param['name'] : '' }}" />
                        <button class="btn btn-primary" type="submit">検索</button>
                    </form>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>問い合わせ日時</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $d)
                            <tr>
                                <td>{{ date('Y/m/d', strtotime($d->created_at)) }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td><a href="{{ url('admin/inquiry/'.$d->id) }}" >詳細
                                </a></td>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $datas->appends($param)->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
