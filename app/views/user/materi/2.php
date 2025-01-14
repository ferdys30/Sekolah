<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="<?= BASEURL ?>/public/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Materi</title>

    <meta name="description" content="" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= BASEURL ?>/public/vendor/fonts/boxicons.css" />

    <!-- Favicon -->

    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>/public/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= BASEURL ?>/public/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= BASEURL ?>/public/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= BASEURL ?>/public/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= BASEURL ?>/public/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= BASEURL ?>/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= BASEURL ?>/public/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= BASEURL ?>/public/vendor/js/helpers.js"></script>


    <script src="<?= BASEURL ?>/public/js/config.js"></script>
</head>

<body class="bg-white">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- SVG LOGO -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Let'S Learn</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 nav nav-pills mb-3 d-flex flex-column mt-3" role="tablist">
        <li class="nav-item menu-item ps-3 pe-2 py-2 fw-bold fs-4">Materi Pemograman Grafis</li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start active" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi1" aria-controls="materi1" aria-selected="true">
                <span class="me-1">1</span> Syntax dasar pada Python
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi2" aria-controls="materi2" aria-selected="true">
                <span class="me-1">2</span> Tipe Data
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi3" aria-controls="materi3" aria-selected="true">
                <span class="me-1">3</span> Variable
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi4" aria-controls="materi4" aria-selected="true">
                <span class="me-1">4</span> Operator
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi5" aria-controls="materi5" aria-selected="true">
                <span class="me-1">5</span> Kondisi
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi6" aria-controls="materi6" aria-selected="true">
                <span class="me-1">6</span> Perulangan
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi7" aria-controls="materi7" aria-selected="true">
                <span class="me-1">7</span> Numbers and String
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi8" aria-controls="materi8" aria-selected="true">
                <span class="me-1">8</span> List
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi9" aria-controls="materi9" aria-selected="true">
                <span class="me-2">9</span> Tuple dictionary
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi10" aria-controls="materi10" aria-selected="true">
                <span class="me-2">10</span> Fungsi Function
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi11" aria-controls="materi11" aria-selected="true">
                <span class="me-2">11</span> OOP
            </button>
        </li>
        <li class="nav-item menu-item ps-3 pe-2 py-2">
            <button type="button" class="nav-link text-start" role="tab" data-bs-toggle="pill"
                data-bs-target="#materi12" aria-controls="materi12" aria-selected="true">
                <span class="me-2">12</span> GUI
            </button>
        </li>
        </button>
        </li>
    </ul>
