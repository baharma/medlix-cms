<div>
    <div class="card p-3">
        <div class="d-flex justify-content-start">
            <a href="{{route('news')}}" class="h5">
                <i class='bx bx-arrow-back'></i> Back
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <h1>{{$news->title}}</h1>
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{$news->thumbnail}}" alt="" class="image-news">
        </div>
        <div class="d-flex justify-content-center">
            <div class="container-fluid">
                {!! $news->description !!}
            </div>
        </div>
    </div>
</div>
