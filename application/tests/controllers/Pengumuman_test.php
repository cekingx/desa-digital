<?php

/**
 * @group controller
 */
class Pengumuman_test extends TestCase
{
    public function test_WhenYouAccessAllPengumumanThenYouGetAllPengumuman()
    {
        $result_array = [
            [
                'pengumuman_id' => 1,
                'pengumuman_judul' => 'Pengumuman Satu',
                'pengumuman_slug' => 'pengumuman-satu',
                'pengumuman_isi' => 'Isi pengumuman1',
                'pengumuman_tanggal' => '2020-08-21',
            ],
            [
                'pengumuman_id' => 2,
                'pengumuman_judul' => 'Pengumuman Dua',
                'pengumuman_slug' => 'pengumuman-dua',
                'pengumuman_isi' => 'Isi pengumuman2',
                'pengumuman_tanggal' => '2020-08-21',
            ]
        ];

        $this->request->setCallable(
            function ($CI) use ($result_array) {
                $pengumuman_model = $this->getDouble(
                    'Pengumuman_model', ['getAll' => $result_array]
                );
                $CI->pengumuman_model = $pengumuman_model;
            }
        );

        $output = $this->request('GET', '/admin/pengumuman/data');
        $this->assertContains('Pengumuman Satu', $output);
        $this->assertContains('Pengumuman Dua', $output);
    }

    public function test_WhenYouAccessSpecificPengumumanThenYouGetThePengumuman()
    {
        $pengumuman_id = 1;
        $result_array = [
            'pengumuman_id' => $pengumuman_id,
            'pengumuman_judul' => 'Pengumuman Satu',
            'pengumuman_slug' => 'pengumuman-satu',
            'pengumuman_isi' => 'Isi pengumuman1',
            'pengumuman_tanggal' => '2020-08-21',
        ];

        $this->request->setCallable(
            function ($CI) use ($result_array) {
                $pengumuman_model = $this->getDouble(
                    'Pengumuman_model', ['getById' => $result_array]
                );
                $CI->pengumuman_model = $pengumuman_model;
            }
        );

        $output = $this->request('GET', "/admin/pengumuman/$pengumuman_id");
        $this->assertContains('Pengumuman1', $output);
        $this->assertContains('Isi pengumuman1', $output);
    }

    public function test_WhenYouAccessNotExistedPengumumanThenYouGet404()
    {
        $pengumuman_id = 1;

        $this->request->setCallable(
            function ($CI) {
                $pengumuman_model = $this->getDouble(
                    'Pengumuman_model', ['getById' => null]
                );
                $CI->pengumuman_model = $pengumuman_model;
            }
        );

        $output = $this->request('GET', "/admin/pengumuman/$pengumuman_id");
        $this->assertResponseCode(404);
    }

    public function test_WhenYouSuccessAddPengumumanThenYouGetSuccessMessage()
    {
        $this->request->setCallable(
            function ($CI) {
                $pengumuman_model = $this->getDouble(
                    'Pengumuman_model', ['save' => true]
                );
                $CI->pengumuman_model = $pengumuman_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/pengumuman/store',
            [
                'pengumuman_judul' => 'Pengumuman2',
                'pengumuman_isi' => 'Isi pengumuman2',
            ]
        );

        // $this->assertRedirect('/admin/pengumuman', 302);
        $this->assertContains('success', $output);
    }

    public function test_WhenYouFailedAddPengumumanThenYouRedirectedToCreate()
    {
        $this->request->setCallable(
            function ($CI) {
                $pengumuman_model = $this->getDouble(
                    'Pengumuman_model', ['save' => true]
                );
                $CI->pengumuman_model = $pengumuman_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/pengumuman/store',
            [
                'pengumuman_judul' => 'Pengumuman2',
            ]
        );

        $this->assertRedirect('/admin/pengumuman/create', 302);
    }

    public function test_WhenYouSuccessUpdatePengumumanThenYouRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $pengumuman_model = $this->getDouble(
                    'pengumuman_model', ['update' => true]
                );
                $ci->pengumuman_model = $pengumuman_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/pengumuman/update',
            [
                'pengumuman_id' => 3,
                'pengumuman_judul' => 'PengumumanUpdate',
                'pengumuman_isi' => 'Isi pengumuman update',
            ]
        );

        $this->assertRedirect('/admin/pengumuman', 302);
    }

    public function test_WhenYouFailedUpdatePengumumanThenYouRedirectedToEdit()
    {
        $this->request->setCallable(
            function ($ci) {
                $pengumuman_model = $this->getDouble(
                    'pengumuman_model', ['update' => true]
                );
                $ci->pengumuman_model = $pengumuman_model;
            }
        );

        $pengumuman_id = 1;
        $output = $this->request(
            'POST',
            '/admin/pengumuman/update',
            [
                'pengumuman_id' => $pengumuman_id,
                'pengumuman_judul' => 'PengumumanUpdate',
            ]
        );

        $this->assertRedirect("/admin/pengumuman/edit/$pengumuman_id", 302);
    }

    public function test_WhenYouEditNotExistedPengumumanThenYouGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $pengumuman_model = $this->getDouble(
                    'pengumuman_model', ['getById' => null]
                );
                $ci->pengumuman_model = $pengumuman_model;
            }
        );

        $pengumuman_id = 1;
        $output = $this->request('GET', "/admin/pengumuman/edit/$pengumuman_id");

        $this->assertResponseCode(404);
    }

    public function test_WhenYouSuccessDeletePengumumanThenYouRedirectedToIndex()
    {
        $result = [
            'pengumuman_id' => 1,
            'pengumuman_judul' => 'Pengumuman1',
            'pengumuman_isi' => 'Isi pengumuman1',
            'pengumuman_tanggal' => '2020-08-21',
        ];

        $this->request->setCallable(
            function ($ci) use ($result) {
                $pengumuman_model = $this->getDouble(
                    'pengumuman_model', ['delete' => true, 'getById' => $result]
                );
                $ci->pengumuman_model = $pengumuman_model;
            }
        );

        $pengumuman_id = $result['pengumuman_id'];
        $this->request(
            'GET',
            "/admin/pengumuman/delete/$pengumuman_id"
        );

        $this->assertRedirect('/admin/pengumuman', 302);
    }

    public function test_WhenYouDeleteNotExistedPengumumanThenYouGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $pengumuman_model = $this->getDouble(
                    'pengumuman_model', ['delete' => false, 'getById' => null]
                );
                $ci->pengumuman_model = $pengumuman_model;
            }
        );

        $pengumuman_id = 1;
        $this->request(
            'GET',
            "/admin/pengumuman/delete/$pengumuman_id"
        );

        $this->assertResponseCode(404);
    }
}