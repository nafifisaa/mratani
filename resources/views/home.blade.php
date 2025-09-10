@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center justify-center text-white relative overflow-hidden" style="background: linear-gradient(135deg, rgba(92, 193, 127, 0.8) 0%, rgba(74, 230, 131, 0.9) 100%), url('{{ asset("assets/fix_paksarwan.jpeg") }}') center/cover no-repeat;">
    <div class="absolute inset-0 bg-black/20"></div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 text-4xl animate-bounce opacity-20">🌱</div>
    <div class="absolute top-40 right-20 text-3xl animate-bounce opacity-30 delay-1000">🌿</div>
    

    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto my-8">
        <!-- Main Title -->
        <h1 class="font-bold mb-6 text-shadow">
            <span class="block text-5xl sm:text-6xl lg:text-7xl font-bold">MRATANI</span>
            <span class="block text-xl sm:text-xl md:text-2xl font-medium italic mb-4">(Mugi Rahayu Tani)</span>
            <span class="block text-3xl sm:text-4xl lg:text-5xl font-semibold opacity-90">
                Holticultura's Seeds
            </span>
        </h1>

        <!-- Description -->
        <p class="text-lg sm:text-xl lg:text-2xl mb-12 max-w-3xl mx-auto leading-relaxed opacity-95">
            Langsung dari petani berpengalaman di Desa Kebakalan.
            Kualitas terjamin, hasil panen melimpah, harga terjangkau.
        </p>

        <!-- Stats -->
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-6 sm:space-y-0 sm:space-x-12 mb-12">
            <div class="text-center">
                <div class="text-4xl font-bold">15+</div>
                <div class="text-sm opacity-80">Tahun Pengalaman</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">1000+</div>
                <div class="text-sm opacity-80">Petani Puas</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">{{ $products->count() }}</div>
                <div class="text-sm opacity-80">Varietas Unggulan</div>
            </div>
        </div>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="#contact"
               class="inline-flex items-center space-x-2 bg-white text-green-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                <span>Hubungi Kami</span>
                <i class="fas fa-arrow-right"></i>
            </a>
            <a href="#products"
               class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-sm px-8 py-4 rounded-xl font-semibold hover:bg-white/30 transform hover:scale-105 transition-all duration-300">
                <span>Lihat Produk</span>
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-center">
        <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center mb-2">
            <div class="w-1 h-3 bg-white rounded-full mt-2 animate-bounce"></div>
        </div>
        <p class="text-xs uppercase tracking-wider opacity-80">Scroll untuk melihat lebih</p>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wider mb-4">
                Tentang Kami
            </span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">
                Cerita MRATANI
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Perjalanan kami dalam menghadirkan benih cabai berkualitas tinggi
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <!-- Content -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">
                        Dedikasi untuk Kualitas
                    </h3>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        MRATANI adalah usaha pertanian keluarga yang didirikan oleh Bapak Sarwan di Desa Kebakalan.
                        Dengan pengalaman lebih dari 15 tahun dalam budidaya cabai, kami berkomitmen untuk menyediakan
                        benih cabai berkualitas tinggi yang telah terbukti memberikan hasil panen yang melimpah.
                    </p>
                </div>

                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">
                        Misi Kami
                    </h3>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        Membantu petani Indonesia mendapatkan benih cabai terbaik dengan harga yang terjangkau.
                        Setiap benih yang kami produksi telah melalui proses seleksi ketat dan perawatan khusus
                        untuk memastikan kualitas dan daya tumbuh yang optimal.
                    </p>
                </div>

                <!-- Features -->
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-seedling text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Kualitas Terjamin</h4>
                            <p class="text-gray-600 text-sm">Proses seleksi ketat untuk setiap benih</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-leaf text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Ramah Lingkungan</h4>
                            <p class="text-gray-600 text-sm">Budidaya berkelanjutan dan alami</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Founder Card -->
            <div class="sticky top-24">
                <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
                    <div class="text-center mb-6">
                        <div class="relative inline-block">
                            <img src="{{ asset('assets/sarwan.jpg') }}"
                                 alt="Bapak Sarwan - Pendiri MRATANI"
                                 class="w-32 h-32 rounded-full object-cover border-4 border-green-100">
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-award text-white text-sm"></i>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">Bapak Sarwan</h3>
                        <p class="text-green-600 font-semibold mb-4">Pendiri & Petani Ahli</p>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Petani berpengalaman dengan dedikasi tinggi untuk menghasilkan benih cabai terbaik.
                            Memimpin MRATANI dengan visi menjadi penyedia benih cabai terpercaya di Indonesia.
                        </p>

                        <div class="flex justify-center space-x-8">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">15+</div>
                                <div class="text-xs text-gray-500 uppercase tracking-wider">Tahun Pengalaman</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">100%</div>
                                <div class="text-xs text-gray-500 uppercase tracking-wider">Organik</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="py-20 lg:py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wider mb-4">
                Produk Unggulan
            </span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">
                Benih Cabai Berkualitas
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pilihan varietas terbaik yang telah terbukti memberikan hasil panen optimal
            </p>
        </div>

        <!-- Products Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img 
    src="{{ Str::startsWith($product->image, 'products/') ? asset('storage/' . $product->image) : asset($product->image) }}" 
    alt="{{ $product->name }}"
    class="w-full h-64 object-cover hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $product->category }}
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="text-green-600 text-sm font-semibold uppercase tracking-wider mb-2">
                        {{ $product->category }}
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        {{ $product->name }}
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ $product->description }}
                    </p>

                    @if($product->features)
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($product->features as $feature)
                        <span class="inline-flex items-center space-x-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                            <i class="fas fa-check"></i>
                            <span>{{ $feature }}</span>
                        </span>
                        @endforeach
                    </div>
                    @endif

                    <a href="https://wa.me/6285740007900?text=Halo%20Pak%20Sarwan,%20saya%20tertarik%20dengan%20{{ urlencode($product->name) }}"
                       target="_blank"
                       class="w-full inline-flex items-center justify-center space-x-2 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                        <i class="fab fa-whatsapp"></i>
                        <span>Pesan Sekarang</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tips Section -->
