<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Departemen;
use App\Models\Category;
use App\Models\Event;
use App\Models\Event_Category;
use App\Models\Post;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            // 'username' => 'jajaroyana',
            'nim' => '12210792',
            'email' => 'muhammadjajaroyana3@gmail.com',
            'email_verified_at' => '2023-08-14 16:43:02',
            'password' => bcrypt('123456'),
            'is_admin' => 1
        ]);
        Student::create([
            // 'username' => 'jajaroyana',
            'name' => 'Muhammad Jaja Royana',
            'nim' => '12210792',
            'semester' => '5',
            'prodi' => 'Sistem Informasi',
            'asal_kampus' => 'Karawang'
        ]);
        // User::factory(3)->create();


        Category::create([
            "name" => "Web Programing",
            "slug" => "web-programing"
        ]);
        Category::create([
            "name" => "Personal",
            "slug" => "personal"
        ]);
        Category::create([
            "name" => "Web Design",
            "slug" => "web-design"
        ]);

        Event_Category::create([
            "code" => "SM",
            "name" => "Seminar",
            "slug" => "seminar",
        ]);
        Event_Category::create([
            "code" => "WS",
            "name" => "Workshop",
            "slug" => "workshop",
        ]);


        // Post::factory(20)->create();


        Departemen::create([
            "name" => "Departemen Pendidikan",
            "slug" => "departemen-pendidikan",
            "description" => "Departemen Pendidikan dalam organisasi merancang program pembelajaran, mengajar, dan melatih anggota sesuai kebutuhan organisasi untuk mencapai tujuan dan pertumbuhan yang efektif.",
            "icon" => "<i class='bi bi-mortarboard'></i>"
        ]);
        Departemen::create([
            "name" => "Departemen Sosial",
            "slug" => "departemen-sosial",
            "description" => "Departemen Sosial organisasi mempromosikan kesejahteraan komunitas melalui program-program inklusi, dukungan sosial, dan hubungan positif antaranggota.",
            "icon" => "<i class='bi bi-people-fill'></i>"
        ]);
        Departemen::create([
            "name" => "Departemen Keorganisasian",
            "slug" => "departemen-keorganisasian",
            "description" => "Departemen Keorganisasian mengatur struktur dan sumber daya organisasi demi pencapaian tujuan dengan efisiensi maksimal.",
            "icon" => "<i class='bi bi-diagram-3'></i>"
        ]);


        Event::create(
            [
                "code" => "125.265.262",
                "name" => "Bedah 9 Unit Kompetens",
                "id_event_category" => 2,
                "date" => "2023-08-15",
                "time" => "18:30:00",
                "vanue" => "Aula kampus  UBSI Cikampek",
                "htm" => "20000",
                "description" => '<div><br>Halo sobat BSI👋🏻<br>Kami dari Himpunan Mahasiswa Sistem Informasi memiliki kabar baik untuk kalian!🥳🎉<br><br>Kami akan mengadakan workshop yang menarik dengan topik menarik juga yang berkaitan dengan salah satu Syarat Kelulusan yaitu Sertifikasi Kompetensi sesuai edaran perkuliahan tahun 2023 :<br>&nbsp;http://students.bsi.ac.id/mahasiswa/mhs_download/Edaran_Perkuliahan_Semester_Genap_2022-2023_(9_Maret_2023).pdf.<br><br>Bersama dengan para peserta lainnya, kamu akan berkolaborasi dalam sesi-sesi interaktif dan mendapatkan wawasan berharga dari para instruktur berpengalaman yang telah sukses dalam industri ini lohh..🤩<br><br>Untuk memenuhi kebutuhan dan permintaan teman-teman mahasiswa, kami menghadirkan kegiatan ini dengan judul :<br><br>&nbsp;"Bedah 9 Unit Kompetensi Skema Programmer"&nbsp;<br><br>Berikut informasi pelaksanaannya, jangan lupa catet ya tanggal nya☺️<br><br>Pendaftaran&nbsp; : 3 - 13 Agustus 2023<br>Pelaksanaan :<br>&nbsp; - Selasa, 15 Agustus di Aula kampus&nbsp;<br>&nbsp; &nbsp; Cikampek<br>&nbsp; - Rabu, 16 Agustus di Aula kampus&nbsp;<br>&nbsp; &nbsp; Karawang&nbsp;<br>Waktu&nbsp; : 18.30 - 21.00 WIB<br>HTM&nbsp; &nbsp; : 20k<br>&nbsp;(untuk transfer No.Rekening ada di gform pendaftaran ^^)<br><br>Benefit :<br>- 90% Siap dokumentasi Project menuju&nbsp;<br>&nbsp; Serkom Programmer pada semester 5<br>- Knowledge (Pemahaman terkait Unit&nbsp;<br>&nbsp; Kompetensi Programmer)<br>- E-Certificate (bisa dilampirkan saat&nbsp;<br>&nbsp; Serkom Programmer)<br>- Relation<br>- Snack<br><br>Sudah Siap Sertifikasi Programmer..?? Tunggu apa lagi!! Segera daftarkan dirimu sekarang pada link di bawah ini 👇🏻👇🏻<br><br>https://bit.ly/WorkshopSertifikasiProgrammer<br><br>Untuk mendapatkan informasi lebih lanjut dapat menghubungi nomer dibawah ini ya🤗<br><br>Kampus Cikampek : +62 815-1179-1762 (Nung Hayati)<br>Kampus Karawang : +62 822-1377-7085 (Afiyah Dhiya)<br><br>Sampai Bertemu di acaranya temen-temen ☺️<br>Salam sukses untuk kita semua<br>Terimakasih ✨</div>',
                "excerpt" => "Halo sobat BSI👋🏻Kami dari Himpunan Mahasiswa Sistem Informasi memiliki kabar baik untuk kalian!🥳...",
                "poster" => "event_images/EnFEjE0ZLWwtT3ACEy1OO5ihCuwhljtHk5sjYOjN.jpg",
                "thumbnail" => "event_images/rD0roYr3mg6SSy2JiWFzz7aQ84Cfj8Dckhw4fiES.jpg",
            ]
        );
    }
}
