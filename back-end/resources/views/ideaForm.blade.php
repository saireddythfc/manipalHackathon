@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 120px; margin-bottom: 120px;">
                <div class="card-header"><b>Post Idea</b></div>

                <div class="card-body">
                    <form method="POST" action="/postIdea" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right"><b>Title</b></label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right"><b>Description</b></label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right"><b>Company Name</b></label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control" name="company_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="poc" class="col-md-4 col-form-label text-md-right"><b>POC upload</b></label>

                            <div class="col-md-6">
                                <input id="poc" type="file" class="form-control" name="poc">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="investment" class="col-md-4 col-form-label text-md-right"><b>Investment needed</b></label>

                            <div class="col-md-6">
                                <input id="investment" type="number" class="form-control" name="investment">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Idea
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
