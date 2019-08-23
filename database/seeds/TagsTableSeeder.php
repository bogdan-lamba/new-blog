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
        factory(Tag::class, 10)->create();

        //TODO: pivot seed with unique id pairs
        /*DB::table('post_tag')->insert([
            [
                'post_id' => Post::orderByRaw("RAND()")->value('id'),
                'tag_id' => Tag::orderByRaw("RAND()")->value('id')
            ],
        ]);*/

        //temp
        DB::table('post_tag')->insert([
            [
                'post_id' => '1',
                'tag_id' => '1',
            ],
            [
                'post_id' => '1',
                'tag_id' => '2',
            ],
            [
                'post_id' => '1',
                'tag_id' => '3',
            ],
            [
                'post_id' => '1',
                'tag_id' => '4',
            ],
            [
                'post_id' => '1',
                'tag_id' => '5',
            ],
            [
                'post_id' => '1',
                'tag_id' => '6',
            ],
            [
                'post_id' => '1',
                'tag_id' => '7',
            ],
            [
                'post_id' => '2',
                'tag_id' => '5',
            ],
            [
                'post_id' => '2',
                'tag_id' => '6',
            ],
            [
                'post_id' => '2',
                'tag_id' => '7',
            ],

        ]);

    }
}
