<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa_con extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa');
  }

  public function getMahasiswa()
  {
    $response = $this->Mahasiswa->get_list_mahasiswa();

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function getMahasiswaBy($id)
  {
    $response = $this->Mahasiswa->get_mahasiswa_by($id);

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function saveMahasiswa()
  {
      $data = (array)json_decode(file_get_contents('php://input'));
      $this->Mahasiswa->insertMahasiswa($data);

      $response = array(
        'Success' => true,
        'Info' => 'Data Tersimpan');

      $this->output
        ->set_status_header(201)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
  }

  public function updateMahasiswa($npm)
  {
    $data = (array)json_decode(file_get_contents('php://input'));
    $this->Mahasiswa->updateMahasiswa($data, $npm);

    $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil di update');

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function deleteMahasiswa($npm)
  {
    $this->Mahasiswa->deleteMahasiswa($npm);

    $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil di hapus');

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

}