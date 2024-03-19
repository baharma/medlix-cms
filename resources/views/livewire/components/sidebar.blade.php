<div>
    @foreach ($section as $side)
        <li>
            <a href="{{ url($side->section->url) }}" wire:navigate>
                <div class="parent-icon"><i class="{{ $side->section->icon }}"></i>
                </div>
                <div class="menu-title">{{ $side->section->name }}</div>
            </a>
        </li>
    @endforeach
</div>
