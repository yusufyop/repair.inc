@extends('app')

@section('title')
FAQ | Repair.Inc
@endsection

@section('content')
<div class="product-section section mb-60 mt-60">
    <div class="container mb10">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4">FAQ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="accordion">

                    @foreach($faq as $fa)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{$fa->questions}}
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {{$fa->answer}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection