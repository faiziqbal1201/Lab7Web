<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'useremail' => 'mfaiziqbal01@gmail.com',
            'userpassword' => password_hash('password123', PASSWORD_DEFAULT),
            'username' => 'Iqbal'
        ];
        $this->db->table('users')->insert($data);
    }
}