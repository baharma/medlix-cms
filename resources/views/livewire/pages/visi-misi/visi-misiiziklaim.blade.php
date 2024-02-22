<div>
    <div class="d-flex justify-content-end mb-4">
        @if ($idData)
        <a href="{{route('visi-misi.iziklaim-form',$idData->id)}}" class="btn btn-primary">
            <i class='bx bx-add-to-queue'></i> Add Visi-Misi
        </a>
        @else
        <a href="{{route('visi-misi.iziklaim-form')}}" class="btn btn-primary">
            <i class='bx bx-add-to-queue'></i> Add Visi-Misi
        </a>
        @endif
    </div>
   <div class="card p-4">
        @forelse ($data as $item)
        <div class="row">
            <div class="col p-2">
                <h3 class="text-center">Visi</h3>
                <p>
                    {!! $item->visi !!}
                </p>
            </div>
            <div class="col p-2">
                <h3 class="text-center">Misi</h3>
                <p>
                    {!! $item->misi !!}
                </p>
            </div>
        </div>
        @empty
        <div class="row">
            <h5>No data available Please Create</h5>
        </div>
        @endforelse


   </div>
</div>