@if($articles->count() > 0)
<section id="tips" class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wider mb-4">
                Tips & Panduan
            </span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">
                Cara Menanam Cabai yang Benar
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Panduan lengkap dari ahli untuk hasil panen yang optimal
            </p>
        </div>

        <!-- Tips Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $index => $article)
            <div class="bg-gray-50 rounded-3xl p-8 hover:bg-white hover:shadow-xl transition-all duration-300 relative">
                <div class="absolute top-6 right-6 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <span class="font-bold text-green-600">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-seedling text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    {{ $article->title }}
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ $article->excerpt }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Contact Section -->
<section id="contact" class="py-20 lg:py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wider mb-4">
                Hubungi Kami
            </span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">
                Mari Berkolaborasi
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Siap membantu Anda mendapatkan benih cabai terbaik
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Contact Info -->
            <div class="space-y-8">
                <!-- WhatsApp -->
                <div class="bg-white rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 mb-1">WhatsApp</h3>
                            <p class="text-gray-600 text-sm mb-2">Respon cepat dalam 5 menit</p>
                            <a href="https://wa.me/6285740007900"
                               target="_blank"
                               class="text-green-600 font-semibold hover:text-green-700 transition-colors">
                                +62 857-4000-7900
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="bg-white rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-phone text-blue-600 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 mb-1">Telepon</h3>
                            <p class="text-gray-600 text-sm mb-2">Senin - Sabtu, 08:00 - 17:00</p>
                            <a href="tel:+6285740007900"
                               class="text-green-600 font-semibold hover:text-green-700 transition-colors">
                                +62 857-4000-7900
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-white rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-envelope text-purple-600 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600 text-sm mb-2">Untuk pertanyaan detail</p>
                            <a href="mailto:info@mratani.com"
                               class="text-green-600 font-semibold hover:text-green-700 transition-colors">
                                info@mratani.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl p-8 shadow-lg">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">
                        Kirim Pesan
                    </h3>
                    <p class="text-gray-600">
                        Isi form di bawah dan kami akan menghubungi Anda segera
                    </p>
                </div>

                <form id="contactForm" class="space-y-6">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text"
                                       id="name"
                                       name="name"
                                       class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                       placeholder="Masukkan nama lengkap Anda"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="fas fa-phone absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                       placeholder="Contoh: 081234567890"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                            Apa yang ingin Anda pesan? <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="fas fa-comment absolute left-4 top-4 text-gray-400"></i>
                            <textarea id="message"
                                      name="message"
                                      rows="4"
                                      class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors resize-none"
                                      placeholder="Contoh: Saya ingin memesan benih cabe rawit merah 2 kg untuk lahan 1000 m²"
                                      required></textarea>
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2">
                        <i class="fab fa-whatsapp"></i>
                        <span>Kirim ke WhatsApp</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-gray-300 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Brand -->
            <div class="lg:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    <span class="text-2xl">🌶️</span>
                    <span class="text-xl font-bold text-white">MRATANI</span>
                </div>
                <p class="text-gray-400 leading-relaxed mb-6 max-w-md">
                    Penyedia benih cabai berkualitas tinggi langsung dari petani terpercaya
                    di Desa Kebakalan. Kualitas terjamin, hasil panen melimpah.
                </p>
            </div>

            <!-- Products -->
            <div>
                <h3 class="font-semibold text-white mb-4">Produk</h3>
                <ul class="space-y-2">
                    @foreach($products->take(3) as $product)
                    <li><a href="#products" class="hover:text-green-400 transition-colors">{{ $product->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} MRATANI. Semua hak cipta dilindungi.
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/6285740007900"
   target="_blank"
   class="fixed bottom-6 left-6 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 z-40 animate-bounce">
    <i class="fab fa-whatsapp text-xl"></i>
    <span class="sr-only">Chat WhatsApp</span>
</a>

<script>
// Contact form submission
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    if (!name || !phone || !message) {
        alert('Mohon lengkapi semua field yang wajib diisi');
        return;
    }

    const whatsappMessage = encodeURIComponent(
        `Halo Pak Sarwan, saya ${name} dan saya ingin ${message}.\n\nNomor telepon saya: ${phone}\n\nTerima kasih!`
    );
    const whatsappUrl = `https://wa.me/6285740007900?text=${whatsappMessage}`;

    window.open(whatsappUrl, '_blank');

    // Reset form
    this.reset();
});

// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>
@endsection