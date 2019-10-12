@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 120px; margin-bottom: 120px;">
                <div class="card-header">Invest in idea</div>

                <div class="card-body">
                    <form method="POST" action="/startInvestment" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idea_id" class="col-md-4 col-form-label text-md-right">Idea id</label>

                            <div class="col-md-6">
                                <input id="idea_id" type="number" class="form-control" name="idea_id" value="{{ $idea_id }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Invest
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
