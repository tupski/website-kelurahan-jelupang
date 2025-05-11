<div class="hero-section" style="background-color: {{ App\Models\Pengaturan::get('warna_utama', '#00A67C') }}; position: relative; overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">{{ $title }}</h1>
                <p class="fs-5">{{ $subtitle }}</p>
            </div>
        </div>
    </div>
    <div style="position: absolute; bottom: -5px; left: 0; right: 0; height: 50px; background-color: #fff; border-radius: 100% 100% 0 0;"></div>
</div>
