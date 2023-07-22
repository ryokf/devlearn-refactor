@extends('layout.main')
@section('content')
    <section class="header relative pt-16 z-1 items-center block   ">
        <div class="container mx-auto pt-16">
            <h5 class="text-xl font-semibold  text-center">
                {{ 'Pertanyaan yang mungkin anda butuhkan' }}
            </h5>
            <div class="justify-center flex flex-wrap pt-16">
                <div class="lg:w-12/12  px-4 -mt-24  pt-16">
                    <div class="flex flex-wrap justify-center  pt-16">
                        <div class="w-1/2 lg:w-6/12 sm:w-3/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-red-400">
                                            {{ 'Apa itu eLearning?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'eLearning atau pembelajaran daring adalah metode pembelajaran yang menggunakan teknologi internet untuk menyajikan materi pembelajaran. Di platform kami, Anda dapat mengakses beragam kursus dan modul pembelajaran dari berbagai bidang melalui perangkat komputer atau perangkat seluler Anda.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="w-1/2 lg:w-6/12 sm:w-3/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-red-800">
                                            {{ 'Bagaimana cara mendaftar di platform eLearning ini?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'Untuk mendaftar, klik tombol "Registrasi" yang terdapat di halaman utama. Isi formulir pendaftaran dengan informasi yang diperlukan dan ikuti instruksi yang diberikan. Setelah berhasil mendaftar, Anda akan dapat mengakses berbagai kursus kami.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="w-1/2 lg:w-6/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Apakah ada biaya untuk mengakses kursus di platform ini?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'Tergantung pada jenis kursus yang Anda pilih, beberapa kursus mungkin memerlukan biaya pendaftaran. Namun, kami juga menyediakan sejumlah kursus gratis untuk memberikan akses pendidikan yang lebih inklusif kepada semua peserta.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="w-1/2 lg:w-6/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Apakah saya akan mendapatkan sertifikat setelah menyelesaikan kursus?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'Ya, setelah Anda berhasil menyelesaikan kursus, Anda akan menerima sertifikat keberhasilan yang dapat diunduh langsung dari akun Anda. Sertifikat ini akan mencantumkan rincian kursus dan pencapaian Anda sebagai bukti partisipasi.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-16 bg-blueGray-200 relative pt-32">
    </section>
@endsection
