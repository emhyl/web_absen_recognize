<?php

class DB extends CI_Model

{

    public $jam;
    public $tgl;


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");

        $this->jam = strtotime("now +0 hours");
        $this->tgl = date('Y-m-d');
    }

    public function getAll($tbl, $where = null, $order = null)
    {
        $this->db->select('*');
        $this->db->from($tbl);

        if (!is_null($order)) {
            $field = array_keys($order)[0];
            $val = array_values($order)[0];
            $this->db->order_by($field, $val);
        }
        if (!is_null($where)) {
            $this->db->where($where);
        }

        return $this->db->get()->result();
    }

    public function getWhere($tbl, $where, $all = false)
    {
        if ($all) {
            return $this->db->get_where($tbl, $where)->result();
        } else {
            return $this->db->get_where($tbl, $where)->row();
        }
    }

    public function add($tbl, $data)
    {

        return $this->db->insert($tbl, $data);
    }

    public function edit($tbl, $data, $where)
    {

        return $this->db->update($tbl, $data, $where);
    }

    public function delete($tbl, $where)
    {
        if ($where == "all") {
            return $this->db->query("DELETE FROM $tbl");
        }
        return $this->db->delete($tbl, $where);
    }

    public function find($tbl, $field, $key, $where = [])
    {

        $this->db->like($field, $key, 'both');
        $this->db->join('t_login L', 'P.id_pegawai = L.id_pegawai');
        $this->db->where($where);

        return $this->db->get($tbl . " P")->result();
    }



    public function join($from, $tbl_join, $where = null, $all = true, $type = 'left')
    {

        $this->db->select('*');

        $this->db->from($from);

        foreach ($tbl_join as $key => $val) {
            $this->db->join($key, $val);
        }


        if (!is_null($where)) {

            $this->db->where($where);
        }

        if ($all) {
            return $this->db->get()->result();
        } else {
            return $this->db->get()->row();
        }
    }

    public function time_option($type = 'date', $opt = [], $toTime = false)
    {
        $hasil = '';
        switch ($type) {

            case 'date':

                $hasil = date('Y-m-d', strtotime($opt['operation'], strtotime($opt['value'])));

                break;



            case 'time':

                $hasil = date('H:i:s', strtotime($opt['operation'], strtotime($opt['value'])));

                break;



            case 'both':

                $hasil = date('Y-m-d H:i:s', strtotime($opt['operation'], strtotime($opt['value'])));

                break;
        }

        if ($toTime) {

            return strtotime($hasil);
        } else {

            return $hasil;
        }
    }

    public function upl($cfg)
    {

        if (!$cfg) {
            return false;
        }

        if (!isset($cfg['name'])) {
            return 'nama kosong';
        }
        if (!isset($cfg['path'])) {
            return 'path kosong';
        }
        if (!isset($cfg['url'])) {
            return 'url kosong';
        }

        $config = [];
        $file = $_FILES[$cfg['name']];


        if ($file['name'] == "") {
            return false;
        }

        $extensi = explode('.', $file['name']);
        $newName = random_string('numeric', 8) . '.' . end($extensi);
        $config['upload_path'] = './assets/' . $cfg['path'];
        $config['allowed_types'] = 'jpg|jpeg|png|';
        $config['file_name'] = $newName;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($cfg['name'])) {
            var_dump($this->upload->display_errors());
            die();
            $this->session->set_flashdata('message', '

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> ' . "file gagal di upload" . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                ');
            redirect(base_url() . $data['url']);
            die;
        } else {
            return $this->upload->data('file_name');
        }
    }


    public function get_sum($tbl, $field, $where)
    {
        $this->db->select_sum($field);
        $this->db->where($where);
        return $this->db->get($tbl)->row();
    }


    public function getNmBulan($bulan)
    {
        $nm_bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return $nm_bulan[$bulan];
    }
    public function statusAbsen($sts)
    {
        switch ($sts) {
            case 'h':
                return 'Hadir';
            case 'i':
                return 'Izin';
            case 's':
                return 'Sakit';
            case 'a':
                return 'Alpa';
        }
    }

    public function getAbsen($bulan, $tahun)
    {
        $data = [];
        $jml_hari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        foreach ($this->getAll('t_guru') as $i => $val) {
            $data[$i] = $val;

            for ($x = 1; $x <= $jml_hari; $x++) {
                $tgl = $tahun . '-' . $bulan . '-' . $x;

                $nama_hari = date('D', strtotime($tgl));

                $sts = $this->getWhere('t_absen', ['id_guru' => $val->id_guru, 'tgl_absen' => $tgl]);
                $data_absen = [
                    "tgl" => $x,
                    "status" => ($sts) ? $sts->sts_absen : '-',
                    "nama_hari" => $nama_hari
                ];
                $data[$i]->absen[] = $data_absen;
            }
        }

        return $data;
    }
}
