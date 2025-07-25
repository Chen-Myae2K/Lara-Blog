<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-body">
        <h4>{{ $title ?? 'Card title' }}</h4>
        <hr>
        {{ $slot }}
    </div>
</div>
