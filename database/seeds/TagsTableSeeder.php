<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 26)->create();

        //TODO: pivot seed with unique id pairs
        /*DB::table('post_tag')->insert([
            [
                'post_id' => Post::orderByRaw("RAND()")->value('id'),
                'tag_id' => Tag::orderByRaw("RAND()")->value('id')
            ],
        ]);*/

    }
}
