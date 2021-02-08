<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //DB::table('users')->truncate();
        DB::table('users')->insert  (['name'=>'Administrador del Sistema','role'=>'ADMIN','email'=>'admin@veoweb.site','password'=>Hash::make('123'),'created_at'=>now()]);
        DB::table('users')->insert  (['name'=>'Pedro Antonio Chacón Garnica','role'=>'READER','email'=>'pedro.chacon29@hotmail.com','password'=>Hash::make('pedrito29'),'created_at'=>now()]);
        DB::table('users')->insert  (['name'=>'Alberto J. Ruiz Monsalve','role'=>'READER','email'=>'alberto.monsalve@hotmail.com','password'=>Hash::make('123'),'created_at'=>now()]);

        DB::table('categories')->insert  (['name'=>'Cuentos Infantiles','description'=>'Cuentos Infantiles para edades desde el primer al noveno año','image'=>'storage/img/category/cuentos-infantiles.jpg','user_id'=>1,'created_at'=>now()]);
        //DB::table('categories')->insert  (['name'=>'Finanzas','description'=>'los mejores libros sobre educación financiera que deberías leer','image'=>'storage/img/category/Finanzas.png','user_id'=>1,'created_at'=>now()]);
        //DB::table('categories')->insert  (['name'=>'Arquitectura','description'=>'Van dirigidos a quienes están estudiando y a quienes desean saber más','image'=>'storage/img/category/arquitectura.jpg','user_id'=>1,'created_at'=>now()]);
        //DB::table('categories')->insert  (['name'=>'Arte','description'=>'El libro-arte, libro objeto o libro de artista visual','image'=>'storage/img/category/arte.jpg','user_id'=>1,'created_at'=>now()]);
        DB::table('categories')->insert  (['name'=>'Ciencia Ficción','description'=>'Géneros derivados de la literatura de ficción','image'=>'storage/img/category/ficcion.jpg','user_id'=>1,'created_at'=>now()]);
        DB::table('categories')->insert  (['name'=>'Tecnología','description'=>'La tecnología protagonista del mundo en el que nos movemos','image'=>'storage/img/category/tecnologia.jpg','user_id'=>1,'created_at'=>now()]);

        DB::table('books')->insert  (['title'=>'El lobo en calzoncillos. ¡Se me congelan!','image'=>'storage/img/book/el-lobo-en-calzoncillos.jpg','isbn'=>'9788467932201','author'=>'Mayana Itoïz','summary'=>'Vuelve El lobo en calzoncillos de Astronave. Esta vez, es en invierno y el lobo vuelve a sembrar el caos, ya que no para de pasearse por el pueblo diciendo que se le congelan. Y los animales, están todos muy asustados e intentan solucionar el problema del lobo. Este es un álbum ilustrado con mucho humor que nos enseña a ayudar a los más necesitados y nos enseña que a veces, los que más tienen son los que más deberían dar.','averach'=>4.5,'price'=>13.95,'category_id'=>1,'user_id'=>3,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'La casa de los ratones','image'=>'storage/img/book/ratones.jpg','isbn'=>'9788417059590','author'=>'Karina Schaapman','summary'=>'Llega una nueva aventura de La casa de los ratones. Esta vez, en pequeño formato. Sam y Julia quieren irse de picnic y no saben que hacer con los trillizos, pero seguramente se los lleven con ellos y acaben viviendo muchas aventuras. Este álbum ilustrado tiene imágenes que son de verdad, pues la autora ha creado La casa de los ratones y está completa de miniaturas. ¿Te gustaría descubrirla?','averach'=>5,'price'=>10.20,'category_id'=>1,'user_id'=>3,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'Mi superabuela','image'=>'storage/img/book/mi-superabuela.jpg','isbn'=>'9788448845483','author'=>'Marta Cunill','summary'=>'¿Cómo es una superabuela? En este cuento descubriremos que una superabuela es una superheroína con multitud de poderes: es capaz de teletransportar a cualquier persona a otros mundos, curar las heridas, arreglar los desastres que parecen irreparables... La pequeña nieta, narradora de esta historia, mira con admiración a su abuela, que tanto la cuida, protege y mima. La narradora muestra a una abuela cercana, gran cocinera, que encubre sus pequeñas travesuras (como pintar una pared, dejando restos de pintura por todas partes) y le ayuda a con sus responsabilidades (como recoger los juguetes cuando ha acabado de jugar). Y es que la superabuela es una verdadera superheroína, que va ataviada con un flamante antifaz y una original capa. Esta historia acaba con una emotiva imagen: a pesar de su avanzada edad y de caminar encorvada y apoyada en un bastón, la pequeña narradora sólo ve en su abuela a una persona fuerte y potente, que siempre está, y estará, a su lado.','averach'=>5,'price'=>14.95,'category_id'=>1,'user_id'=>2,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'Soy leyenda','image'=>'storage/img/book/leyenda.jpg','isbn'=>'9788467931228','author'=>'Paul Moran','summary'=>'El libro se desarrolla en una versión postapocalíptica de la ciudad de Los Ángeles, comprendida entre el año de 1976 y 1979. El protagonista, Robert Neville, ha sobrevivido a una pandemia provocada por una guerra bacteriológica que ha arrasado con todas las personas que había en la Tierra; sin embargo, estos no están muertos, sino que se han convertido en portadores de una bacteria que produce los clásicos síntomas del vampiro mítico, dividiéndose en dos clases: los infectados, quienes en vida contrajeron la bacteria y los vampiros, los muertos que resucitaron gracias a la bacteria.','averach'=>4,'price'=>8.30,'category_id'=>2,'user_id'=>2,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'La Chica Mecanica','image'=>'storage/img/book/lachica.jpg','isbn'=>'8786655448865','author'=>'Paolo Bacigalupi','summary'=>'Emiko es una "chica mecánica", el último eslabón de la ingeniería genética. Como los demás neoseres a cuya raza pertenece, fue diseñada para servir. Acusados por unos de carecer de alma, por otros de ser demonios encarnados, los neoseres son esclavos, soldados o, en el caso de Emiko, juguetes sexuales para satisfacer a los poderosos en un futuro inquietantemente cercano','averach'=>5,'price'=>131.40,'category_id'=>2,'user_id'=>2,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'Herejes de Dune','image'=>'storage/img/book/dune.jpg','isbn'=>'999444566544','author'=>'Frank Herbert','summary'=>'Herejes de Dune es el quinto libro en La Saga de Dune de Frank Herbert. En él se plasman los acontecimientos siguientes al orden de paz forzada por Leto II, el Dios Emperador.','averach'=>5,'price'=>13.95,'category_id'=>2,'user_id'=>3,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'Plataforma de bajo coste','image'=>'storage/img/book/plantaforma.gif','isbn'=>'GNU General Public License','author'=>'Universidad de Castilla-La Mancha','summary'=>'Se ha logrado implementar un sistema basado en arquitectura cliente servidor, utilizando hardware libre y de bajo coste monitorizado y controlado desde una aplicación móvil híbrida desarrollada con tecnologías web. Además, el sistema posee cierta capacidad inteligente pues utilizando los datos almacenados en una base de datos de lo que sucede en el entorno domó- tico es capaz de reconocer las acciones que las personas mayores realizan en cada momento para predecir después sus posibles acciones futuras.','averach'=>5,'price'=>0.0,'category_id'=>3,'user_id'=>2,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'Arduino. Libro de Proyectos','image'=>'storage/img/book/arduino.jpg','isbn'=>'CC-BY-NC','author'=>'Fernando Cuervo','summary'=>'Todo el mundo, cada día, utiliza la tecnología. La mayoría de nosotros deja la programación a ingenieros porque pensamos que programar y la electrónica son complicadas y difíciles de entender. En la actualidad estas actividades pueden ser divertidas y excitantes. Gracias a Arduino, diseñadores, artistas, personas con un hobby y estudiantes de todas las edades están aprendiendo a crear cosas que se iluminan, mueven y responden ante personas, animales, plantas y el resto del mundo.','averach'=>5,'price'=>22.50,'category_id'=>3,'user_id'=>3,'created_at'=>now()]);
        DB::table('books')->insert  (['title'=>'Raspberry PI: Beginners Book','image'=>'storage/img/book/rapberry.gif','isbn'=>'66658984441','author'=>'Frank Scotan','summary'=>'The official Raspberry Pi Beginner’s book comes with everything you need to get started with Raspberry Pi today (hardware not included with the digital edition). Inside you’ll find a Raspberry Pi Zero W, the official case (with three interchangeable covers), SD card with NOOBS pre-loaded, not to mention USB and HDMI adapter cables. The accompanying 116-page book is packed with beginner’s guides to help you master your new Raspberry Pi!','averach'=>5,'price'=>18.50,'category_id'=>3,'user_id'=>2,'created_at'=>now()]);

        DB::table('rates')->insert  (['description'=>'Es un libro fantastico, apropiado para mi hijo de 4 años','rate'=>4,'book_id'=>1,'user_id'=>2,'created_at'=>now()]);
        DB::table('rates')->insert  (['description'=>'Grandiosa elección','rate'=>5,'book_id'=>1,'user_id'=>3,'created_at'=>now()]);
        DB::table('rates')->insert  (['description'=>'Contenido bueno pero falta de imagenes ilustrativas','rate'=>3,'book_id'=>2,'user_id'=>2,'created_at'=>now()]);
        DB::table('rates')->insert  (['description'=>'Favorece el aprendizaje de mis hijos','rate'=>5,'book_id'=>2,'user_id'=>3,'created_at'=>now()]);

        //DB::table('books')->insert  (['title'=>'','image'=>'storage/img/book/','isbn'=>'','author'=>'','summary'=>'','averach'=>5,'price'=>13.95,'category_id'=>1,'user_id'=>2,'created_at'=>now()]);

    }
}
