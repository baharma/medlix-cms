<nav class="navbar navbar-expand-lg  fixed-bottom " style="background-color: #FFF67E;">
    <div class="container">

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="{{ url('dashboard') }}"> <button class="btn btn-success"> <i class="bx bx-arrow-back"></i>
                            Dashboard</button></a>
                </li>
                <form action="{{ route('publish') }}" method="post" id="form-publish">
                    @csrf
                    <input type="hidden" name="app" value="{{ $app['name'] }}">
                    <li class="nav-item" type="submit">
                        <a href="#" id="publish"> <button class="btn btn-primary"> <i
                                    class="bx bx-cloud-upload"></i>
                                PUBLISH</button></a>
                    </li>
                </form>
                <li class="nav-item">
                    <a class="#" href="#"> Tampilan Landing page sebelum semua data di publish</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
