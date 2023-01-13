<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $author = User::create([
            'username' => 'natali',
            'email' => 'natali@gmail.com',
            'password' => 'test',
        ]);

		$quiz1 = Quiz::create([
			'title' => 'Taylor swift Quiz',
            'description' => "This quiz is about taylor swift's life",
            'author' => $author->username,
            'user_id' => $author->id,
            'status' => 1,
            'image' => '/images/taylor-main.jpeg'
		]);

		$quiz2 = Quiz::create([
			'title' => 'The strokes Quiz',
            'description' => "This quiz is about The band 'The strokes'",
            'author' => $author->username,
            'user_id' => $author->id,
            'status' => 1,
            'image' => '/images/strokes-main.jpg'
		]);


		Question::create([
			'quiz_id' => $quiz1->id,
            'question' => "What is Taylor's zodiac sign?",
            'A' => 'Taurus',
            'B' => 'Sagittarius',
            'C' => 'Aquarius',
            'D' => 'Capricorn',
            'correct' => 'B',
            'image' => '/images/zodiac.jpg',
            'position' => 1

		]);

		Question::create([
			'quiz_id' => $quiz1->id,
            'question' => "Where did Taylor Swift grow up?",
            'A' => 'Alabama',
            'B' => 'Pennsylvania',
            'C' => 'Washington',
            'D' => 'Georgia',
            'correct' => 'B',
            'image' => '/images/pennsylvania.webp',
            'position' => 2
		]);

		Question::create([
			'quiz_id' => $quiz1->id,
            'question' => "What is the name of Taylor's last album?",
            'A' => 'Miriani',
            'B' => 'Midnights',
            'C' => 'Folklore',
            'D' => 'Qvin',
            'correct' => 'B',
            'image' => '/images/midnights.webp',
            'position' => 3
		]);


		Question::create([
			'quiz_id' => $quiz2->id,
            'question' => "What was the name of The Stroke's first album?",
            'A' => 'Is this it?',
            'B' => 'Mr.brightside',
            'C' => 'Angles',
            'D' => 'The new abnormal',
            'correct' => 'A',
            'image' => '/images/strokes-1.webp',
            'position' => 1
		]);

        Question::create([
			'quiz_id' => $quiz2->id,
            'question' => "Who is Stroke's frontman?",
            'A' => 'Julian Casablancas',
            'B' => 'Alex Turner',
            'C' => 'Tina Turner',
            'D' => 'Bedina',
            'correct' => 'A',
            'image' => '/images/julian.jpg',
            'position' => 2
		]);

        Question::create([
			'quiz_id' => $quiz2->id,
            'question' => "What is the name of Julian's another band?",
            'A' => 'Killers',
            'B' => 'Voidz',
            'C' => 'Arctic Monkeys',
            'D' => 'Tame Impala',
            'correct' => 'B',
            'image' => '/images/voidz.webp',
            'position' => 3
		]);
    }
}
