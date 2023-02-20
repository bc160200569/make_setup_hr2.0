@section('title')
    {{ $title }}
@endsection
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    @if(@$button1['allow'])
                        <a class="btn btn-primary font-weight-bold btn-sm px-4 font-size-base ml-2 float-end" data-bs-toggle="modal" data-bs-target="{{ $button1['id'] }}">{{ $button1['name'] }}</a>
                    @endif
                    @if(@$button2['allow'])
                        <a href="{{ $button2['link'] }}" class="btn btn-danger font-weight-bold btn-sm px-4 font-size-base ml-2 float-end" style="margin-right: 10px;">{{ $button2['name'] }}</a>
                    @endif
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                
                
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">{{$title}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>