<?php
class Laporan extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_jadwal','model_kelas', 'model_agen', 'model_transaksi'));
        $this->load->helper(array('balance','tanggal'));
        check_session();
    }
        function agen(){
        if(isset($_POST['submit'])){
        $nilai1 = $this->input->post('nilai1');
        $nilai2 = $this->input->post('nilai2');
        $data['record'] = $this->model_transaksi->tampil_laporan($nilai1,$nilai2);
        $this->template->load('template', 'laporan/view_laporan', $data);
        }else{
            $data['record'] = $this->model_transaksi->laporan_default();
            $data['batal'] = $this->model_transaksi->laporan_batal();
            $this->template->load('template', 'laporan/view_laporan', $data);
        }
    }
    function dpp(){
        if(isset($_POST['submit'])){
            $jurusan = $this->input->post('jurusan');
            $tanggal = $this->input->post('tanggal');
            $kelas = $this->input->post('kelas');
                $data['record'] = $this->model_transaksi->laporan($jurusan,$tanggal,$kelas);
                $this->load->view('laporan/lap_pnp', $data);
        }else{
            $data['kelas']      = $this->model_kelas->tampilkan_data()->result();
            $data['jurusan']    = $this->model_jadwal->tampilkan_data()->result();
            $this->load->view('laporan/daftar_pnp', $data);
        }
    }
    function chart(){
        $data['chart'] = $this->model_transaksi->laporan_chart();
        //$this->load->view('laporan/view_chart', $data);
        $this->template->load('template', 'laporan/view_chart', $data);
    }
    function laporan_excel(){
        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
        $data['record'] = $this->model_transaksi->laporan_default();
        $this->load->view('laporan/laporan_excel', $data);
    }
    function pdf(){
        $this->load->library('cfpdf');
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(14);
        $pdf->Text(65, 10, 'LAPORAN PENJUALAN TIKET');
        $pdf->Text(60, 16, 'PADA AGEN BUS ROSALIA INDAH');
        //BERI GARIS
        $pdf->Line(10, 20, 188, 20);
        //BERI JARAK
        $pdf->Cell(20, 20, '', '', 1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(50, 7, 'Kode Tiket', 1,0);
        $pdf->Cell(35, 7, 'Nomor Tiket', 1,0);
        $pdf->Cell(30, 7, 'Agen', 1,0);
        $pdf->Cell(28, 7, 'Tanggal', 1,0);
        $pdf->Cell(25, 7, 'Harga', 1,1);
         $datav = $this->model_transaksi->laporan_default();
         $pdf->SetFont('Arial', '', 'L');
         $pdf->SetFontSize(11);
        //tampilkan data dari database
        $no=1;
        $total=0;

        foreach ($datav as $v){
            $uang = format_rupiah($v->harga);
            $tanggal = tgl_indo($v->tgl_transaksi);
            
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(50, 7, $v->kode_tiket, 1,0);
            $pdf->Cell(35, 7, $v->no_tiket, 1,0);
            $pdf->Cell(30, 7, $v->nama, 1,0);
            $pdf->Cell(28, 7, $tanggal, 1,0);
            $pdf->Cell(25, 7, $uang, 1,1);
            $no++;
            $total = $total+$v->harga;
        }
            $pdf->Cell(153, 7, 'Total', 1,0, 'R');
            $pdf->Cell(25, 7, $total, 1,0);
            $pdf->Line(10, 280, 188, 280);
            $pdf->Text(20, 285, 'Dicetak Tanggal: '.date( 'd-m-Y, H:i:s'));
                    
        //End
        $pdf->Output();
    }
}
