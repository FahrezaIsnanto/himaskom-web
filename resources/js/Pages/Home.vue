<template>
    <vue-particles 
        class="fixed left-0 right-0 h-full -z-10" 
        color="#ef4444"
        :particlesNumber="50"
        :particleSize="3"
        shapeType="edge"
        :moveSpeed="2"
        ></vue-particles>
    <!-- Navbar -->
    <div class="h-20 bg-black fixed z-50 left-0 right-0">
        <div class="container flex justify-between items-center h-full">
            <div>
                <img src="/images/logo.png"  width="60" />
            </div>
            <div class="hidden md:block flex-1 ml-3">
                <div class="h-full flex justify-center items-center"> 
                    <a href="#home" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] cursor-pointer" v-smooth-scroll>
                        <p class="text-[#f9f9f9] font-poppins font-light tracking-wider uppercase text-sm">BERANDA</p>
                    </a>
                    <a href="#news" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] cursor-pointer" v-smooth-scroll>
                        <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-sm">BERITA</p>
                    </a>
                    <a href="#about" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] cursor-pointer" v-smooth-scroll>
                        <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-sm">TENTANG</p>
                    </a>
                    <a href="#vision-mission" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] cursor-pointer" v-smooth-scroll>
                        <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-sm">VISI MISI</p>
                    </a>
                    <a  href="#division" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] cursor-pointer" v-smooth-scroll>
                        <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-sm">BIDANG</p>
                    </a>
                    <a href="https://wa.me/6281326138080?text=Halo+Humas+HIMASKOM" target="_blank" class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-400 rounded-lg font-viga font-bold tracking-wider ml-auto hover:text-white text-sm">HUBUNGI KAMI</a>
                </div>
            </div>
            <div @click="showNavbarMobile" class="w-12 mt-2 p-3 rounded-lg bg-gray-700 cursor-pointer md:hidden">
                <div class="h-1 bg-white rounded-lg"></div>
                <div class="h-1 bg-white rounded-lg mt-1"></div>
                <div class="h-1 bg-white rounded-lg mt-1"></div>
            </div>
        </div>
    </div>
    <!-- End Of Navbar -->

    <!-- Navbar Mobile -->
    <div class="fixed top-0 left-0 right-0 bottom-0 bg-[#1f1f1f] z-50 transition-all duration-500" :class="statusNavbarMobile===1?'translate-x-0':'translate-x-full'">
        <div class="container flex justify-between items-center pt-3">
            <div>
                <img src="/images/logo.png"  width="60" />
            </div>
            <div @click="closeNavbarMobile" class="w-12 mt-2 p-3 rounded-lg bg-gray-700 cursor-pointer">
                <div class="h-1 bg-white rounded-lg rotate-45 translate-x-[-3px] translate-y-[2px] ml-1"></div>
                <div class="h-1 bg-white rounded-lg -rotate-45 translate-x-[-3px] translate-y-[-2px] ml-1"></div>
            </div>
        </div>
        <div class="mt-10">
            <div class="container">
                <a @click.prevent="closeNavbarMobile" href="#home" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] cursor-pointer" v-smooth-scroll>
                    <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-xl">BERANDA</p>
                </a>
                <a  @click.prevent="closeNavbarMobile" href="#news" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] mt-5 cursor-pointer" v-smooth-scroll>
                    <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-xl">BERITA</p>
                </a>
                <a  @click.prevent="closeNavbarMobile" href="#about" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] mt-5 cursor-pointer" v-smooth-scroll>
                    <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-xl">TENTANG</p>
                </a>
                <a @click.prevent="closeNavbarMobile" href="#vision-mission" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] mt-5 cursor-pointer" v-smooth-scroll>
                    <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-xl">VISI MISI</p>
                </a>
                <a @click.prevent="closeNavbarMobile" href="#division" class="block px-4 py-2 rounded-xl hover:bg-[rgba(128,128,128,.2)] mt-5 cursor-pointer" v-smooth-scroll>
                    <p class="text-[#f9f9f9] font-poppins tracking-wider uppercase text-xl">BIDANG</p>
                </a>
                <a  href="https://wa.me/6281326138080?text=Halo+Humas+HIMASKOM" target="_blank" class="block w-full py-3 bg-gradient-to-r from-red-600 to-red-400 rounded-lg font-viga font-bold mt-10 tracking-wide hover:text-white text-center select-none cursor-pointer">HUBUNGI KAMI</a>
            </div>
        </div>
    </div>
    <!-- End Of Navbar  Mobile -->

    <!-- Hero -->
    <div id="home" class="h-[512px] rounded-bl-[50px] bg-cover bg-center relative  pt-16">
        <video class="w-full h-full absolute object-cover z-0 rounded-bl-[50px] shadow-lg" poster="/images/widya_pura.png" autoplay muted loop><source src="/videos/bumper.mp4" type="video/mp4"></video>
        <div class="relative z-1 container flex flex-col justify-center items-center" data-aos="zoom-in" data-duration="300">
            <h1 class="font-viga text-white text-[55px] md:text-[100px] font-bold text-center tracking-widest mt-24 drop-shadow-2xl" >HIMASKOM</h1>
            <p class="font-poppins text-white text-sm md:text-xl font-light text-center mt-2 md:mt-1 tracking-wide drop-shadow-2xl" >Himpunan Mahasiswa Teknik Komputer<br/>Universitas Diponegoro</p>
            <div class="border mt-44 md:mt-10 p-1 rounded-lg">
                <a href="#about" class="block py-4 px-16 bg-red-500 text-white font-poppins uppercase hover:bg-slate-900 rounded-lg" v-smooth-scroll>
                Tentang Kami
                </a>
            </div>
        </div>
    </div>
    <!-- End Of Hero -->
    
    <!-- News -->
    <div id="news" class="pt-20 relative" data-aos="slide-right" data-duration="300" data-aos-delay="300">
        <div class="absolute left-0 top-0 w-full h-full flex flex-col -z-40">
            <p class="text-[280px] -mt-2 ml-5 tracking-widest text-left font-Tungsten-Bold  opacity-5">WE ARE</p>
            <p class="text-[320px] ml-auto tracking-wider font-Tungsten-Bold -mt-48 opacity-[0.03]">HIMASKOM</p>
        </div>
        <div class="container relative border-l-2 border-[#767470]">
            <p class="font-Tungsten-Bold text-[65px] md:text-[105px] text-red-500 uppercase drop-shadow-lg tracking-wide whitespace-nowrap">BERITA TERBARU</p>
        </div>
        <div class="overflow-x-auto pb-5 -ml-7 -mt-12 md:-mt-16">
            <div class="container flex">
                  <!-- Card Berita -->
            <a :href="news.link" v-for="news in news" class="block grow-0 shrink-0 basis-[450px] mr-2 bg-white rounded-lg shadow-lg py-2 cursor-pointer">
                <!-- Foto -->
                <img :src="`/storage/${news.image}`"  class="h-64 mx-auto"/>
                <!-- Tanggal -->
                <p class="font-poppins text-sm mt-2 text-center">
                  {{ news.date }}
                </p>
                <!-- Judul -->
                <p class="font-viga mt-2 text-gray-800 text-center">
                 {{ news.title }}
                </p>
            </a>
            
        </div>
        </div>
        <div class="container">
            <a href="https://www.instagram.com/himaskomundip/" target="_blank" class="font-poppins text-sm text-red-500 uppercase cursor-pointer font-semibold hover:text-red-700">Buka Laman Berita <span class="ml-2">➡</span></a>
        </div>
    </div>
    <!-- End Of News -->

    <!-- Introduction -->
    <div id="about" class="mt-12 pt-10 border-black bg-red-500 rounded-3xl md:rounded-b-none" data-aos="slide-right" data-duration="300">
        <div class="container md:flex">
            <div class="md:basis-1/2 md:mr-5">
                <p class="text-white text-5xl font-viga uppercase tracking-wider">Himaskom?</p>
                <p class="mt-12 text-white uppercase font-poppins tracking-wide text-xl">Satu Asa Sejuta Cerita</p>
                <p class="mt-3 text-white font-poppins tracking-wide leading-8 text-sm">Merupakan wadah dari mahasiswa Teknik Komputer untuk menyalurkan kegiatan dan kreativitas mahasiswa. Melalui Himaskom, mahasiswa Sistem Komputer dapat terus memupuk profesionalisme tentang keilmuan di bidang komputer dan kemampuan dalam bidang manajemen dan organisasi yang bertujuan untuk kemajuan Sistem Komputer itu sendiri.</p>
            </div>
            <div class="hidden md:block md:basis-1/2">
                <img src="/images/dekanat.png" class="w-full"/>
            </div>
        </div>
        <div class="md:hidden">
            <img src="/images/dekanat.png" class="w-full -mt-8"/>
        </div>
    </div>
    <!-- End Of Intoduction -->

    <!-- Vision Mission  -->
    <div id="vision-mission" class="pt-12 bg-slate-900 pb-8 rounded-b-3xl" data-aos="slide-left" data-duration="300">
        <div class="container">
            <div>
                <!-- Visi -->
                <p class="font-viga text-4xl text-white uppercase">VISI</p>
                <p class=" text-slate-400 tracking-wide leading-8 mt-2 text-sm">Menjadi lembaga yang melayani warga Teknik Komputer untuk mencapai prestasi dengan mengutamakan rasa kekeluargaan dan bersinergi aktif dengan lembaga lembaga yang ada di Universitas Diponegoro untuk optimalisasi kinerja Himpunan Mahasiswa Sistem Komputer</p>
            </div>
            <div class="mt-10">
                <p class="font-viga text-4xl text-white uppercase">MISI</p>
                <ol class="text-slate-400 list-decimal tracking-wide px-5 leading-8 mt-2 text-sm">
                    <li>Pengembangan kelompok studi jurusan bagi mahasiswa Sistem Komputer untuk mencapai prestasi</li>
                    <li>Melaksanakan kegiatan pengabdian masyarakat.</li>
                    <li>Melaksanakan proses kaderisasi yang berbasis kekeluargaan dan prestatif.</li>
                    <li>Optimalisasi peran UKM untuk meningkatkan rasa kekeluargaan serta mencapai prestasi bagi mahasiswa Sistem Komputer</li>
                    <li>Mengoptimalkan peran lembaga kerohanian di Sistem Komputer</li>
                    <li>Menyebarkan informasi ke mahasiswa Sistem Komputer baik yang bersifat akademik maupun non-akademik  yang terkait dengan mahasiswa Sistem Komputer</li>
                    <li>Menjalin komunikasi dan kerjasama ke lembaga – lembaga lain yang ada di Universitas Diponegoro</li>
                </ol>
                <!-- Misi -->
            </div>
        </div>
    </div>
    <!-- End Of Vision Mission -->

    <!-- Division -->
    <div id="division" class="pt-12 relative" data-aos="zoom-in" data-duration="300">
        <div class="absolute left-0 top-0 border-2 w-full h-full flex flex-col -z-40">
            <p class="text-[280px] -mt-2 ml-5 tracking-widest text-left font-Tungsten-Bold  opacity-5">WE ARE</p>
            <p class="text-[320px] ml-auto tracking-wider font-Tungsten-Bold -mt-48 opacity-[0.03]">HIMASKOM</p>
        </div>
        <div class="container relative border-l-2 border-[#767470]">
            <p class="text-[82px] md:text-[110px] text-red-500 uppercase mb-4 font-Tungsten-Bold">Bidang</p>
        </div>
        <div class="overflow-x-auto pb-5 -ml-7 -mt-16 md:-mt-20">
            <div class="container flex">
           <!-- Card Bidang -->
           <div v-for="division in division" class="grow-0 shrink-0 basis-64 mr-2">
                <!-- Foto -->
                <img :src="`/storage/${division.image}`" class="h-[400px] rounded-3xl flex items-end justify-center bg-cover"/>
                <p class="font-viga text-blue-500 text-center mb-12 text-xl -mt-12">
                        {{ division.title }}
                </p>
            </div>
           
        </div>
        </div>
    </div>
    <!-- End Of Division -->

    <!-- Pre Footer -->
    <div class="bg-[#292929] h-24 flex items-center justify-center overflow-x-hidden" data-aos="slide-left" data-duration="300">
        <marquee class="text-white font-poppins text-sm text-center tracking-wider md:text-lg w-full md:w-1/2 mx-auto">TEKKOM COMPILE SUCCESS, TEKKOM NULL ERROR, TEKKOM RUNNING</marquee>
    </div>
    <!-- End Of Pre Footer -->

    <!-- Footer -->
    <div class="bg-[#111] py-3 pb-24">
        <div class="container">
            <div class="px-8 py-2">
                <div class="flex justify-center items-center mb-5">
                    <div class="w-8 rounded-lg bg-gray-700 cursor-pointer mx-2 hover:bg-gray-800">
                        <img src="/images/icons/instagram.png"/>
                    </div>
                    <div class="w-8 rounded-lg bg-gray-700 cursor-pointer p-2  hover:bg-gray-800">
                        <img src="/images/icons/line.png"/>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <img src="/images/logo.png"  width="60" />
                </div>
                <p class="text-white font-poppins text-sm mb-2 text-center mt-5">Alamat Teknik Komputer UNDIP</p>
                <iframe class="rounded-lg mx-auto w-[250px] h-[150px] md:w-[400px] md:h-[300px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1130.655200830179!2d110.4398732159461!3d-7.051531659214834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708d3d9c55e8cb%3A0x67f23b9ef2c77c35!2sDepartemen%20Teknik%20Komputer%20FT%20Universitas%20Diponegoro!5e0!3m2!1sid!2sid!4v1678867198399!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p class="text-white text-sm font-poppins mt-5 text-center font-light tracking-wider">Copyright &copy; 2023 All Rights Reserved | HIMASKOM</p>
            </div>
        </div>
    </div>
    <!-- End Of Footer -->
</template>

<script>
import AOS from 'aos';
import 'aos/dist/aos.css';
export default {
    components: {

    },
    props: {
        news: Object,
        division: Object
    },
    data() {
        return {
            statusNavbarMobile: 0,
        }
    },
    methods: {
        showNavbarMobile(){
            this.statusNavbarMobile = 1;
        },
        closeNavbarMobile(){
            this.statusNavbarMobile = 0;
        }
    },
    mounted() {
       AOS.init();
    }
}
</script>