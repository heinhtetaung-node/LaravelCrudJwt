@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お問い合わせ管理</div>

                <div class="card-body">
                    <form method="POST" id="goBackForm" action="{{ route('inquiry.confirmback') }}">
                        @csrf
                    </form>
                    <form method="POST" action="{{ route('inquiry.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $inquiry['name'] }}</label>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">性別</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ ($inquiry['gender'] == 'male')? '男性' : '女性' }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $inquiry['email'] }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $inquiry['url'] }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">お問い合わせ内容</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $inquiry['message'] }}</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" onclick="goBack()" class="btn btn-warning">戻る</button>
                                <button type="submit" class="btn btn-primary">
                                    次へ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function goBack(){
        document.getElementById('goBackForm').submit();
    }
</script>
@endsection
