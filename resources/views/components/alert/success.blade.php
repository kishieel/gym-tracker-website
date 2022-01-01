@props([
    'dismissible' => false
])

<div class="alert alert-success alert-dismissible fade show d-flex align-items-center mt-4"
     role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill"/>
    </svg>
    <div>{{ $slot }}</div>
    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
