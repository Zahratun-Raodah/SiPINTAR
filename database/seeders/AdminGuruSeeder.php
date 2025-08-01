<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\Admin;
use App\Models\Profil;
use Illuminate\Support\Facades\Hash;


class AdminGuruSeeder extends Seeder
{
    public function run()
    {

        Admin::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);


        Guru::create([
            'nama' => 'Siti',
            'nip' => '2112',
            'mapel' => 'IPA',
            'agama' => 'Islam',
            'alamat' => 'Kuripan',
            'jenis_kelamin' => 'Perempuan',
            'status' => 'guru',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('siti123')
        ]);

        Profil::create([
            'nama_lembaga' => 'PEMERINTAH KABUPATEN LOMBOK BARAT',
            'nama_instansi' => 'DINAS PENDIDIKAN DAN KEBUDAYAAN',
            'nama_sekolah' => 'SMP NEGERI 2 KURIPAN',
            'alamat' => 'Jln. Pramuka No. 02 Kuripan Utara ',
            'tgl_berdiri' => '5 Januari 1999',
            'no_sk' => '001a / O / 1999',
            'akreditasi' => 'A +',
            'nama_pimpinan' => 'H. KARNAEN, S.Pd',
            'noHp_instansi' => '-',
            'email' => 'smp2kuripan@gmail.com',
            'logo' => 'asset/images/gallery/logo_icon.png',
            'visi' => '“UNGGUL DALAM PRESTASI, BERKETERAMPILAN, BERBUDAYA BERDASARKAN IMAN DAN TAQWA”',
            'misi' =>  'Sekolah berkomitmen untuk melaksanakan pembelajaran yang efektif, inovatif, dan menyenangkan guna meningkatkan prestasi akademik dan non-akademik siswa. Selain itu, kegiatan pengembangan diri dan pembinaan olahraga berprestasi juga dilaksanakan untuk mendukung potensi siswa secara menyeluruh. Peserta didik diarahkan untuk memiliki kemampuan dasar dalam memahami, menguasai, dan menerapkan ilmu pengetahuan dan teknologi (IPTEK). Dalam kehidupan sehari-hari, sekolah menanamkan dan melaksanakan budaya 5S1P (Salam, Senyum, Sapa, Sopan, Santun, dan Pemaaf) sebagai bagian dari pembentukan karakter. Penghayatan terhadap ajaran agama juga terus dipupuk agar menjadi pedoman dalam bersikap dan bertindak. Tak hanya itu, sekolah turut melaksanakan kegiatan kewirausahaan sebagai bentuk pembelajaran keterampilan hidup bagi siswa.'
        ]);
    }
}