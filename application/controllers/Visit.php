


<?php
class Visit extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('M_visit');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    //$this->goggleClient = new Google_Client();
    //$this->goggleClient->setClientId('884933806353-9e3qotj9j3vfulcu5712u520gtmubqsu.apps.googleusercontent.com');
    // $this->goggleClient->setClientSecret('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');
    // $this->goggleClient->setRedirectUri('http://localhost/FP/visit/login/');
  }
  //halaman utama controller
  public function index_not_login()
  {
    $data['wisata'] = $this->M_visit->get_data_wisata_admin();
    $this->load->view('Home/index_not_login', $data);
  }

  public function index()
  {

    if (!$this->session->userdata('iduser')) {
      redirect('visit/index_not_login');
    }
    $data['wisata'] = $this->M_visit->get_data_wisata_admin();
    $this->load->view('Home/index', $data);
  }



  //login signup

  public function signup()
  {
    $this->load->view('login/signup');
  }

  public function process_signup()
  {
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    if (empty($username) || empty($email) || empty($password)) {
      $this->session->set_flashdata('swal_icon', 'warning');
      $this->session->set_flashdata('swal_title', 'Yahh...');
      $this->session->set_flashdata('swal_text', 'Harap isi semua field');
    } else {
      $data = array(
        'username' => $username,
        'email' => $email,
        'pass' => $password
      );

      $user_id = $this->M_visit->save_user($data);

      if ($user_id) {
        $this->session->set_flashdata('swal_icon', 'success');
        $this->session->set_flashdata('swal_title', 'Yahh...');
        $this->session->set_flashdata('swal_text', 'Akun berhasil dibuat');
        redirect('visit/login');
      } else {
        $this->load->view('login/signup');
      }
    }

    $this->load->view('login/signup');
  }



  //proses logim 
  public function login()
  {
    $this->load->view('login/login');
  }

  public function process_login()
  {
    $username = $this->input->post('identity');
    $password = $this->input->post('password');

    if (empty($username) || empty($password)) {
      $this->session->set_flashdata('swal_icon', 'warning');
      $this->session->set_flashdata('swal_title', 'Yahh...');
      $this->session->set_flashdata('swal_text', 'Harap isi semua field');
    } else {
      $user = $this->M_visit->login($username, $password);

      if ($user) {
        $user_data = $this->M_visit->get_user_data($username);
        $this->session->set_userdata('iduser', $user_data->iduser);
        redirect('visit/index');
      } else {
        $admin_login = $this->M_visit->admin_login($username, $password);
        if ($admin_login) {

          $user_data = $this->M_visit->get_admin_data($username);
          $this->session->set_userdata('idadmin', $user_data->idadmin);
          redirect('visit/dashboard');
        } else {
          $this->session->set_flashdata('swal_icon', 'error');
          $this->session->set_flashdata('swal_title', 'Yahh...');
          $this->session->set_flashdata('swal_text', 'Nama Pengguna, Email Atau Password Anda Salah');
        }
      }
    }

    $this->load->view('login/login');
  }

  //halaman utama
  public function wisata_not_login()
  {
    $data['wisata'] = $this->M_visit->get_data_wisata_admin();
    $this->load->view('wisata/wisata_not_login', $data);
  }


  public function wisata()
  {
    if (!$this->session->userdata('iduser')) {
      redirect('visit/login');
    }
    $data['wisata'] = $this->M_visit->get_data_wisata_admin();
    $this->load->view('wisata/wisata', $data);
  }

  public function data_wisata($id_wisata)
  {
    if (!$this->session->userdata('iduser')) {
      redirect('visit/login');
    }
    $data['wisata'] = $this->M_visit->get_single_wisata($id_wisata);

    $data['komentar'] = $this->M_visit->get_data_komen();
    $this->load->view('data/data_wisata', $data);
  }
  public function data_wisata_not_login($id_wisata)
  {
    $data['wisata'] = $this->M_visit->get_single_wisata($id_wisata);

    $data['komentar'] = $this->M_visit->get_data_komen();
    $this->load->view('data/data_wisata_not_login', $data);
  }


  // halaman dashboard controller

  public function dashboard()
  {
    if (!$this->session->userdata('idadmin')) {
      
      redirect('visit/login');
    }
    $data['tables'] = $this->M_visit->get_all_tabel();
    $this->load->view('dashboard/dash', $data);
    $this->load->view('dashboard/wisata_dash', $data);
  }


  public function dash_data_wisata_user()
  {
    if (!$this->session->userdata('idadmin')) {
      
      redirect('visit/login');
    }
    $data['user'] = $this->M_visit->get_data_user();
    $this->load->view('dashboard/dash');
    $this->load->view('dashboard/dash_wisata_user', $data);
  }

  public function dash_data_wisata_admin()
  {
    if (!$this->session->userdata('idadmin')) {
      
    redirect('visit/login');
  }
    
    $data['admin'] = $this->M_visit->get_data_admin();
    $this->load->view('dashboard/dash');
    $this->load->view('dashboard/wisata_dash_admin', $data);
  }

  // data komentar
  public function dash_data_wisata_komen()
  {
    if (!$this->session->userdata('idadmin')) {
      
      redirect('visit/login');
    }
    $data['komentar'] = $this->M_visit->get_data_komen();
    $this->load->view('dashboard/dash');
    $this->load->view('dashboard/wisata_dash_komen', $data);
  }


  public function aksi_tambah_komen()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idwisata = $this->input->post('idwisata');
      $iduser = $this->session->userdata('iduser');

      if (!$iduser) {
        redirect('visit/login');
      }

      $komentar = $this->input->post('komen');

      $data = array(
        'idwisata' => $idwisata,
        'komentar' => $komentar,
        'iduser' => $iduser,
      );

      $this->M_visit->tambah_komentar($data);

      redirect("visit/data_wisata/{$idwisata}");
    }
  }

  public function delete_komen($idkomen)
  {
    $this->M_visit->delete_komen($idkomen);

    redirect('visit/dashboard/dash_wisata_komen');
  }



  //tambah data admin 
  public function tambah_data_admin()
  {
    
    $this->load->view('dashboard/tambah_data_admin');
  }

  public function aksi_tambah_admin()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $username = $this->input->post('usernameadmin');
      $email = $this->input->post('emailadmin');
      $password = $this->input->post('passadmin');

      $this->load->model('M_visit');
      $data = array(
        'usernameadmin' => $username,
        'emailadmin' => $email,
        'passadmin' => $password
      );
      $this->M_visit->add_admin($data);

      redirect('visit/dashboard/dash_wisata_admin');
    }

    $this->load->view('tambah_data_admin');
  }

  //hapus data admin 

  public function delete_admin($idadmin)
  {
    $this->load->model('M_visit');
    $this->M_visit->delete_admin($idadmin);


    redirect('visit/dashboard/dash_wisata_admin');
  }

  //ubah data admin
  public function ubah_data_admin($idadmin)
  {
    
    $data['admin'] = $this->M_visit->ubah_admin($idadmin);
    $this->load->view('dashboard/ubah_data_admin', $data);
  }

  public function aksi_ubah_admin($idadmin)
  {
    $data = array(
      'usernameadmin' => $this->input->post('usernameadmin'),
      'emailadmin' => $this->input->post('emailadmin'),
      'passadmin' => $this->input->post('passadmin'),

    );

    $this->M_visit->update_admin($idadmin, $data);
    redirect('visit/dashboard/dash_wisata_admin');
  }






  //halaman add data

  public function tambah_data_user()
  {
    
    $this->load->view('dashboard/tambah_data_user');
  }
  public function aksi_tambah_user()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $this->load->model('M_visit');
      $data = array(
        'username' => $username,
        'email' => $email,
        'pass' => $password
      );
      $this->M_visit->add_user($data);

      redirect('visit/dashboard/dash_wisata_user');
    }

    $this->load->view('tambah_data_user');
  }


  public function delete_user($iduser)
  {
    $this->load->model('M_visit');
    $this->M_visit->delete_user($iduser);

    redirect('visit/dashboard/dash_wisata_user');
  }

  //ubah data user 

  public function ubah_data_user($iduser)
  {
   
    $this->load->model('M_visit');
    $data['user'] = $this->M_visit->ubah_user($iduser);
    $this->load->view('dashboard/ubah_data_user', $data);
  }

  public function aksi_ubah_user($iduser)
  {
    $this->load->model('M_visit');
    $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'pass' => $this->input->post('password'),

    );

    $this->M_visit->update_user($iduser, $data);

    redirect('visit/dashboard/dash_wisata_user');
  }

  //tambah data wisata dan data wisata

  public function dashboard_data_wisata()
  {
    if (!$this->session->userdata('idadmin')) {
      
      redirect('visit/login');
    }
    $data['wisata'] = $this->M_visit->get_data_wisata();
    $this->load->view('dashboard/dash');
    $this->load->view('dashboard/wisata_dash_data', $data);
  }

  public function tambah_data_wisata()
  {
    
    $data['admin'] = $this->M_visit->get_data_admin();
    $this->load->view('dashboard/tambah_data_wisata', $data);
  }
  public function tambahWisata()
  {

    $config['upload_path'] = './upload';
    $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
    $config['max_size'] = 5048;
    $config['max_height'] = 3000;
    $config['max_width'] = 3000;

    $this->load->library('upload', $config);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $judul = $this->input->post('judul');
      $tanggal = $this->input->post('tanggal');
      $deskripsi = $this->input->post('deskripsi');
      $isi = $this->input->post('isi');
      $idadmin = $this->input->post('idadmin');



      // Proses upload gambar
      if ($this->upload->do_upload('gambar')) {
        $upload_data = $this->upload->data();
        $gambar = $upload_data['file_name'];

        if ($this->upload->do_upload('gambar_konten1')) {
          $upload_data = $this->upload->data();
          $gambar_konten1 = $upload_data['file_name'];
        } else {
          $error = array('error' => $this->upload->display_errors());
          print_r($error);
          return;
        }

        if ($this->upload->do_upload('gambar_konten2')) {
          $upload_data = $this->upload->data();
          $gambar_konten2 = $upload_data['file_name'];
        } else {
          $error = array('error' => $this->upload->display_errors());
          print_r($error);
          return;
        }

        if ($this->upload->do_upload('gambar_konten3')) {
          $upload_data = $this->upload->data();
          $gambar_konten3 = $upload_data['file_name'];
        } else {
          $error = array('error' => $this->upload->display_errors());
          print_r($error);
          return;
        }

        $this->load->model('M_visit');
        $data = array(
          'judul' => $judul,
          'tanggal' => $tanggal,
          'deskripsi' => $deskripsi,
          'isi' => $isi,
          'gambar' => $gambar,
          'gambar_konten1' => $gambar_konten1,
          'gambar_konten2' => $gambar_konten2,
          'gambar_konten3' => $gambar_konten3,
          'idadmin' => $idadmin,

        );

        $this->M_visit->tambahDataWisata($data);

        redirect('visit/dashboard/wisata_dash_data');
      } else {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
      }
    }
  }

  //ubah data wisata
  public function detail_wisata($idwisata)
  {
    
    $data['wisata'] = $this->M_visit->detail_wisata($idwisata);
    $data['admin'] = $this->M_visit->get_data_wisata_admin();
    $this->load->view('dashboard/detail_wisata', $data);
  }

  public function ubah_data_wisata($idwisata)
  {
    
    $this->load->model('M_visit');
    $data['wisata'] = $this->M_visit->ubah_wisata($idwisata);
    $data['admin'] = $this->M_visit->get_data_admin();
    $this->load->view('dashboard/ubah_data_wisata', $data);
  }

  public function aksi_ubah_wisata($idwisata)
  {

    $this->load->model('M_visit');

    // Ambil data post
    $data = array(
      'judul' => $this->input->post('judul'),
      'tanggal' => $this->input->post('tanggal'),
      'deskripsi' => $this->input->post('deskripsi'),
      'isi' => $this->input->post('isi'),
      'idadmin' => $this->input->post('idadmin'),
    );


    $config['upload_path'] = './upload';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size'] = 5048;
    $config['encrypt_name'] = TRUE;
    $config['max_height'] = 3000;
    $config['max_width'] = 3000;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
      $data['gambar'] = $this->upload->data('file_name');
    }

    if ($this->upload->do_upload('gambar_konten1')) {
      $data['gambar_konten1'] = $this->upload->data('file_name');
    }

    if ($this->upload->do_upload('gambar_konten2')) {
      $data['gambar_konten2'] = $this->upload->data('file_name');
    }

    if ($this->upload->do_upload('gambar_konten3')) {
      $data['gambar_konten3'] = $this->upload->data('file_name');
    }

    $this->M_visit->update_wisata($idwisata, $data);

    redirect('visit/dashboard/wisata_dash_data');
  }

  //hapus data wisata
  public function delete_data_wisata($idwisata)
  {
    $this->load->model('M_visit');


    $delete_result = $this->M_visit->delete_data_wisata($idwisata);

    if (!$delete_result) {

      echo "gagal hapus data karena ada komentar terkait";
    } else {

      redirect('visit/dashboard/wisata_dash_data');
    }
  }


  //olah data hubungi

  public function wisata_dash_hubungi()
  {
    if (!$this->session->userdata('idadmin')) {
      
      redirect('visit/login');
    }
    $data['hubungi'] = $this->M_visit->data_hubungi();
    $this->load->view('dashboard/dash');
    $this->load->view('dashboard/wisata_dash_hubungi', $data);
  }

  public function aksi_tambah_hubungi()
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $nama = $this->input->post('namalengkap');
      $pesan = $this->input->post('pesan');


      $data = array(
        'namalengkap' => $nama,
        'pesan' => $pesan,
      );

      $this->M_visit->tambah_data_hubungi($data);

      redirect('visit/index');
    }

    $this->load->view('tambah_data_user');
  }
  public function aksi_tambah_hubungi_wisata()
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $nama = $this->input->post('namalengkap');
      $pesan = $this->input->post('pesan');


      $data = array(
        'namalengkap' => $nama,
        'pesan' => $pesan,
      );

      $this->M_visit->tambah_data_hubungi($data);

      redirect('visit/wisata');
    }
  }

  public function aksi_hapus_hubungi($idhub)
  {
    $this->M_visit->hapus_data_hubungi($idhub);
    redirect('visit/dashboard/dash_wisata_hubungi');
  }


  public function logout()
  {
    $this->session->unset_userdata('iduser');
    $this->session->sess_destroy();
    redirect('visit/login');
  }
  public function process_logout()
  {
    $this->logout();
  }

  public function logout_admin()
  {
    $this->session->unset_userdata('idadmin');
    $this->session->sess_destroy();
    redirect('visit/login');
  }
  public function process_logout_admin()
  {
    $this->logout_admin();
  }
}
