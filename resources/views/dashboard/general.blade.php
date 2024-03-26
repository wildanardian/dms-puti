@extends('layouts.app')

@section('content')
<div class="statbox widget box box-shadow">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Input Text</h4>
                <h1>{{ Auth::user()->hasRole('superadmin') ? 'superadmin' : 'not superadmin' }}</h1>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">

        <div class="row">
            <div class="col-lg-6 col-12 ">
                <form method="post">
                    <div class="form-group">
                        <p>Use input <code>type="text"</code>.</p>
                        <label for="t-text" class="visually-hidden">Text</label>
                        <input id="t-text" type="text" name="txt" placeholder="Some Text..." class="form-control" required="">
                        <input type="submit" name="txt" class="mt-4 btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
