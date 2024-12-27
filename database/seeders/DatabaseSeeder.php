<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Language;
use App\Models\Topic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'youssef essam',
            'mobile' => '01143752219',
            'email' => 'essamy688@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'admin',



        ]);
        // User
        User::factory(100)->create();

        // Author

        Author::factory(100)->create();


        // Topic
        $bookTopics = [
            "Artificial Intelligence",
            "Quantum Physics",
            "Climate Change",
            "Space Exploration",
            "Ancient Civilizations",
            "World War II",
            "Mindfulness and Meditation",
            "The Art of Negotiation",
            "Digital Marketing Strategies",
            "Personal Finance Management",
            "Cooking and Culinary Arts",
            "Creative Writing",
            "Astrology and Horoscopes",
            "Ethics in Technology",
            "Cryptocurrency and Blockchain",
            "Human Anatomy",
            "Famous Biographies",
            "Machine Learning",
            "Sustainable Living",
            "The History of Music",
            "Film and Cinema Studies",
            "Mythology from Around the World",
            "Travel Guides and Tips",
            "Photography Basics",
            "Programming for Beginners",
            "Entrepreneurship and Startups",
            "Space-Time Continuum",
            "Wildlife and Conservation",
            "Psychology of Happiness",
            "Game Design and Development",
            "Gardening for Beginners",
            "Healthy Diets and Recipes",
            "Leadership and Team Building",
            "The Science of Sleep",
            "Nanotechnology",
            "The Art of Storytelling",
            "Cybersecurity",
            "Philosophy and Life",
            "Robotics and Automation",
            "Public Speaking Skills",
            "Cultural Anthropology",
            "Modern Architecture",
            "Renewable Energy",
            "Poetry and Prose",
            "The History of Fashion",
            "Fantasy World Building",
            "Parenting Tips and Guides",
            "Artificial Neural Networks",
            "The Future of Work",
            "Romantic Literature",
            "Sports and Fitness",
            "Economics for Beginners",
            "Marine Biology",
            "The Science of Emotions",
            "Programming with Python",
            "Advanced Mathematics",
            "The History of Science",
            "Urban Gardening",
            "Music Theory Basics",
            "Graphic Design Essentials",
            "Social Media Trends",
            "Astronomy for Beginners",
            "Conflict Resolution",
            "Self-Improvement Strategies",
            "Exploring Philosophy",
            "AI Ethics",
            "Life in the Middle Ages",
            "The Renaissance Era",
            "Geopolitics and Globalization",
            "Innovations in Medicine",
            "The Art of Drawing",
            "Historical Fiction",
            "Environmental Studies",
            "Understanding Algorithms",
            "Poetry from Around the World",
            "Political Theories",
            "Epidemiology Basics",
            "Adventure Travel",
            "Virtual Reality",
            "Introduction to Astronomy",
            "Building Healthy Habits",
            "Yoga and Wellness",
            "Animal Behavior",
            "Introduction to Sociology",
            "The Art of Film Editing",
            "Science Fiction Worlds",
            "Fitness Routines",
            "Artificial Superintelligence",
            "The Psychology of Learning",
            "Writing for Children",
            "Sustainable Agriculture",
            "Blockchain for Business",
            "Data Science and Analytics",
            "The History of Philosophy",
            "Cognitive Behavioral Therapy",
            "Mediterranean Cuisine",
            "The Art of Comedy",
            "Mythical Creatures",
            "Understanding the Universe",
            "The History of Books",
            "The Internet of Things",
            "Design Thinking",
            "The Great Outdoors"
        ];
        foreach ($bookTopics as $topic) {
            Topic::create(
                ['topic' => $topic]
            );
        }



        // Languages
        $languages = [
            'Arabic',
            'English',
            'Germmany',
            'Italy'
        ];
        foreach ($languages as $language) {

            Language::create([
                'lang' => $language
            ]);
        }


        // Books
        Book::factory(100)->create();
    }
}
