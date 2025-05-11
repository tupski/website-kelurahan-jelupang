<style>
    :root {
        --primary-color: {{ App\Models\Pengaturan::get('warna_utama', '#00A67C') }};
        --secondary-color: {{ App\Models\Pengaturan::get('warna_sekunder', '#008F6B') }};
    }
    
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-primary:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }
    
    .btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .text-primary {
        color: var(--primary-color) !important;
    }
    
    .bg-primary {
        background-color: var(--primary-color) !important;
    }
    
    .border-primary {
        border-color: var(--primary-color) !important;
    }
    
    .list-group-item.active {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    a {
        color: var(--primary-color);
    }
    
    a:hover {
        color: var(--secondary-color);
    }
    
    .hero-section {
        background-color: var(--primary-color);
        padding: 3rem 0;
        margin-bottom: 0;
    }
</style>
