<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

        \App\Models\User::truncate();
        \App\Models\Post::truncate();
        \App\Models\Category::truncate();

        \App\Models\User::create([
            'name' => 'toto',
            'email' => 'toto@email.com',
            'phone_number' => '0680808088',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 0
        ]);

        \App\Models\User::create([
            'name' => 'jun',
            'email' => 'junsuzuki@gmx.fr',
            'phone_number' => '0606060606',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 1
        ]);

        \App\Models\User::create([
            'name' => 'treelover',
            'email' => 'treelover@email.com',
            'phone_number' => '0680808082',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 0
        ]);

        \App\Models\User::create([
            'name' => 'forestgirl22',
            'email' => 'forestgirl22@email.com',
            'phone_number' => '0680808084',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 0
        ]);

        \App\Models\User::create([
            'name' => 'jardinier-corse',
            'email' => 'jardinier-corse@email.com',
            'phone_number' => '0680808083',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 0
        ]);

        \App\Models\User::create([
            'name' => 'big-forestier72',
            'email' => 'big-forestier@email.com',
            'phone_number' => '0680808085',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 0
        ]);

        \App\Models\User::create([
            'name' => 'Gabi',
            'email' => 'dubois_gabriel@orange.fr',
            'phone_number' => '0680808087',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 1
        ]);

        \App\Models\User::create([
            'name' => 'NicolasHulot',
            'email' => 'nicolas_hulot@email.com',
            'phone_number' => '0685808087',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 1
        ]);

        \App\Models\User::create([
            'name' => 'alex',
            'email' => 'alex@alex.com',
            'phone_number' => '0680808089',
            'password' => \Illuminate\Support\Facades\Hash::make('123123123'),
            'is_admin' => 0
        ]);

        \App\Models\Post::create([
            'title' => 'Maritime Pine',
            'category_id' => 2,
            'type_id' => 1,
            'user_id' => 3,
            'author' => 'treelover',
            'lang' => 'fr',
            'price' => 18,
            'location' => 'West',
            'description' => 'Age: 35 to 40 years old, Malicorne sur Sarthe Forest, Sarthe, Pays de la Loire, France. \n Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt optio quisquam at molestiae ea quae doloremque commodi eligendi voluptas? Dolores animi consequatur voluptatum dicta odio iusto minima porro, modi cupiditate itaque in architecto necessitatibus eius, odit eos, sapiente ut nemo? Eligendi, soluta nam dolorum harum maiores quidem error perspiciatis nulla reprehenderit qui earum beatae aliquam ducimus atque neque in blanditiis similique, excepturi assumenda aperiam animi et? Accusantium, excepturi deserunt, aut tempore ipsum, recusandae fugit accusamus maiores vitae beatae error sed!',
            'picture' => '/storage/postImg/maritime-pine-small.jpg',
            'published_at' => '2021-02-17'
        ]);

        \App\Models\Post::create([
            'title' => 'Sessile Oak',
            'category_id' => 1,
            'type_id' => 1,
            'user_id' => 4,
            'author' => 'forestgirl22',
            'lang' => 'en',
            'price' => 15,
            'location' => 'South-West',
            'description' => 'Age: 0 to 2 years old, Luthenay Forest, Nièvre, Burgundy, France Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem tempora temporibus odit nisi incidunt porro impedit neque, amet provident officia, quia magni architecto, iusto cupiditate minus dolore repellendus maxime? Alias cumque qui quia, perspiciatis soluta, facere voluptate doloribus quas vero, commodi nemo. Culpa magnam placeat eveniet non voluptate tempora officia!',
            'picture' => '/storage/postImg/sessile-oak-small.jpg',
            'published_at' => '2021-03-11'
        ]);

        \App\Models\Post::create([
            'title' => 'Red Oak',
            'category_id' => 1,
            'type_id' => 1,
            'user_id' => 4,
            'author' => 'forestgirl22',
            'lang' => 'en',
            'price' => 18,
            'location' => 'Center',
            'description' => 'Age: 0 to 2 years old, Luthenay Forest, France, Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum deserunt reprehenderit distinctio non enim. Ab sint accusamus dignissimos praesentium doloremque voluptatem maiores iure quia, labore atque. Impedit amet odit exercitationem doloremque magnam consectetur vero architecto, minus quos nesciunt dolorem, quidem earum mollitia dignissimos quod reiciendis possimus expedita numquam perspiciatis sed fugiat reprehenderit? Facilis laborum officiis non fuga similique quis quisquam blanditiis vero illo, eligendi laudantium earum impedit natus, officia quibusdam architecto placeat sed nulla molestiae. Ex vero soluta quos quaerat reprehenderit nulla autem recusandae ullam, quas aspernatur, ea expedita blanditiis? Inventore consequatur omnis, nam aperiam doloribus culpa porro impedit eos.',
            'picture' => '/storage/postImg/red-oak-small.jpg',
            'published_at' => '2021-04-05'
        ]);

        \App\Models\Post::create([
            'title' => 'Nature Bundle',
            'category_id' => 2,
            'type_id' => 2,
            'user_id' => 4,
            'author' => 'forestgirl22',
            'lang' => 'en',
            'price' => 250,
            'surface_area' => 2,
            'location' => 'Center',
            'description' => 'Details of the pack: 5 Sitka Spruce from Kerautret Forest (56), 9 Maritime Pine from Malicorne sur Sarthe Forest (72) Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime quisquam iste voluptatem sit, iusto mollitia dignissimos ipsa rem illum ut, provident odio. Eum neque iure, officia consequatur nam dolorem aliquid?',
            'picture' => '/storage/postImg/nature-bundle-small.jpg',
            'published_at' => '2021-06-22'
        ]);

        \App\Models\Post::create([
            'title' => 'Sitka Spruce',
            'category_id' => 2,
            'type_id' => 1,
            'user_id' => 3,
            'author' => 'treelover',
            'lang' => 'fr',
            'price' => 22,
            'location' => 'North',
            'description' => 'Large conifer of the Pinaceae family, can reach 80m in height in its natural air. Characterized by its longevity and rapid growth, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde dicta corporis tempore pariatur cupiditate aliquam placeat, soluta aspernatur, id doloribus itaque, ad corrupti non praesentium ipsa labore? Officia cum ex doloremque? Saepe ea minima est necessitatibus, repellendus possimus consequatur dolore nobis voluptates dolor voluptate aperiam totam, dolores modi officia. Consectetur aliquam fugiat explicabo repellendus velit distinctio minima molestias. Dolorum, eveniet accusamus! Cumque deserunt totam, similique dolore eum, voluptatibus dignissimos reprehenderit quas unde repellendus eius eos recusandae praesentium odit veritatis quod. Excepturi a ad quam minus at nesciunt voluptatem atque laudantium possimus? Quasi, recusandae molestiae. Voluptates qui numquam deserunt tempora ipsam distinctio placeat consequuntur, error doloremque harum excepturi id totam repudiandae, a cupiditate iure soluta aspernatur sint saepe quod architecto nisi labore corrupti. Ipsum nostrum nulla, repellendus incidunt ab ipsa, commodi corporis saepe autem alias molestiae officia quod perspiciatis officiis necessitatibus nisi blanditiis laborum a cupiditate. Est incidunt laborum natus libero.',
            'picture' => '/storage/postImg/sitka-spruce-small.jpg',
            'published_at' => '2021-06-14'
        ]);

        \App\Models\Post::create([
            'title' => 'Corsican Laricio Pine',
            'category_id' => 2,
            'type_id' => 1,
            'user_id' => 5,
            'author' => 'jardinier-corse',
            'lang' => 'fr',
            'price' => 28,
            'location' => 'South-East',
            'description' => 'Very slow growth but longevity is impressive: can indeed exceed a millennium! can reach venerable heights up to 40 meters. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus molestias voluptas quidem temporibus eos et reiciendis autem adipisci harum nihil, soluta excepturi non sint accusamus hic nulla dolorem possimus iusto architecto corporis commodi tempora? Esse, eius. Atque at, quas deleniti, cumque nemo harum voluptatibus, dignissimos a impedit sed ad. Voluptate, exercitationem nostrum accusamus perferendis vero culpa nobis odio autem numquam animi sed, fuga alias. Deserunt temporibus pariatur non recusandae ex?',
            'picture' => '/storage/postImg/corsican-laricio-pine-small.jpg',
            'published_at' => '2021-06-28'
        ]);

        \App\Models\Post::create([
            'title' => 'Forest Bundle',
            'category_id' => 2,
            'type_id' => 3,
            'user_id' => 5,
            'author' => 'jardinier-corse',
            'lang' => 'fr',
            'price' => 2500,
            'surface_area' => 6,
            'location' => 'Center',
            'description' => 'Details of the pack: 50 Douglas from Melrand Forest (56), 40 Douglas from Gioux Forest (23), 35 Corsican laricio Pine from Luthenay Forest (58), Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed a voluptates voluptatum sint rerum repellendus, repellat dolor sequi quos debitis ducimus asperiores labore! Deserunt blanditiis veritatis asperiores dignissimos, adipisci delectus velit dicta temporibus reprehenderit magnam dolorem autem praesentium repellendus ipsa quis quod officia modi aliquam deleniti eaque tempora repellat nemo! Quia eveniet quos laborum atque, aliquam illum assumenda quisquam explicabo.',
            'picture' => '/storage/postImg/forest-bundle-small.jpg',
            'published_at' => '2021-05-17'
        ]);

        \App\Models\Post::create([
            'title' => 'Healthy Forest Pack',
            'category_id' => 2,
            'type_id' => 3,
            'user_id' => 4,
            'author' => 'forestgirl22',
            'lang' => 'en',
            'price' => 3500,
            'location' => 'Center',
            'surface_area' => 8,
            'description' => 'Details of the pack: 150 Cedars from Melrand Forest (56), 90 Douglas from Gioux Forest (23). Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam eveniet illo eos dicta cupiditate aut fugit sint blanditiis porro quam doloremque facere, ut quidem aspernatur ad perferendis deserunt. Voluptatum, esse?',
            'picture' => '/storage/postImg/forest-pack-small.jpg',
            'published_at' => '2021-06-29'
        ]);

        \App\Models\Post::create([
            'title' => 'Cedars Pack',
            'category_id' => 2,
            'type_id' => 3,
            'user_id' => 3,
            'author' => 'treelover',
            'lang' => 'fr',
            'price' => 5500,
            'location' => 'South-East',
            'surface_area' => 12,
            'description' => 'Details of the pack: 450 Cedars from Parc Naturel régional de Camargue, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, quisquam asperiores consequuntur vel, id praesentium, vero ex illo error modi deleniti placeat repellat totam amet consequatur inventore nam alias sit quis molestiae enim non sapiente. Sequi voluptas harum beatae unde omnis natus assumenda aperiam minus distinctio repellat, rem ad dolor quis numquam id accusamus nobis ipsam cupiditate provident! Ex quam corporis necessitatibus cupiditate libero architecto animi, deleniti repellat illo atque molestiae rem laborum incidunt sed, perspiciatis ab ea dolore minus? Alias maxime quod impedit, doloribus corporis laboriosam facere blanditiis itaque ipsum beatae, aperiam quae tempora suscipit error praesentium quidem inventore.',
            'picture' => '/storage/postImg/cedar-bundle-small.jpg',
            'published_at' => '2021-05-25'
        ]);

        \App\Models\Post::create([
            'title' => 'Chestnut Tree',
            'category_id' => 1,
            'type_id' => 1,
            'user_id' => 3,
            'author' => 'treelover',
            'lang' => 'fr',
            'price' => 50,
            'location' => 'East',
            'description' => 'The chestnuts are a group of eight or nine species of deciduous trees and shrubs in the genus Castanea, in the beech family Fagaceae. They are native to temperate regions of the Northern Hemisphere, Lorem ipsum dolor sit amet consectetur adipisicing elit. A nisi vitae unde ad veniam. Omnis magnam aliquam maxime soluta placeat cupiditate rem veritatis quis quod, sed voluptatibus obcaecati sit quia, tenetur ratione ex molestias optio numquam sequi accusantium laborum excepturi ad adipisci. Eveniet quod recusandae id doloremque accusantium adipisci, modi dignissimos est saepe, alias architecto eligendi quisquam ipsa obcaecati mollitia distinctio nam corrupti quae neque ducimus ut praesentium necessitatibus quibusdam. Eius voluptatem officiis repellendus quas error consequuntur ipsa excepturi laudantium culpa in, beatae ex saepe quod ea nam voluptatum iste. Ducimus assumenda veniam, adipisci nemo tenetur atque alias fuga voluptatem est culpa error distinctio ab quos ipsum consectetur ipsam voluptatibus! Nisi nemo commodi consequuntur aspernatur, voluptatibus expedita eligendi soluta eos.',
            'picture' => '/storage/postImg/chestnut-tree-small.jpg',
            'published_at' => '2021-06-12'
        ]);

        \App\Models\Post::create([
            'title' => 'Special Forest Mix',
            'category_id' => 1,
            'type_id' => 2,
            'user_id' => 5,
            'author' => 'jardinier-corse',
            'lang' => 'fr',
            'price' => 650,
            'location' => 'Center',
            'description' => 'Details of the pack: 5 Chestnut Tree from Kerautret Forest (56), 3 Red Oak from Malicorne sur Sarthe Forest (72), 6 Sessile Oak from Luthenay Forest (58), Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore repudiandae delectus, dolores tempore amet quod? In quae earum eveniet. Ipsam saepe consequatur nulla dolores dicta amet, ratione ipsum nesciunt optio enim quaerat voluptatibus dolorum vitae nam accusamus! Repudiandae excepturi non libero sit earum. Dolore, perferendis temporibus. Et, dicta? Doloribus neque nisi culpa mollitia dolorem magni libero, deleniti debitis in? Ex voluptate animi facere adipisci sit temporibus unde id sequi quisquam dolor debitis eum, dolores atque ullam, veritatis cupiditate asperiores inventore.',
            'picture' => '/storage/postImg/forest-pack2-small.jpg',
            'published_at' => '2021-06-30'
        ]);

        \App\Models\Post::create([
            'title' => 'Weymouth Pine',
            'category_id' => 2,
            'type_id' => 1,
            'user_id' => 4,
            'author' => 'forestgirl22',
            'lang' => 'en',
            'price' => 35,
            'location' => 'South-East',
            'description' => 'Weymouth Pine has long, bluish green needles usually in groups of five. They are soft to the touch and when young it is somewhat similar in appearance to the Bhutan pine (Pinus wallichiana), Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio voluptas cupiditate voluptate voluptatem ipsa quis! Beatae hic nulla, commodi repudiandae ex quas est ut ratione quis, quidem optio nesciunt nemo ipsam voluptatibus neque doloremque quisquam dicta qui. Provident magnam iusto impedit velit nemo aliquam quod perferendis nam cumque commodi quae debitis numquam totam id quidem odio voluptate, ipsum nulla doloribus non itaque placeat. Nemo repellat quod dolorem possimus labore amet enim repudiandae qui unde fugiat, officiis assumenda, sit veniam perspiciatis, minus ipsam sapiente voluptatem quasi fuga quae deserunt eaque quisquam! Error velit esse, natus deserunt necessitatibus ipsa quisquam sed earum.',
            'picture' => '/storage/postImg/weymouth-pine-small.jpg',
            'published_at' => '2021-07-01'
        ]);

        \App\Models\Post::create([
            'title' => 'Bercé Forest Oak Pack',
            'category_id' => 1,
            'type_id' => 3,
            'user_id' => 6,
            'author' => 'big-forestier72',
            'lang' => 'en',
            'price' => 4500,
            'surface_area' => 6,
            'location' => 'West',
            'description' => 'Details of the pack: 200 oak trees from 2 to 4 years old + 120 oak trees from 4 to 7 years old from Bercé Forest, France, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo quaerat temporibus unde. Impedit et asperiores dicta! Libero error eius, esse cumque veniam non repellat aspernatur quas illum dicta nostrum eligendi quibusdam eaque amet exercitationem quis, magnam necessitatibus? Nesciunt voluptatibus minima minus, modi iusto repudiandae temporibus perferendis molestias animi saepe architecto!',
            'picture' => '/storage/postImg/bercé-forest-oak-pack-small.jpg',
            'published_at' => '2021-06-17'
        ]);

        \App\Models\Post::create([
            'title' => 'Small Forest Parcel',
            'category_id' => 2,
            'type_id' => 3,
            'user_id' => 6,
            'author' => 'big-forestier72',
            'lang' => 'en',
            'price' => 2000,
            'surface_area' => 7,
            'location' => 'Center',
            'description' => 'Details of the pack: 80 maritime pine trees from 3 to 5 years old, 50 douglas from 2 to 4 years old + 12 cedars from Luthenay Forest, France, Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro modi quia, perferendis quibusdam fugiat exercitationem, deserunt necessitatibus adipisci dolorem sed sunt dolore culpa perspiciatis nulla praesentium corrupti nobis, ullam expedita.',
            'picture' => '/storage/postImg/forest-parcel-small.jpg',
            'published_at' => '2021-06-07'
        ]);

        \App\Models\Post::create([
            'title' => 'Pack 50 trees',
            'category_id' => 2,
            'type_id' => 3,
            'user_id' => 4,
            'author' => 'forestgirl22',
            'lang' => 'en',
            'price' => 4500,
            'surface_area' => 6,
            'location' => 'West',
            'description' => '12 maritime pine trees from 2 to 4 years old + 38 spruce from 1 to 2 years old from Bercé Forest, France, Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci odit autem repellendus architecto aperiam delectus excepturi error esse, perspiciatis tenetur vel possimus impedit ipsum velit assumenda vitae accusantium sunt iste, dolore placeat. Obcaecati nisi tempora cumque dolor id nam at eligendi quisquam maxime quo. Illo tempora iusto mollitia fugiat sequi assumenda. Voluptas deleniti modi, provident consectetur excepturi aperiam aut ullam fugit dolorum amet, voluptatibus laborum unde ea dicta incidunt harum quae, quos distinctio. Unde veniam modi dolore autem nostrum architecto molestias, nam eveniet ullam rerum placeat eius corporis. Velit ex atque natus asperiores ad fugiat unde esse fugit delectus consectetur.',
            'picture' => '/storage/postImg/pack-50-small.jpg',
            'published_at' => '2021-06-20'
        ]);

        \App\Models\Post::create([
            'title' => 'Saint-Sauvant Forest Pack',
            'category_id' => 1,
            'type_id' => 3,
            'user_id' => 6,
            'author' => 'big-forestier72',
            'lang' => 'en',
            'price' => 5500,
            'surface_area' => 8,
            'location' => 'East',
            'description' => 'Details of the pack: 200 oak trees from 2 to 4 years old + 200 red oaks from 3 to 5 years old + 200 chestnut trees from 3 to 5 years old, from Bercé Forest, France, Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ratione iste nostrum eius perspiciatis amet repellendus quasi nam voluptas corrupti, nobis tempore ab, quo fugiat at iure soluta quisquam itaque quaerat sit consequuntur perferendis animi! Excepturi commodi voluptas eaque suscipit optio corporis delectus voluptatibus et beatae cumque amet rem dolorem eius velit, id fugit incidunt minus corrupti debitis perspiciatis ut quam. Dolores beatae earum esse facilis odio perferendis? Odit voluptatem officiis explicabo fuga hic enim modi tempore id commodi quos!',
            'picture' => '/storage/postImg/saint-sauvant-forest-pack-small.jpg',
            'published_at' => '2021-06-22'
        ]);

        \App\Models\Category::create([
            'name' => 'Hardwood',
            'slug' => 'hardwood',
        ]);

        \App\Models\Category::create([
            'name' => 'Softwood',
            'slug' => 'softwood',
        ]);

        \App\Models\Type::create([
            'name' => 'Single Tree',
            'slug' => 'single-tree',
        ]);

        \App\Models\Type::create([
            'name' => 'Small Bundle',
            'slug' => 'small-bundle',
        ]);

        \App\Models\Type::create([
            'name' => 'Medium Bundle',
            'slug' => 'medium-bundle',
        ]);
    }
}
