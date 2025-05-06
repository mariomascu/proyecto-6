<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ArticuloSeeder extends Seeder
{    
    public function run(): void
    {
        // Crear el objeto Faker para datos en español
        $faker = Faker::create('es_ES');
        
        // El contenido de los artículos se lo he pedido a GPT para no hincharme a escribir.
        $articulos = [
            [
                'id' => 1,
                'titulo' => 'El Futuro de la Inteligencia Artificial',
                'contenido' => 'La inteligencia artificial (IA) está evolucionando a un ritmo impresionante. En los últimos años, hemos visto avances significativos en el aprendizaje automático y el procesamiento de lenguaje natural. Empresas como OpenAI están liderando la carrera con modelos de IA que son capaces de realizar tareas complejas, desde la redacción de textos hasta la creación de arte. Sin embargo, con estos avances vienen preguntas éticas sobre la privacidad, el control de la información y el impacto en el empleo.',
                'fecha_publicacion' => Carbon::now()->subMonths(2),
                'autor' => $faker->name()
            ],
            [
                'id' => 2,
                'titulo' => 'Impacto de la Computación Cuántica',
                'contenido' => 'La computación cuántica tiene el potencial de revolucionar la forma en que resolvemos problemas complejos, como la simulación de moléculas en la investigación farmacéutica o la optimización de sistemas logísticos. Sin embargo, todavía estamos en las primeras etapas de este campo. A medida que los investigadores mejoran la estabilidad de los qubits y desarrollan algoritmos cuánticos, podríamos ver un cambio radical en áreas como la criptografía y la inteligencia artificial.',
                'fecha_publicacion' => Carbon::now()->subMonths(4),
                'autor' => $faker->name()
            ],
            [
                'id' => 3,
                'titulo' => 'El Crecimiento del 5G',
                'contenido' => 'El despliegue de redes 5G está acelerando el desarrollo de tecnologías como la realidad aumentada (AR) y la Internet de las Cosas (IoT). Con velocidades mucho más rápidas y una latencia significativamente reducida, el 5G tiene el potencial de transformar industrias enteras, desde la automotriz hasta la salud. No obstante, existen preocupaciones sobre los posibles efectos en la salud pública y la infraestructura necesaria para soportar estas redes.',
                'fecha_publicacion' => Carbon::now()->subMonths(1),
                'autor' => $faker->name()
            ],
            [
                'id' => 4,
                'titulo' => 'La Revolución de los Vehículos Autónomos',
                'contenido' => 'Los vehículos autónomos están cada vez más cerca de convertirse en una realidad cotidiana. Empresas como Tesla, Waymo y muchas otras están invirtiendo miles de millones en la creación de coches sin conductor que no solo son más seguros, sino también más eficientes. A pesar de estos avances, el camino hacia la adopción masiva aún está lleno de desafíos, incluyendo regulaciones gubernamentales, ética y, por supuesto, la confianza del consumidor.',
                'fecha_publicacion' => Carbon::now()->subMonths(5),
                'autor' => $faker->name()
            ],
            [
                'id' => 5,
                'titulo' => 'La Era de la Computación en la Nube',
                'contenido' => 'La computación en la nube ha transformado la forma en que las empresas manejan y almacenan sus datos. Servicios como Amazon Web Services (AWS), Microsoft Azure y Google Cloud han facilitado a las empresas de todos los tamaños el acceso a recursos informáticos escalables y flexibles. Además, la nube está impulsando la innovación en áreas como la inteligencia artificial, el big data y el análisis predictivo, pero también plantea preocupaciones sobre la seguridad de los datos y la dependencia de proveedores externos.',
                'fecha_publicacion' => Carbon::now()->subMonths(3),
                'autor' => $faker->name()
            ],
            [
                'id' => 6,
                'titulo' => 'Ciberseguridad en un Mundo Conectado',
                'contenido' => 'A medida que más y más dispositivos se conectan a internet, la ciberseguridad se ha convertido en una preocupación primordial. Desde ataques a infraestructuras críticas hasta violaciones de datos personales, las amenazas cibernéticas están evolucionando constantemente. Es esencial que tanto las empresas como los usuarios individuales tomen medidas proactivas para proteger su información, ya sea mediante contraseñas seguras, autenticación de dos factores o software de protección avanzado.',
                'fecha_publicacion' => Carbon::now()->subMonths(6),
                'autor' => $faker->name()
            ],
            [
                'id' => 7,
                'titulo' => 'La Era de la Realidad Virtual (VR) y Aumentada (AR)',
                'contenido' => 'La realidad virtual y la realidad aumentada están comenzando a cambiar la forma en que interactuamos con el mundo digital. Las aplicaciones de VR están mejorando la formación profesional, el entretenimiento y las experiencias inmersivas, mientras que la AR está transformando la forma en que vemos y usamos la información en nuestro entorno físico. Con grandes avances en hardware y software, el futuro de la VR y la AR parece prometedor, pero aún enfrentan barreras como la accesibilidad y la aceptación generalizada.',
                'fecha_publicacion' => Carbon::now()->subMonths(4),
                'autor' => $faker->name()
            ],
            [
                'id' => 8,
                'titulo' => 'Blockchain y su Impacto en Diversas Industrias',
                'contenido' => 'Blockchain, la tecnología detrás de las criptomonedas como Bitcoin y Ethereum, está demostrando tener aplicaciones más allá del sector financiero. Su capacidad para garantizar transacciones seguras y transparentes la está haciendo útil en sectores como la logística, la atención médica y el gobierno. Sin embargo, la escalabilidad y la eficiencia energética siguen siendo desafíos clave a medida que la tecnología se adapta a un mundo más interconectado.',
                'fecha_publicacion' => Carbon::now()->subMonths(2),
                'autor' => $faker->name()
            ],
            [
                'id' => 9,
                'titulo' => 'El Auge de la Tecnología de la Salud Digital',
                'contenido' => 'La tecnología de la salud digital está revolucionando el cuidado médico, desde la telemedicina hasta los dispositivos portátiles que monitorean la salud en tiempo real. Las aplicaciones de IA están mejorando el diagnóstico médico, mientras que los wearables están ayudando a las personas a llevar un estilo de vida más saludable. A medida que estos dispositivos se vuelven más accesibles, el futuro de la atención médica personalizada es más prometedor que nunca.',
                'fecha_publicacion' => Carbon::now()->subMonths(3),
                'autor' => $faker->name()
            ],
            [
                'id' => 10,
                'titulo' => 'La Sostenibilidad en la Tecnología',
                'contenido' => 'La sostenibilidad es uno de los mayores desafíos de la tecnología moderna. Las empresas tecnológicas están adoptando prácticas más ecológicas, desde el uso de materiales reciclables en dispositivos electrónicos hasta el desarrollo de centros de datos alimentados por energía renovable. A medida que la conciencia sobre el cambio climático crece, la industria tecnológica tiene la oportunidad de desempeñar un papel fundamental en la creación de soluciones innovadoras para combatir el calentamiento global.',
                'fecha_publicacion' => Carbon::now()->subMonths(1),
                'autor' => $faker->name()
            ]
        ];

        // Crear los artículos en la base de datos
        foreach ($articulos as $articulo) {
            Articulo::create($articulo);
        }
    }
}
