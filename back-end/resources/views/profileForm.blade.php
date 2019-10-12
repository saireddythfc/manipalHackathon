@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 100px; margin-top: 120px;">
                <div class="card-header">Profile form</div>

                <div class="card-body">
                    <form method="POST" action="/processProfile" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="resume" class="col-md-4 col-form-label text-md-right">Resume</label>

                            <div class="col-md-6">
                                <input id="resume" type="file" class="form-control" name="resume">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skills" class="col-md-4 col-form-label text-md-right">Skills</label>

                            <div class="col-md-6">
                                <input id="skillls" type="text" class="form-control" name="skills">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit profile
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="/downloadResume">Download Current Resume</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
