<div>
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/dashboard') }}" wire:navigate>
                <div class="parent-icon"><i class="bx bx-home-circle"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Section</li>
        @foreach ($section as $side)
            <li>
                <a href="{{ url($side->section->url) }}" wire:navigate>
                    <div class="parent-icon"><i class="{{ $side->section->icon }}"></i>
                    </div>
                    <div class="menu-title">{{ $side->section->name }}</div>
                </a>
            </li>
        @endforeach


        <li class="menu-label">End Section</li>
        <form action="{{ route('logout') }}" method="post" id="formLogout">
            @csrf
            <li>
                <a href="#" id="logout" type="submit">
                    <div class="parent-icon"><i class="bx bx-log-out"></i>
                    </div>
                    <div class="menu-title">Logout</div>
                </a>
            </li>
        </form>
    </ul>
</div>
@push('script')
    <script>
        document.getElementById("logout").onclick = function() {
            document.getElementById("formLogout").submit();
        }
    </script>
@endpush
