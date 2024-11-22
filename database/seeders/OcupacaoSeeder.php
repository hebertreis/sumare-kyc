<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ocupacao;

class OcupacaoSeeder extends Seeder
{
    public function run()
    {
        $ocupacoes = json_decode(file_get_contents(database_path('seeders/ocupacoes.json')), true);

        foreach ($ocupacoes as $ocupacao) {
            Ocupacao::create(['title' => $ocupacao['title']]);
        }
    }
}