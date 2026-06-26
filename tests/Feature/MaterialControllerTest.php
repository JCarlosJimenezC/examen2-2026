<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente(): void
    {
        $categoria = Categoria::create(['nombre' => 'Construccion']);

        $payload = [
            'unidadMedida' => 'kg',
            'descripcion'  => 'Cemento gris',
            'ubicacion'    => 'Bodega A',
            'idCategoria'  => $categoria->idCategoria,
        ];

        $response = $this->postJson('/api/materiales', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'unidadMedida' => 'kg',
                     'descripcion'  => 'Cemento gris',
                     'ubicacion'    => 'Bodega A',
                 ]);

        $this->assertDatabaseHas('materials', [
            'descripcion' => 'Cemento gris',
            'idCategoria' => $categoria->idCategoria,
        ]);
    }
}