</aside>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container mx-auto flex-grow-1 container-p-y">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="materi1" role="tabpanel">
                                <h1>Pendahuluan</h1>
                                <p>Algoritma adalah urutan aksi-aksi yang dinyatakan dengan jelas dan tidak rancu untuk memecahkan suatu masalah dalam rentang waktu tertentu. Setiap aksi harus dapat dikerjakan dan mempunyai efek tertentu.</p>
                                <p>Algoritma dapat dituliskan dengan banyak cara, mulai dari menggunakan bahasa alami yang digunakan sehari-hari, simbol grafik bagan alir, sampai menggunakan bahasa pemograman seperti bahasa Python.</p>
                                <p>Setiap mempelajari bahasa pemrograman pada umumnya melakukan testing terlebih dahulu pada IDE, compiler pada komputer kita.</p>
                                
                                <h2>Tujuan & Manfaat</h2>
                                <p>Pada praktikum 1 - Syntax dasar, mahasiswa diharapkan:</p>
                                <ul>
                                    <li>Mahasiswa mengerti syntax dasar pada Python.</li>
                                    <li>Mahasiswa dapat menjalankan program Python menggunakan IDE, maupun di command prompt atau terminal.</li>
                                </ul>
                                
                                <h2>Syntax Dasar</h2>
                                <p><code>print()</code> merupakan salah satu fungsi dari Python untuk mencetak, dengan meletakkan kurung buka dan kurung tutup. Untuk Python versi 2.x tidak perlu menggunakan kurung buka dan tutup atau kurung kurawal (), cukup dipisahkan dengan spasi.</p>
                                <p>Python 3.x, memiliki perbedaan dengan Python 2.x dalam mencetakan tipe data string secara langsung, dengan memasukkan ke dalam kutip atau tanda petik terlebih dahulu.</p>
                                
                                <h3>Script ini dijalankan menggunakan jupyter-lab, jupyter-notebook:</h3>
                                <pre>
                                    print("Hello World") #menggunakan tanda petik dua
                                    print('Hello World') #menggunakan tanda petik tunggal
                                </pre>
                                <p>Output yang dihasilkan:</p>
                                <pre>
                                    Hello World
                                    Hello World
                                </pre>
                                <p>Di atas menggunakan tanda "" (dibaca: tanda petik dua) atau '' (dibaca: tanda petik tunggal), diikuti dengan string ataupun variable, dari script yang dijalankan dapat dilihat output berupa text "Hello World".</p>
                                
                                <h3>Python Script</h3>
                                <p>Untuk menjalankan program script Python, anda membutuhkan text-editor seperti notepad, visual code studio (free), notepad++, sublimetext, pycharm. Berikut langkah-langkahnya:</p>
                                <ol>
                                    <li>Buatlah sebuah file hello.py</li>
                                    <li>Kemudian bukalah program tersebut menggunakan text-editor yang terinstall di komputer anda, dan tuliskan script berikut: <code>print("Hello World")</code></li>
                                    <li>Jalankan dengan membuka command prompt atau terminal dan mengetikan perintah untuk Linux:
                                        <pre>python3 hello.py</pre>
                                        atau
                                        <pre>python3 lokasi\scriptanda\hello.py</pre>
                                    </li>
                                    <li>Untuk Windows jalankan command prompt dan mengetikkan perintah berikut:
                                        <pre>python3 lokasi\scriptanda\hello.py</pre>
                                    </li>
                                </ol>
                                
                                <h2>Case Sensitivity</h2>
                                <p>Bahasa pemrograman Python bersifat case sensitive, yang artinya huruf besar dan huruf kecil memiliki perbedaan. Sebagai contoh seperti pada contoh program di atas, menggunakan <code>print()</code> akan langsung menampilkan output-nya, selanjutnya jika menggunakan <code>Print()</code>, <code>PRINT()</code>, <code>PrInT()</code>, atau fungsi tidak lengkap seperti <code>prnt()</code> akan muncul pesan error.</p>
                                <pre>
                                    Print("Hello World") #menggunakan Print()
                                    NameError: name 'Print' is not defined
                                    
                                    PRINT("Hello World") #menggunakan PRINT()
                                    NameError: name 'PRINT' is not defined
                                    
                                    PrInT("Hello World") #menggunakan PrInT()
                                    NameError: name 'PrInT' is not defined
                                    
                                    prnt("Hello World") #menggunakan prnt()
                                    NameError: name 'prnt' is not defined
                                </pre>
                                <p>NOTE: Perlu diperhatikan, case sensitive juga berlaku untuk function lainnya.</p>
                                
                                <h2>Komentar pada Python</h2>
                                <p>Komentar pada Python, ditandai menggunakan <code>#</code> yang artinya kode tersebut tidak dieksekusi atau tidak dijalankan oleh mesin. Komentar hanya digunakan untuk menandai atau memberikan keterangan tertulis pada script.</p>
                                <p>Manfaat dari komentar tersebut, dapat memberikan keterangan mengenai script, agar orang lain dapat memahami isi dari program anda.</p>
                                
                                <h3>Contoh script yang menggunakan komentar pada Python:</h3>
                                <pre>
                                    # ini komentar menggunakan tanda '#' yang tidak dapat dieksekusi
                                    #Baris satu (1)
                                    #Baris dua  (2)

                                    '''
                                    Ini adalah komentar yang berisikan penjelasan lebih
                                    satu baru yaitu dengan menggunakan tanda petik satu ''
                                    '''

                                    """
                                    Ini contoh komentar menggunakan 
                                    tanda kutip dua ""
                                    """

                                    print("Hello World") #output text/string
                                    #print('Hello World')

                                    # Menggunakan Spesial karakter !@#$%^&*(),./;'[]\ pada komentar
                                    #mencetak nama anda
                                    print("Luffy")

                                    #mencetak angka, nilai
                                    print(12)
                                    print("ini adalah nilai 12") #sebagai string
                                </pre>
                                <p>Output yang dihasilkan:</p>
                                <pre>
                                    Hello World
                                    Luffy
                                    12
                                    ini adalah nilai 12
                                </pre>
                                <p>Ketika menjalankan script di atas, dapat dilihat output dari program adalah "Hello World", "Luffy", "12", dan "ini adalah nilai 12" sementara komentar tidak dieksekusi.</p>
                            </div>

                            <div class="tab-pane fade" id="materi2" role="tabpanel">
                                <h3>Penerapan Konsep Tipe Data</h3>

                                <h4>Tujuan & Manfaat</h4>
                                <p>Pada praktikum 2 - Penerapan konsep variabel dan tipe data, mahasiswa diharapkan:</p>
                                <ul>
                                    <li>Mahasiswa mengerti syntax dasar pada Python</li>
                                    <li>Mahasiswa dapat menjalankan program Python menggunakan IDE, maupun di command prompt atau terminal</li>
                                    <li>Mahasiswa mengerti konsep tipe data</li>
                                    <li>Mahasiswa dapat menerapkannya dalam program</li>
                                </ul>

                                <h4>Tipe Data</h4>
                                <p>Tipe data adalah suatu media atau memori pada komputer yang digunakan untuk menampung informasi. Python sendiri mempunyai tipe data yang cukup unik bila kita bandingkan dengan bahasa pemrograman yang lain. Berikut adalah tipe data dari bahasa pemrograman Python:</p>
                                
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Tipe Data</th>
                                            <th>Contoh</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Boolean</td>
                                            <td>True atau False</td>
                                            <td>Menyatakan benar True yang bernilai 1, atau salah False yang bernilai 0</td>
                                        </tr>
                                        <tr>
                                            <td>String</td>
                                            <td>"Ayo belajar Python"</td>
                                            <td>Menyatakan karakter/kalimat bisa berupa huruf angka, dll (diapit tanda " atau ')</td>
                                        </tr>
                                        <tr>
                                            <td>Integer</td>
                                            <td>25 atau 1209</td>
                                            <td>Menyatakan bilangan bulat</td>
                                        </tr>
                                        <tr>
                                            <td>Float</td>
                                            <td>3.14; .4e7; .2; 4.2e-4</td>
                                            <td>Menyatakan bilangan yang mempunyai koma</td>
                                        </tr>
                                        <tr>
                                            <td>Binary</td>
                                            <td>0b10</td>
                                            <td>Menyatakan bilangan dalam format binary / biner (bilangan berbasis 2)</td>
                                        </tr>
                                        <tr>
                                            <td>Octal</td>
                                            <td>0o10</td>
                                            <td>Menyatakan bilangan dalam format oktal (bilangan berbasis 8)</td>
                                        </tr>
                                        <tr>
                                            <td>Hexadecimal</td>
                                            <td>0x10</td>
                                            <td>Menyatakan bilangan dalam format heksa (bilangan berbasis 16)</td>
                                        </tr>
                                        <tr>
                                            <td>Complex</td>
                                            <td>1 + 5j</td>
                                            <td>Menyatakan pasangan angka real dan imajiner</td>
                                        </tr>
                                        <tr>
                                            <td>List</td>
                                            <td>['xyz', 786, 2.23]</td>
                                            <td>Data untaian yang menyimpan berbagai tipe data dan isinya bisa diubah-ubah</td>
                                        </tr>
                                        <tr>
                                            <td>Tuple</td>
                                            <td>('xyz', 768, 2.23)</td>
                                            <td>Data untaian yang menyimpan berbagai tipe data tapi isinya tidak bisa diubah</td>
                                        </tr>
                                        <tr>
                                            <td>Dictionary</td>
                                            <td>{'nama': 'budi','id':2}</td>
                                            <td>Data untaian yang menyimpan berbagai tipe data berupa pasangan penunjuk dan nilai</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h4>Escape Sequence dalam String</h4>
                                <p>Dalam hal menjelaskan beberapa karakter pada string, dijelaskan sebagai berikut:</p>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Escape Sequence</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'\\'</td>
                                            <td>Literal single quote (') character</td>
                                        </tr>
                                        <tr>
                                            <td>'\"'</td>
                                            <td>Literal double quote (") character</td>
                                        </tr>
                                        <tr>
                                            <td>'\n'</td>
                                            <td>ASCII Linefeed (LF) character</td>
                                        </tr>
                                        <tr>
                                            <td>'\\'</td>
                                            <td>Literal backslash () character</td>
                                        </tr>
                                        <tr>
                                            <td>'\b'</td>
                                            <td>ASCII Backspace (BS) character</td>
                                        </tr>
                                        <tr>
                                            <td>'\t'</td>
                                            <td>ASCII Horizontal Tab (TAB) character</td>
                                        </tr>
                                        <tr>
                                            <td>'\r'</td>
                                            <td>ASCII Carriage Return (CR) character</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h4>Contoh Penggunaan Tipe Data</h4>
                                <pre>
                                    # Tipe data Boolean
                                    print(True)

                                    # Tipe data String
                                    print("string dengan menggunakan tanda kutip dua")
                                    print('ini string menggunakan tanda kutip satu')

                                    # Tipe data string dengan menjelaskan spesial karakter atau escape sequences
                                    print('ini adalah tanda single quote (\')')
                                    print("ini adalah tanda double quote (\")")
                                    print("ini adalah tanda slash (\\)")
                                    print("Algoritma\nPemrograman")  # Menggunakan \n
                                    print("Algoritma\bPemrograman")  # Menggunakan \b
                                    print("Algoritma\tPemrograman")  # Menggunakan \t
                                    print("Algoritma\rPemrograman")  # Menggunakan \r

                                    # Tipe data Integer
                                    print(20)

                                    # Tipe data Float
                                    print(3.14)
                                    print(.2)
                                    print(4.2e-3)

                                    # Tipe data Binary
                                    print(0b10)

                                    # Tipe data octal
                                    print(0o10)

                                    # Tipe data Hexadecimal
                                    print('tipe data heksa desimal', 0x10)

                                    # Tipe data Complex
                                    print(5j)

                                    # Tipe data List
                                    print([1,2,3,4,5])
                                    print(["satu", "dua", "tiga"])

                                    # Tipe data Tuple
                                    print((1,2,3,4,5))
                                    print(("satu", "dua", "tiga"))

                                    # Tipe data Dictionary
                                    print({"nama":"Budi", 'umur':20})

                                    # Tipe data Dictionary dimasukan ke dalam variabel biodata
                                    biodata = {"nama":"Budi", 'umur':21}  # Proses inisialisasi variabel biodata
                                    print(biodata)  # Proses pencetakan variabel biodata yang berisi tipe data Dictionary
                                    type(biodata)  # Fungsi untuk mengecek jenis tipe data. Akan tampil <class 'dict'> yang berarti dict adalah tipe data dictionary
                                </pre>
                            </div>

                            <div class="tab-pane fade" id="materi3" role="tabpanel">
                                <h3>Penerapan konsep variabel</h3>
                                <p><strong>Tujuan & Manfaat</strong></p>
                                <p>Pada praktikum 3 - Penerapan konsep variabel, mahasiswa diharapkan:</p>
                                <ul>
                                    <li>Mahasiswa mengerti syntax dasar pada python</li>
                                    <li>Mahasiswa dapat menjalankan program python menggunakan IDE, maupun di command prompt atau terminal</li>
                                    <li>Mahasiswa mengerti konsep variabel</li>
                                    <li>Mahasiswa dapat menerapkan dalam program</li>
                                </ul>

                                <h4>Variabel</h4>
                                <p>Variabel adalah suatu pengenal (identifier) yang digunakan untuk mewakili suatu nilai tertentu di dalam proses program. Berbeda dengan konstanta yang nilainya selalu tetap, nilai dari suatu variabel bisa diubah-ubah sesuai kebutuhan.</p>
                                <p>Variabel secara umumnya dapat menyimpan berbagai macam tipe data. di dalam Python, variabel bersifat dinamis, yang artinya python tidak perlu dideklarasikan tipe data tertentu dan variabel python dapat diubah saat program dijalankan.</p>
                                <p>Nama dari suatu variabel dapat ditentukan sendiri oleh pemrogram dengan aturan sebagai berikut:</p>
                                <ul>
                                    <li>Terdiri dari gabungan huruf dan angka dengan karakter pertama harus berupa huruf. Bahasa Python bersifat case-sensitive, artinya huruf besar dan kecil dianggap berbeda. Jadi antara <code>nama</code>, <code>Nama</code>, dan <code>NaMa</code> dianggap berbeda.</li>
                                    <li>Karakter pertama harus berupa huruf atau garis bawah (<code>_</code>), karakter selanjutnya dapat berupa huruf, garis bawah, atau angka.</li>
                                </ul>

                                <p>Dalam penulisan variabel pada Python, cukup menuliskan variabel lalu mengisikannya dengan nilai ditambahkan dengan tanda sama dengan (<code>=</code>) diikuti dengan nilai untuk variabel tersebut.</p>

                                <h5>Contoh Penggunaan Variabel dalam Python</h5>
                                <pre>
                                    # memasukkan data dalam sebuah variabel
                                    name = "Budi Bae"  # isi variabel berupa string
                                    print(name)  # mencetak variabel

                                    # nilai dan tipe data dalam variabel
                                    age = 21  # tipe data angka / numeric
                                    print(age)  # mencetak nilai age
                                    print(type(age))  # melihat tipe data dari age
                                    age = "dua puluh satu"  # tipe data string
                                    print(age)  # mencetak string dari age
                                    print(type(age))  # melihat tipe data

                                    first_name = "Monkey"
                                    middle_name = "D."
                                    last_name = "Luffy"
                                    name = first_name + " " + middle_name + " " + last_name
                                    age = 19
                                    hobby = "Makan"
                                    print("Profil\n", name, "\n", age, "\n", hobby)

                                    # contoh variabel lainnya
                                    age = 1
                                    Age = 2
                                    aGe = 3
                                    AGE = 4
                                    a_g_e = 5
                                    _age = 6
                                    age_ = 7
                                    _AGE_ = 8
                                    print(age, Age, aGe, AGE, a_g_e, _age, age_, _AGE_)  # mencetak variabel

                                    numberofcollegegraduates = 2500
                                    NUMBEROFCOLLEGEGRADUATES = 2500
                                    numberOfCollegeGraduates = 2500
                                    NumberOfCollegeGraduates = 2500
                                    number_of_college_graduates = 2500
                                    # mencetak variabel
                                    print(numberofcollegegraduates, NUMBEROFCOLLEGEGRADUATES, numberOfCollegeGraduates, NumberOfCollegeGraduates, number_of_college_graduates)
                                </pre>

                                <p><strong>Output:</strong></p>
                                <pre>
                                    Budi Bae
                                    21
                                    <class 'int'>
                                    dua puluh satu
                                    <class 'str'>
                                    Profil
                                    Monkey D. Luffy 
                                    19 
                                    Makan
                                    1 2 3 4 5 6 7 8
                                    2500 2500 2500 2500 2500
                                </pre>
                            </div>

                            <div class="tab-pane fade" id="materi4" role="tabpanel">
                                <h2>Penerapan Operator</h2>
                                <h3>Tujuan & Manfaat</h3>
                                <p>Pada praktikum 4 - Penerapan Operator, mahasiswa diharapkan:</p>
                                <ul>
                                    <li>Mahasiswa mengerti syntax operator pada Python</li>
                                    <li>Mahasiswa dapat menjalankan program Python menggunakan IDE, maupun di command prompt atau terminal</li>
                                    <li>Mahasiswa mengerti konsep setiap operator</li>
                                    <li>Mahasiswa dapat menerapkan dalam program</li>
                                </ul>

                                <h3>Operator</h3>
                                <p>Operator adalah simbol yang biasa dilibatkan dalam program untuk melakukan sesuatu operasi atau manipulasi, sebagai contoh yang dapat diimplementasikan menggunakan operator, 5 + 10 = 15, Dimana 5 dan 10 adalah operan dan + adalah operator.</p>
                                <p>Bahasa pemrograman Python mendukung berbagai macam operator, diantaranya:</p>
                                <ul>
                                    <li>Operator Aritmatika (Arithmetic Operators)</li>
                                    <li>Operator Perbandingan (Comparison (Relational) Operators)</li>
                                    <li>Operator Penugasan (Assignment Operators)</li>
                                    <li>Operator Logika (Logical Operators)</li>
                                    <li>Operator Bitwise (Bitwise Operators)</li>
                                    <li>Operator Keanggotaan (Membership Operators)</li>
                                    <li>Operator Identitas (Identity Operators)</li>
                                </ul>

                                <h3>Operator Aritmatika</h3>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Operator</th>
                                            <th>Contoh</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Penjumlahan (+)</td>
                                            <td>1 + 3 = 4</td>
                                            <td>Menjumlahkan nilai dari masing-masing operan atau bilangan</td>
                                        </tr>
                                        <tr>
                                            <td>Pengurangan (-)</td>
                                            <td>4 - 1 = 3</td>
                                            <td>Mengurangi nilai operan di sebelah kiri menggunakan operan di sebelah kanan</td>
                                        </tr>
                                        <tr>
                                            <td>Perkalian (*)</td>
                                            <td>2 * 4 = 8</td>
                                            <td>Mengalikan operan/bilangan</td>
                                        </tr>
                                        <tr>
                                            <td>Pembagian (/)</td>
                                            <td>10 / 5 = 2</td>
                                            <td>Untuk membagi operan di sebelah kiri menggunakan operan di sebelah kanan</td>
                                        </tr>
                                        <tr>
                                            <td>Sisa Bagi (%)</td>
                                            <td>11 % 2 = 1</td>
                                            <td>Mendapatkan sisa pembagian dari operan di sebelah kiri operator ketika dibagi oleh operan di sebelah kanan</td>
                                        </tr>
                                        <tr>
                                            <td>Pangkat (**) </td>
                                            <td>8 ** 2 = 64</td>
                                            <td>Memangkatkan operan disebelah kiri operator dengan operan di sebelah kanan operator</td>
                                        </tr>
                                        <tr>
                                            <td>Pembagian Bulat (//)</td>
                                            <td>10 // 3 = 3</td>
                                            <td>Sama seperti pembagian. Hanya saja angka dibelakang koma dihilangkan</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h3>Operator Perbandingan</h3>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Operator</th>
                                            <th>Contoh</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sama dengan (==)</td>
                                            <td>1 == 1</td>
                                            <td>bernilai True Jika masing-masing operan memiliki nilai yang sama, maka kondisi bernilai benar atau True.</td>
                                        </tr>
                                        <tr>
                                            <td>Tidak sama dengan (!=)</td>
                                            <td>2 != 2</td>
                                            <td>bernilai False Akan menghasilkan nilai kebalikan dari kondisi sebenarnya.</td>
                                        </tr>
                                        <tr>
                                            <td>Tidak sama dengan (<>)</td>
                                            <td>2 <> 2</td>
                                            <td>bernilai False Akan menghasilkan nilai kebalikan dari kondisi sebenarnya.</td>
                                        </tr>
                                        <tr>
                                            <td>Lebih besar dari (>)</td>
                                            <td>5 > 3</td>
                                            <td>bernilai True Jika nilai operan kiri lebih besar dari nilai operan kanan, maka kondisi menjadi benar.</td>
                                        </tr>
                                        <tr>
                                            <td>Lebih kecil dari (<)</td>
                                            <td>5 < 3</td>
                                            <td>bernilai True Jika nilai operan kiri lebih kecil dari nilai operan kanan, maka kondisi menjadi benar.</td>
                                        </tr>
                                        <tr>
                                            <td>Lebih besar atau sama dengan (>=)</td>
                                            <td>5 >= 3</td>
                                            <td>bernilai True Jika nilai operan kiri lebih besar dari nilai operan kanan, atau sama, maka kondisi menjadi benar.</td>
                                        </tr>
                                        <tr>
                                            <td>Lebih kecil atau sama dengan (<=)</td>
                                            <td>5 <= 3</td>
                                            <td>bernilai True Jika nilai operan kiri lebih kecil dari nilai operan kanan, atau sama, maka kondisi menjadi benar.</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h3>Operator Penugasan</h3>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Operator</th>
                                            <th>Contoh</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sama dengan (=)</td>
                                            <td>a = 1</td>
                                            <td>Memberikan nilai di kanan ke dalam variabel yang berada di sebelah kiri.</td>
                                        </tr>
                                        <tr>
                                            <td>Tambah sama dengan (+=)</td>
                                            <td>a += 2</td>
                                            <td>Memberikan nilai variabel dengan nilai variabel itu sendiri ditambah dengan nilai di sebelah kanan.</td>
                                        </tr>
                                        <tr>
                                            <td>Kurang sama dengan (-=)</td>
                                            <td>a -= 2</td>
                                            <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dikurangi dengan nilai di sebelah kanan.</td>
                                        </tr>
                                        <tr>
                                            <td>Kali sama dengan (*=)</td>
                                            <td>a *= 2</td>
                                            <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dikali dengan nilai di sebelah kanan.</td>
                                        </tr>
                                        <tr>
                                            <td>Bagi sama dengan (/=)</td>
                                            <td>a /= 4</td>
                                            <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dibagi dengan nilai di sebelah kanan.</td>
                                        </tr>
                                        <tr>
                                            <td>Sisa bagi sama dengan (%=)</td>
                                            <td>a %= 3</td>
                                            <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dibagi dengan nilai di sebelah kanan. Yang diambil nantinya adalah sisa baginya.</td>
                                        </tr>
                                        <tr>
                                            <td>Pangkat sama dengan (**=)</td>
                                            <td>a **= 3</td>
                                            <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dipangkatkan dengan nilai di sebelah kanan.</td>
                                        </tr>
                                        <tr>
                                            <td>Pembagian bulat sama dengan (//=)</td>
                                            <td>a //= 3</td>
                                            <td>Membagi bulat operan sebelah kiri operator dengan operan sebelah kanan operator kemudian hasilnya diisikan ke operan sebelah kiri.</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h3>Operator Logika</h3>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Operator</th>
                                            <th>Contoh</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>and</td>
                                            <td>a, b = True, True <br># hasil akan True <br> print(a and b)</td>
                                            <td>Memberikan nilai di kanan ke dalam variabel yang berada di sebelah kiri.</td>
                                        </tr>
                                        <tr>
                                            <td>or</td>
                                            <td>a, b = True, False <br># hasil akan True <br> print(a or b)</td>
                                            <td>Jika salah satu atau kedua operan bernilai True maka kondisi akan bernilai True. Jika keduanya False maka kondisi akan bernilai False.</td>
                                        </tr>
                                        <tr>
                                            <td>not</td>
                                            <td>a, b = True, False <br># hasil akan True <br> print(not b)</td>
                                            <td>Membalikkan nilai kebeneran pada operan misal jika asalnya True akan menjadi False dan begitupun sebaliknya.</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h3>Operator Bitwise</h3>
                                <p>Operator bitwise adalah operator yang bekerja pada tingkat bit dari dua operand.</p>
                                <ul>
                                    <li>&: Operator AND Bitwise</li>
                                    <li>|: Operator OR Bitwise</li>
                                    <li>^: Operator XOR Bitwise</li>
                                    <li>~: Operator NOT Bitwise</li>
                                    <li><<: Operator Shift Kiri</li>
                                    <li>>: Operator Shift Kanan</li>
                                </ul>

                                <h3>Operator Keanggotaan (Membership Operators)</h3>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Operator</th>
                                            <th>Contoh</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>in</td>
                                            <td>sebuah_list = [1, 2, 3, 4, 5] <br> print(5 in sebuah_list)</td>
                                            <td>Memeriksa apakah nilai yang dicari berada pada list atau struktur data Python lainnya. Jika nilai tersebut ada maka kondisi akan bernilai True.</td>
                                        </tr>
                                        <tr>
                                            <td>not in</td>
                                            <td>sebuah_list = [1, 2, 3, 4, 5] <br> print(5 not in sebuah_list)</td>
                                            <td>Memeriksa apakah nilai yang dicari tidak ada pada list atau struktur data Python lainnya. Jika nilai tersebut tidak ada maka kondisi akan bernilai True.</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h3>Operator Identitas (Identity Operators)</h3>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Operator</th>
                                            <th>Contoh</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>is</td>
                                            <td>a is b</td>
                                            <td>Memeriksa apakah dua objek memiliki identitas yang sama (apakah mereka merujuk pada objek yang sama di memori).</td>
                                        </tr>
                                        <tr>
                                            <td>is not</td>
                                            <td>a is not b</td>
                                            <td>Memeriksa apakah dua objek tidak memiliki identitas yang sama (apakah mereka tidak merujuk pada objek yang sama di memori).</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="materi5" role="tabpanel">
                            <h2>Penerapan Kondisi (Pengkondisian)</h2>
                            <h3>Tujuan & Manfaat</h3>
                            <p>Pada praktikum 5 - Kondisi, mahasiswa diharapkan:</p>
                            <ul>
                                <li>Mahasiswa mengerti syntax operator pada Python</li>
                                <li>Mahasiswa dapat menjalankan program Python menggunakan IDE, maupun di command prompt atau terminal</li>
                                <li>Mahasiswa mengerti konsep setiap pengkondisian, seperti if..else..elif</li>
                                <li>Mahasiswa dapat menerapkan dalam program</li>
                            </ul>
                            
                            <h3>Kondisi If</h3>
                            <p>Pengambilan keputusan (kondisi if) digunakan untuk mengantisipasi kondisi yang terjadi saat jalannya program dan menentukan tindakan apa yang akan diambil sesuai dengan kondisi.</p>
                            <p>Pada Python ada beberapa statement/kondisi diantaranya adalah if, else, dan elif. Kondisi if digunakan untuk mengeksekusi kode jika kondisi bernilai benar (True).</p>
                            <p>Jika kondisi bernilai salah (False), maka statement/kondisi if tidak akan dieksekusi.</p>
                            
                            <h4>Contoh Penggunaan Kondisi If</h4>
                            <pre>
                        # Kondisi if adalah kondisi yang akan dieksekusi oleh program jika bernilai benar atau TRUE
                        nilai = 9

                        # jika kondisi benar/TRUE maka program akan mengeksekusi perintah dibawahnya
                        if(nilai > 7):
                            print("Selamat Anda Lulus")

                        # jika kondisi salah/FALSE maka program tidak akan mengeksekusi perintah dibawahnya
                        if(nilai > 10):
                            print("Selamat Anda Lulus")
                            </pre>
                            <p>Output:</p>
                            <pre>Selamat Anda Lulus</pre>
                            
                            <h3>Kondisi If Else</h3>
                            <p>Pengambilan keputusan (kondisi if else) tidak hanya digunakan untuk menentukan tindakan apa yang akan diambil sesuai dengan kondisi, tetapi juga digunakan untuk menentukan tindakan apa yang akan diambil/dijalankan jika kondisi tidak sesuai.</p>
                            <p>Kondisi if else adalah kondisi dimana jika pernyataan benar (True) maka kode dalam if akan dieksekusi, tetapi jika bernilai salah (False) maka akan mengeksekusi kode di dalam else.</p>
                            
                            <h4>Contoh Penggunaan Kondisi If Else</h4>
                            <pre>
                        # Kondisi if else adalah jika kondisi bernilai TRUE maka akan dieksekusi pada if,
                        # tetapi jika bernilai FALSE maka akan dieksekusi kode pada else
                        nilai = 3

                        if(nilai > 7):
                            print("Selamat Anda Lulus")
                        else:
                            print("Maaf Anda Tidak Lulus")
                            </pre>
                            <p>Output:</p>
                            <pre>Maaf Anda Tidak Lulus</pre>
                            
                            <h3>Kondisi Elif</h3>
                            <p>Pengambilan keputusan (kondisi if elif) merupakan lanjutan/percabangan logika dari "kondisi if". Dengan elif kita bisa membuat kode program yang akan menyeleksi beberapa kemungkinan yang bisa terjadi. Hampir sama dengan kondisi "else", bedanya kondisi "elif" bisa banyak dan tidak hanya satu.</p>
                            
                            <h4>Contoh Penggunaan Kondisi Elif</h4>
                            <pre>
                        # Contoh penggunaan kondisi elif
                        hari_ini = "Minggu"

                        if(hari_ini == "Senin"):
                            print("Saya akan kuliah")
                        elif(hari_ini == "Selasa"):
                            print("Saya akan kuliah")
                        elif(hari_ini == "Rabu"):
                            print("Saya akan kuliah")
                        elif(hari_ini == "Kamis"):
                            print("Saya akan kuliah")
                        elif(hari_ini == "Jumat"):
                            print("Saya akan kuliah")
                        elif(hari_ini == "Sabtu"):
                            print("Saya akan kuliah")
                        elif(hari_ini == "Minggu"):
                            print("Saya akan libur")
                            </pre>
                            <p>Output:</p>
                            <pre>Saya akan libur</pre>
                        </div>

                            <div class="tab-pane fade" id="materi6" role="tabpanel">
                                
                            </div>
                            <div class="tab-pane fade" id="materi7" role="tabpanel">
                                
                            </div>
                            <div class="tab-pane fade" id="materi8" role="tabpanel">
                                
                            </div>
                            <div class="tab-pane fade" id="materi9" role="tabpanel">
                                
                            </div>
                            <div class="tab-pane fade" id="materi10" role="tabpanel">
                                
                            </div>
                            <div class="tab-pane fade" id="materi11" role="tabpanel">
                                
                            </div>
                            <div class="tab-pane fade" id="materi12" role="tabpanel">
                                
                            </div>



                        </div>
                    </div>
                    <!-- / Content -->



                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= BASEURL ?>/public/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= BASEURL ?>/public/vendor/libs/popper/popper.js"></script>
    <script src="<?= BASEURL ?>/public/vendor/js/bootstrap.js"></script>
    <script src="<?= BASEURL ?>/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= BASEURL ?>/public/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= BASEURL ?>/public/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
</body>

</html>