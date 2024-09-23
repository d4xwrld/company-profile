<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/flowbite.min.js') }}"></script>

    @include('layouts.navbar');
</head>

<body>
    <div class="w-full flex flex-col md:flex-row items-center justify-center my-14 py-24" data-aos="fade-in"
        data-aos-duration="1000">
        <!-- Text Container -->
        <div class="w-full md:w-1/2 md:text-left p-4 md:p-12 text-container" data-aos="fade-right"
            data-aos-duration="1000">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">TEFA</span>
                RPL Nekat
            </h1>
            <p class="text-lg font-normal text-black lg:text-xl line-clamp-3">
                {{-- Sarana produksi yang berada di sekolah dan dijalankan berdasarkan prosedur dan memiliki standar industri
                yang bertujuan menghasilkan produk sesuai dengan kondisi nyata industri. Melayani jasa pembuatan
                berbagai produk industri perangkat lunak yang affordable dan berkualitas. --}}
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse officiis et blanditiis. Aliquid
                voluptatum unde fugiat quisquam eius sunt, dolores consequuntur cupiditate ex fuga voluptates eveniet
                doloremque ab numquam ullam.Inventore esse.
            </p>
        </div>
        <!-- Image Container -->
        <div class="flex justify-center md:justify-end w-full md:w-1/2 h-full md:h-auto mt-6 md:mt-0"
            data-aos="fade-left" data-aos-duration="1000">
            <div class="relative">
                <!-- Circle Background -->
                <div class="absolute inset-0 bg-indigo-700 rounded-full -z-10 w-[100%] h-[100%] aspect-square">
                </div>
                <!-- Adjust the image to exceed the circle -->
                <div class="relative w-64 h-64 md:w-80 md:h-80 overflow-visible">
                    <img class="absolute top-[-10%] left-[-10%] transform scale-110"
                        src="{{ asset('images/logo.png') }}" alt="image description">
                </div>
            </div>
        </div>
    </div>



    <!-- Section for products with wave SVG -->
    <section id="products" data-aos="fade-up" data-aos-duration="1000">
        <div class="mt-24">
            <!-- Wave SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 400">
                <path fill="#3D3B8E" fill-opacity="1"
                    d="M0,64L20,101.3C40,139,80,213,120,240C160,267,200,245,240,218.7C280,192,320,160,360,165.3C400,171,440,213,480,197.3C520,181,560,107,600,90.7C640,75,680,117,720,128C760,139,800,117,840,117.3C880,117,920,139,960,170.7C1000,203,1040,245,1080,261.3C1120,277,1160,267,1200,250.7C1240,235,1280,213,1320,213.3C1360,213,1400,235,1420,245.3L1440,256L1440,400L1420,400C1400,400,1360,400,1320,400C1280,400,1240,400,1200,400C1160,400,1120,400,1080,400C1040,400,1000,400,960,400C920,400,880,400,840,400C800,400,760,400,720,400C680,400,640,400,600,400C560,400,520,400,480,400C440,400,400,400,360,400C320,400,280,400,240,400C200,400,160,400,120,400C80,400,40,400,20,400L0,400Z">
                </path>
            </svg>
            <!-- Product Content Section -->
            <div style="background-color: #3D3B8E;">
                <div class="container mx-auto p-8">
                    <h2 class="text-4xl font-extrabold text-white text-center mb-8" data-aos="zoom-out-up"
                        data-aos-duration="1000">Our Products
                    </h2>
                    <div
                        class="flex flex-col md:flex-row items-stretch justify-center space-y-4 md:space-y-0 md:space-x-4">
                        @foreach ($posts as $post)
                            <div class="w-full md:w-1/3" data-aos="fade-up" data-aos-duration="1000">
                                <div
                                    class="flex flex-col h-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
                                    {{-- <img class="rounded-t-lg" src="{{ url('storage/' . $post->image_url) }}"
                                            alt="" /> --}}

                                    {{-- Carrousel --}}
                                    @if ($post->photos->isNotEmpty())
                                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                                            <!-- Carousel wrapper -->
                                            <div class="relative md:h-screen h-56 overflow-hidden rounded-lg md:h-66"
                                                data-aos="fade-down" data-aos-duration="1000">
                                                <div class="carousel-inner">
                                                    @foreach ($post->photos as $index => $photo)
                                                        <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                                                            data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('storage/' . $photo->image_path) }}"
                                                                class="absolute block w-full max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                                alt="{{ $photo->alt_text }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Slider indicators -->
                                                <div
                                                    class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                                    @foreach ($post->photos as $index => $photo)
                                                        <button type="button" class="w-3 h-3 rounded-full bg-gray-500"
                                                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                                            aria-label="Slide {{ $index + 1 }}"
                                                            data-carousel-slide-to="{{ $index }}"></button>
                                                    @endforeach
                                                </div>
                                                <!-- Slider controls -->
                                                <button type="button"
                                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                                    data-carousel-prev>
                                                    <span
                                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-500 group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-gray-700 group-focus:outline-none">
                                                        <svg class="w-4 h-4 text-white rtl:rotate-180"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 6 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 1 1 5l4 4" />
                                                        </svg>
                                                        <span class="sr-only">Previous</span>
                                                    </span>
                                                </button>
                                                <button type="button"
                                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                                    data-carousel-next>
                                                    <span
                                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-500 group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-gray-700 group-focus:outline-none">
                                                        <svg class="w-4 h-4 text-white rtl:rotate-180"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 6 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 9 4-4-4-4" />
                                                        </svg>
                                                        <span class="sr-only">Next</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <h1 class="text-bold text-center my-4" data-aos="fade-up"
                                            data-aos-duration="1000">Belum
                                            ada
                                            photo :(</h1>
                                    @endif
                                    <div class="p-5 flex-grow">
                                        <a href="#">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $post->title }}
                                                <span
                                                    class="bg-purple-300 text-purple-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                                                    {{ $post->category->name }}
                                                </span>
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{ $post->description }}
                                        </p>
                                    </div>
                                    <div class="p-5 mt-auto">
                                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            See Review
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- Wave SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 400" style="transform: rotate(180deg) scaleX(-1);">
            <path fill="#3D3B8E" fill-opacity="1"
                d="M0,64L20,101.3C40,139,80,213,120,240C160,267,200,245,240,218.7C280,192,320,160,360,165.3C400,171,440,213,480,197.3C520,181,560,107,600,90.7C640,75,680,117,720,128C760,139,800,117,840,117.3C880,117,920,139,960,170.7C1000,203,1040,245,1080,261.3C1120,277,1160,267,1200,250.7C1240,235,1280,213,1320,213.3C1360,213,1400,235,1420,245.3L1440,256L1440,400L1420,400C1400,400,1360,400,1320,400C1280,400,1240,400,1200,400C1160,400,1120,400,1080,400C1040,400,1000,400,960,400C920,400,880,400,840,400C800,400,760,400,720,400C680,400,640,400,600,400C560,400,520,400,480,400C440,400,400,400,360,400C320,400,280,400,240,400C200,400,160,400,120,400C80,400,40,400,20,400L0,400Z">
            </path>
        </svg>
    </section>
    <section id="profile">
        <div class="w-full flex flex-col md:flex-row items-center justify-center my-10 py-24" data-aos="fade-in"
            data-aos-duration="1000">
            <!-- Text Container -->
            <div class="w-full md:w-1/2 md:text-left p-4 md:p-12 text-container" data-aos="fade-right"
                data-aos-duration="1000">
                <h1 class="font-bold text-2xl">Profile</h1>
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl">
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">TEFA</span>
                    RPL Nekat
                </h1>
            </div>
            <!-- Right Side !-->
            <div class="flex justify-center md:justify-end w-full md:w-1/2 h-full md:h-auto p-8 md:mt-0"
                data-aos="fade-left" data-aos-duration="1000">
                <div id="accordion-color" data-accordion="collapse"
                    data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white"
                    class="shadow-lg">
                    <h2 id="accordion-color-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-color-body-1" aria-expanded="true"
                            aria-controls="accordion-color-body-1">
                            <span>Apa itu TeFa?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-color-body-1"
                        class="hidden h-[150px] overflow-hidden transition-all duration-300 ease-in-out"
                        aria-labelledby="accordion-color-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Dalam jalur pendidikan SMK, keterlibatan
                                Dunia Usaha dan Dunia Industri (DUDI) menjadi
                                aspek yang sangat krusial, mengingat kemajuan teknologi dan prosedur produksi/jasa yang
                                berlangsung dengan cepat. Implementasi TeFa di SMK akan memicu pembentukan kerja sama
                                yang saling menguntungkan antara SMK dan DUDI, menciptakan mekanisme yang memastikan SMK
                                dapat selalu beradaptasi dengan perkembangan industri/jasa secara otomatis. Ini mencakup
                                transfer pengetahuan teknologi, manajerial, evolusi kurikulum, pelaksanaan prakerin, dan
                                aspek lainnya.</p>
                            <p class="text-gray-500 dark:text-gray-400">Hubungan kerjasama antara SMK dengan industri
                                dalam pola pembelajaran Teaching Factory akan memiliki berdampak positif untuk membangun
                                mekanisme kerjasama (partnership) secara sistematis dan terencana. Penerapan pola
                                pembelajaran Teaching Factory merupakan interface dunia pendidikan kejuruan dengan dunia
                                industri, sehingga terjadi check and balance terhadap proses pendidikan pada SMK untuk
                                menjaga dan memelihara keselarasan (link and match) dengan kebutuhan pasar kerja.</p>
                        </div>
                    </div>
                    <h2 id="accordion-color-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                            aria-controls="accordion-color-body-2">
                            <span>Tujuan TeFa</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-color-body-2"
                        class="hidden h-[150px] overflow-hidden transition-all duration-300 ease-in-out"
                        aria-labelledby="accordion-color-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Meningkatkan kesiapan kerja, menyelaraskan
                                kompetensi, dan membentuk karakter
                                kerja lulusan SMK sesuai dengan kebutuhan Dunia Usaha dan Industri (DUDI). Hal ini
                                dicapai melalui proses pembelajaran yang berfokus pada produk/jasa (melibatkan rekayasa
                                Perangkat Pembelajaran) yang diadakan dalam lingkungan, suasana, serta tatakelola yang
                                mengikuti standar DUDI atau kondisi tempat kerja/usaha yang sebenarnya.</p>
                            <p class="text-gray-500 dark:text-gray-400">Selain itu Pembelajaran
                                melalui teaching factory bertujuan untuk menumbuh-kembangkan karakter dan etos kerja
                                (disiplin, tanggung jawab, jujur, kerjasama, kepemimpinan, dan lain-lain) yang
                                dibutuhkan DU/DI serta meningkatkan kualitas hasil pembelajaran dari sekedar
                                membekali kompetensi (competency based training) menuju ke pembelajaran yang
                                membekali kemampuan memproduksi barang/jasa (production based training).</p>
                        </div>
                    </div>
                    <h2 id="accordion-color-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                            aria-controls="accordion-color-body-3">
                            <span>Kurikulum dan Pembelajaran TeFa</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-color-body-3"
                        class="hidden h-[150px] overflow-hidden transition-all duration-300 ease-in-out"
                        aria-labelledby="accordion-color-heading-3">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Dalam prakteknya, TeFa tidak hanya
                                menuntut keterlibatan pihak industri, namun juga Pemerintah Daerah
                                (Pemda/Pemkot/Provinsi), orang tua, dan masyarakat dalam perencanaan, regulasi, serta
                                implementasinya. Sebagai bagian dari upaya mengubah budaya pembelajaran di sekolah,
                                Teaching Factory menghadirkan transformasi dari pembelajaran berbasis unit produksi
                                menjadi pembelajaran berbasis TeFa.</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Pelaku utama dalam pembelajaran berbasis
                                produk atau jasa ini adalah siswa, dengan bimbingan dari semua guru di sekolah, termasuk
                                guru adaptif, normatif, dan produktif. Tahapan pembelajaran, mulai dari penyusunan
                                materi pelajaran hingga magang industri, disesuaikan dengan produk atau layanan jasa
                                yang akan dihasilkan oleh siswa.</p>
                            <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                <li>Perangkat
                                    pembelajaran didesain berdasarkan produk/jasa sesuai dengan kebutuhan masyarakat
                                    umum.</li>
                                <li>Siswa
                                    terlibat secara langsung dalam proses pembelajaran berbasis produksi, sehingga
                                    kompetensi siswa berkembang melalui pengalaman pribadi dalam pembuatan, pelaksanaan,
                                    dan/atau penyelesaian produk/jasa, sesuai dengan standar, aturan, dan norma-norma
                                    kerja yang berlaku di DUDI.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer style="background-color: #3D3B8E;">
        <div class="w-full max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            x<span class="text-sm text-white">© 2024 <a href="{{ route('home') }}" class="hover:underline">TEFA
                    RPL</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-white sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</body>
<script src="{{ asset('js/aos.js') }}"></script>
<script>
    AOS.init();
</script>

</html>
