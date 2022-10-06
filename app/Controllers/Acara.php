<?php

namespace App\Controllers;

class Acara extends BaseController
{
    public function index()
    {
        // Cara 1: Query Builder
        $builder = $this->db->table('acara');
        $query   = $builder->get()->getResult();
        
        // Cara 2: Query Manual
        // $query = $this->db->query("SELECT * from acara")->getResult();

        $data['acara'] = $query;

        return view('acara/acara', $data);
    }

    public function create()
    {
        
        return view('acara/add');
    }

    public function store()
    {
        // Cara 1: Jika name sama
        $data = $this->request->getPost();

        // Cara 2: Jika nama berbeda dengan name di input
        // $data = [
        //     'nama_acara' => $this->request->getVar('nama_acara'),
        //     'tanggal_acara' => $this->request->getVar('tanggal_acara'),
        //     'info_acara' => $this->request->getVar('info_acara'),
        // ];

        $this->db->table('acara')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('acara'))->with('success', 'Data Berhasil disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('acara')->getWhere(['id_acara' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['acara'] = $query->getRow();
                return view('acara/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        };
    }

    public function update($id)
    {
        // Cara 1: name sama
        $data = $this->request->getPost();
        unset($data['_method']); // harus menggunakan ini karena ada input yang namanya _method dalam $data(di database tidak ada kolom _method)

        // Cara 2: name berbeda
        // $data = [
        //     'nama_acara' => $this->request->getVar('nama_acara'),
        //     'tanggal_acara' => $this->request->getVar('tanggal_acara'),
        //     'info_acara' => $this->request->getVar('info_acara'),
        // ];

        $this->db->table('acara')->where(['id_acara' => $id])->update($data);
        return redirect()->to(site_url('acara'))->with('success', 'Data Berhasil diupdate');
    }

    public function destroy($id)
    {
        $this->db->table('acara')->where(['id_acara' => $id])->delete();
        return redirect()->to(site_url('acara'))->with('success', 'Data Berhasil dihapus');
    }
}
