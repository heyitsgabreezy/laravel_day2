<div {{ $attributes->merge([ 'class' => 'row wrapper border-bottom white-bg page-heading' ]) }}>
    <div class="col-sm-4">
        <h2>{{ $pagetitle }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">This is</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Breadcrumb</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            {{ $slot }}
        </div>
    </div>
</div>