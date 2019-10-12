@extends('layouts.master')

@section('content')

<div>
    <form>
        <div class="form-row" style="padding: 10px">
            <div class="form-group col-md-3">
                <input type="text" class="form-control" id="keyword" placeholder="Keyword">
            </div>
            <div class="form-group col-md-3">
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                    <option>...</option>
                </select>
            </div>
            
            <div class="form-group col-md-3">     
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                    <option>...</option>
                </select>
            </div>
    
            <div class="form-group col-md-3"> 
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                    <option>...</option>
                </select>
            </div>
        </div>
    </form>


    @foreach ($myIdeas as $idea)

    <main role="main" class="container" style="padding-top:50px">
      <div class="jumbotron">
        <h1>TITLE - {{ $idea->title }}</h1>
        <p class="lead"><b>DESCRIPTION</b> - {{ $idea->description }}</p>
        <p class="lead"><b>INVESTMENT</b> - {{ $idea->investment }}</p>
        <p class="lead"><b>IDEA</b> - {{ $idea->status }}</p>
        <b>POC DOWNLOAD - </b><a href="/downloadPoc/{{ $idea->poc }}">{{ $idea->poc }}</a>
        <!-- <a class="btn btn-lg btn-primary" href="/docs/4.3/components/navbar/" role="button">View navbar docs &raquo;</a>
      </div> -->
    </main>

    @endforeach
</div>

@endsection