<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
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

    <section id="profile">
        <div class="w-full flex flex-col md:flex-row items-center justify-center my-10 py-24" data-aos="fade-in"
            data-aos-duration="1000">
            <!-- Text Container -->
            <div class="w-full md:w-1/2 md:text-left p-4 md:p-12 text-container" data-aos="fade-right"
                data-aos-duration="1000">
                <h1 class="font-bold text-2xl">Profile</h1>
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">TEFA</span>
                    RPL Nekat
                </h1>
            </div>
            <!-- Right Side !-->
            <div class="flex justify-center md:justify-end w-full md:w-1/2 h-full md:h-auto p-8 md:mt-0"
                data-aos="fade-left" data-aos-duration="1000">
                <div id="accordion-color" data-accordion="collapse"
                    data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white" class="shadow-lg">
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
            <span class="text-sm text-white">© 2024 <a href="{{ route('home') }}" class="hover:underline">TEFA
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
