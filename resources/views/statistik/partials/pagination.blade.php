@if($statistik->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $statistik->links() }}
    </div>
@endif
