<div>
    <li>
        <a href="{{ url('admin/section') }}" wire:navigate>
            <div class="parent-icon"><i class="bx bx-list-plus"></i>
            </div>
            <div class="menu-title">Sidebar Section</div>
        </a>
    </li>
    <li>
        <a href="{{ url('admin/users') }}" wire:navigate>
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">Manage User</div>
        </a>
    </li>

    <li class="menu-label">Section CMS</li>
    <li class="@if (auth()->user()->default_cms != 1) d-none @endif">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-building-house'></i>
            </div>
            <div class="menu-title">Medlinx</div>
        </a>
        <ul>
            @foreach ($medlinx as $item)
                <li>
                    <a href="{{ $item->section->url }}" wire:navigate><i
                            class="bx bx-right-arrow-alt"></i>{{ $item->section->name }}</a>
                </li>
            @endforeach

        </ul>
    </li>
    <li class="@if (auth()->user()->default_cms != 2) d-none @endif">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-devices'></i>
            </div>
            <div class="menu-title">Izidok</div>
        </a>
        <ul>
            @foreach ($izidok as $izid)
                <li>
                    <a href="{{ $izid->section->url }}" wire:navigate><i
                            class="bx bx-right-arrow-alt"></i>{{ $izid->section->name }}</a>
                </li>
            @endforeach

        </ul>
    </li>
    <li class="@if (auth()->user()->default_cms != 3) d-none @endif">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-shield-alt-2'></i>
            </div>
            <div class="menu-title">Izikalim</div>
        </a>
        <ul>
            @foreach ($iziklaim as $izik)
                <li>
                    <a href="{{ $izik->section->url }}" wire:navigate><i
                            class="bx bx-right-arrow-alt"></i>{{ $izik->section->name }}</a>
                </li>
            @endforeach

        </ul>
    </li>
</div>
@push('script')
    <script>
        document.getElementById("logout").onclick = function() {
            document.getElementById("formLogout").submit();
        }
    </script>
@endpush
