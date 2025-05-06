<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Comentario;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el objeto Faker para datos en español
        $faker = Faker::create('es_ES');
        
        // Obtener todos los artículos
        $articulos = Articulo::all();
        
        // Comentarios específicos para cada artículo según su ID
        $comentariosPorArticulo = [
            1 => [ // Artículo ID 1: El Futuro de la Inteligencia Artificial
                'La IA está cambiando la manera en que interactuamos con la tecnología, pero me preocupa cómo afectará el empleo a largo plazo.',
                'El impacto de la IA en el trabajo es algo que se debe abordar de manera ética. La automatización es inevitable, pero debemos prepararnos.',
                'La privacidad en la era de la IA es un tema crucial. ¿Hasta qué punto podemos confiar en los algoritmos para manejar nuestra información?'
            ],
            2 => [ // Artículo ID 2: Impacto de la Computación Cuántica
                'La computación cuántica promete enormes avances, pero ¿realmente estamos cerca de implementarla a gran escala?',
                'Es fascinante pensar en los cambios que la computación cuántica traerá a la criptografía. ¿Cómo afectará la seguridad en línea?',
                'El potencial de la computación cuántica es impresionante, pero la estabilidad de los qubits es aún una gran barrera técnica.'
            ],
            3 => [ // Artículo ID 3: El Crecimiento del 5G
                'El 5G tiene el potencial de transformar industrias, pero la infraestructura necesaria es un reto importante.',
                'Con 5G, veremos avances en IoT, pero también se deben estudiar los posibles efectos sobre la salud.',
                'El 5G traerá muchas ventajas, pero parece que aún hay muchas dudas sobre su impacto ambiental y social.'
            ],
            4 => [ // Artículo ID 4: La Revolución de los Vehículos Autónomos
                'Los vehículos autónomos pueden mejorar la seguridad en las carreteras, pero ¿cómo se manejarán los casos en los que una máquina debe tomar decisiones éticas?',
                'Es interesante ver cómo las empresas están invirtiendo tanto en esta tecnología, pero hay muchas preguntas sin responder.',
                'Me pregunto si los vehículos autónomos cambiarán radicalmente el panorama laboral, especialmente en el sector de transporte.'
            ],
            5 => [ // Artículo ID 5: La Era de la Computación en la Nube
                'La computación en la nube ha facilitado el trabajo remoto, pero también plantea riesgos de dependencia excesiva de los proveedores.',
                'La nube permite la escalabilidad, pero la seguridad sigue siendo una gran preocupación, especialmente con datos sensibles.',
                'A medida que más empresas migran a la nube, la interoperabilidad se está convirtiendo en un reto clave.'
            ],
            6 => [ // Artículo ID 6: Ciberseguridad en un Mundo Conectado
                'La ciberseguridad nunca ha sido tan importante. Las amenazas cibernéticas evolucionan constantemente, y es esencial estar preparado.',
                'Los ataques de ransomware son una preocupación creciente. Las empresas deben tomar medidas preventivas más fuertes.',
                'Es fundamental educar a los usuarios sobre cómo proteger su información personal. La ciberseguridad empieza con nosotros.'
            ],
            7 => [ // Artículo ID 7: La Era de la Realidad Virtual (VR) y Aumentada (AR)
                'La VR tiene un futuro increíble en educación, pero la accesibilidad y el costo aún son barreras para su adopción masiva.',
                'Me gustaría ver más aplicaciones de AR en la vida diaria, especialmente en el ámbito de la medicina y la ingeniería.',
                'La realidad virtual está evolucionando rápidamente, pero la calidad de la experiencia y la comodidad del usuario son claves para su éxito.'
            ],
            8 => [ // Artículo ID 8: Blockchain y su Impacto en Diversas Industrias
                'Blockchain tiene el potencial de transformar la industria financiera, pero su adopción aún enfrenta grandes desafíos.',
                'La transparencia que ofrece blockchain es prometedora, especialmente en sectores como la cadena de suministro y la salud.',
                'A pesar de su potencial, la eficiencia energética de blockchain es una preocupación importante que necesita ser resuelta.'
            ],
            9 => [ // Artículo ID 9: El Auge de la Tecnología de la Salud Digital
                'La telemedicina ha revolucionado el acceso a la atención médica, especialmente en áreas rurales.',
                'Los dispositivos portátiles son el futuro de la salud, pero la fiabilidad de los datos es clave para que realmente tengan un impacto.',
                'La inteligencia artificial está comenzando a mejorar los diagnósticos médicos, pero ¿cómo garantizamos su precisión?'
            ],
            10 => [ // Artículo ID 10: La Sostenibilidad en la Tecnología
                'Es excelente ver cómo las empresas tecnológicas están adoptando prácticas más ecológicas. Necesitamos más iniciativas como estas.',
                'La sostenibilidad no debería ser solo una tendencia, sino una prioridad para todas las industrias, incluida la tecnológica.',
                'El uso de energías renovables en los centros de datos es un paso en la dirección correcta para reducir la huella de carbono de la tecnología.'
            ]
        ];

        // Asignar comentarios a los artículos según el ID
        foreach ($articulos as $articulo) {
            // Seleccionar los comentarios para el artículo según su ID
            $comentarios = $comentariosPorArticulo[$articulo->id] ?? [];

            // Generar entre 1 y 3 comentarios para cada artículo
            $numComentarios = count($comentarios);
            for ($i = 0; $i < $numComentarios; $i++) {
                // Asegurar que la fecha del comentario sea posterior a la fecha del artículo
                $fechaArticulo = $articulo->fecha_publicacion;
                $fechaComentario = Carbon::parse($faker->dateTimeBetween($fechaArticulo, 'now'));

                Comentario::create([
                    'contenido' => $comentarios[$i],
                    'fecha_publicacion' => $fechaComentario,
                    'autor' => $faker->name(),
                    'articulo_id' => $articulo->id
                ]);
            }
        }
    }
}
