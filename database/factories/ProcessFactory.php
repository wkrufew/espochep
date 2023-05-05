<?php

namespace Database\Factories;

use App\Models\Process;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Process>
 */
class ProcessFactory extends Factory
{

    protected $model = Process::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title_es' => $title,
            'title_en' => $title,
            'object_es' => $title,
            'object_en' => $title,
            'description_es' => $this->faker->paragraph(),
            'description_en' => $this->faker->sentence(),
            'code' => 'NIC-0660841910001-2022-00022',
            'forma_pago_es' => '100% contra entrega',
            'forma_pago_en' => '100% against delivery',
            'email' => $this->faker->unique()->safeEmail(),
            'url_file' => 'https://www.compraspublicas.gob.ec/ProcesoContratacion/compras/NCO/NCORegistroDetalle.cpe?&id=kJSa2nDA3c-JoS8DMcf1I64WhpFZuhFshV12AgYjAN8,&op=1',
            'status' => $this->faker->randomElement([Process::BORRADOR,Process::EJECUCION,Process::FINALIZADO,Process::DESIERTO,Process::REVISION]),
            'slug' => Str::slug($title),
            'user_id' => User::all()->random()->id,
            'purchase_id' => Purchase::all()->random()->id

        ];
    }
}
