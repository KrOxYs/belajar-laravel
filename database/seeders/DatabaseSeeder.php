<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\main;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

     User::create([
         'name' => 'Rai',
         'username' => 'Raifandi',
         'email' => 'raifandibaiqi@gmail.com',
         'password' => bcrypt('123456')
     ]);
    //  User::create([
    //     'name' => 'Fandi',
    //     'email' => 'mohammadbaiqi@gmail.com',
    //     'password' => bcrypt('12345')
    // ]);
    User::factory(3)->create();

     Category::create([
         'name' => 'Programmer',
         'slug' => 'programmer'
     ]);

     Category::create([
        'name' => 'Personal',
        'slug' => 'Personal'
     ]);
     Category::create([
        'name' => 'Web Desain',
        'slug' => 'Web Desain'
     ]);
     main::factory(20)->create();

    //  main::create([
    //      'tittle' => 'Judul Pertama',
    //      'slug' => 'judul-pertama',
    //      'excerpt' => ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //      Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //      illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //      optio aspernatur a! Voluptatibus sit recusandae,',
    //      'body'=> ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //      Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //      illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //      optio aspernatur a! Voluptatibus sit recusandae reprehenderit repellendus
    //      laudantium nam esse delectus deleniti ducimus. Lorem ipsum dolor sit amet
    //      consectetur, adipisicing elit. Voluptatum aliquam maxime laudantium
    //      reiciendis ab, a, at quidem nulla sequi id soluta, libero culpa nesciunt
    //      neque. Unde non aliquid laborum explicabo.',
    //      'category_id' => 1 ,
    //      'user_id' => 1
    //  ]);
    //  main::create([
    //     'tittle' => 'Judul Kedua',
    //     'slug' => 'judul-kedua',
    //     'excerpt' => ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae,',
    //     'body'=> ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae reprehenderit repellendus
    //     laudantium nam esse delectus deleniti ducimus. Lorem ipsum dolor sit amet
    //     consectetur, adipisicing elit. Voluptatum aliquam maxime laudantium
    //     reiciendis ab, a, at quidem nulla sequi id soluta, libero culpa nesciunt
    //     neque. Unde non aliquid laborum explicabo.',
    //     'category_id' => 1 ,
    //     'user_id' => 1
    // ]);
    // main::create([
    //     'tittle' => 'Judul Ketiga',
    //     'slug' => 'judul-ketiga',
    //     'excerpt' => ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae,',
    //     'body'=> ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae reprehenderit repellendus
    //     laudantium nam esse delectus deleniti ducimus. Lorem ipsum dolor sit amet
    //     consectetur, adipisicing elit. Voluptatum aliquam maxime laudantium
    //     reiciendis ab, a, at quidem nulla sequi id soluta, libero culpa nesciunt
    //     neque. Unde non aliquid laborum explicabo.',
    //     'category_id' => 2,
    //     'user_id' => 1
    // ]);
    // main::create([
    //     'tittle' => 'Judul Keempat',
    //     'slug' => 'judul-keempat',
    //     'excerpt' => ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae,',
    //     'body'=> ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae reprehenderit repellendus
    //     laudantium nam esse delectus deleniti ducimus. Lorem ipsum dolor sit amet
    //     consectetur, adipisicing elit. Voluptatum aliquam maxime laudantium
    //     reiciendis ab, a, at quidem nulla sequi id soluta, libero culpa nesciunt
    //     neque. Unde non aliquid laborum explicabo.',
    //     'category_id' => 2,
    //     'user_id' => 1
    // ]);
    // main::create([
    //     'tittle' => 'Judul Kelima',
    //     'slug' => 'judul-kelima',
    //     'excerpt' => ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae,',
    //     'body'=> ' accusantium, sapiente consequuntur voluptates dolorum non labore blanditiis!
    //     Iste expedita nam voluptatem et aspernatur molestiae aliquam modi ducimus
    //     illo. Adipisci doloribus, numquam nulla eveniet consequuntur beatae nemo
    //     optio aspernatur a! Voluptatibus sit recusandae reprehenderit repellendus
    //     laudantium nam esse delectus deleniti ducimus. Lorem ipsum dolor sit amet
    //     consectetur, adipisicing elit. Voluptatum aliquam maxime laudantium
    //     reiciendis ab, a, at quidem nulla sequi id soluta, libero culpa nesciunt
    //     neque. Unde non aliquid laborum explicabo.',
    //     'category_id' => 1,
    //     'user_id' => 2
    // ]);

    }
}
