<?php

namespace Database\Seeders;

use App\Models\Package;
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
            'name' => 'Ahusan Mohamed',
            'email' => 'ahusan5657@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        Package::factory()->create([
            'title' => 'Romantic Getaway to Paris',
            'description' => 'Experience the romance of Paris with this exclusive package.',
            'destination' => 'Paris, France',
            'price' => 1499.99,
            'duration' => 7,
            'start_date' => '2024-09-15',
            'inclusions' => ['Flight', 'Hotel', 'City Tour'],
            'exclusions' => ['Meals', 'Travel Insurance'],
            'itinerary' => [
                'Day 1' => 'Arrival in Paris',
                'Day 2' => 'City Tour',
                'Day 3' => 'Boat Tour',
                'Day 4' => 'Eiffel Tower Tour',
                'Day 5' => 'Baguette Tour',
                'Day 6' => 'Croissant Tour',
                'Day 7' => 'Leave Paris :(',
            ],
            'max_participants' => 20,
            'image_url' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a?q=80&w=2020&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'is_featured' => true,
        ]);
        Package::factory()->create([
            'title' => 'Beach Paradise in Maldives',
            'description' => 'Relax and unwind on the pristine beaches of Maldives with this luxurious getaway package. Perfect for couples and honeymooners.',
            'destination' => 'Maldives',
            'price' => 2499.99,
            'duration' => 5,
            'start_date' => '2024-10-05',
            'inclusions' => ['Round-trip Flight', 'Luxury Resort Stay', 'All-Inclusive Meals', 'Snorkeling', 'Sunset Cruise'],
            'exclusions' => ['Travel Insurance', 'Personal Expenses'],
            'itinerary' => [
                'Day 1' => 'Arrival in Maldives and transfer to the luxury resort by speedboat.',
                'Day 2' => 'Morning snorkeling excursion to coral reefs. Evening private dinner on the beach.',
                'Day 3' => 'Full-day guided island hopping tour with beach BBQ.',
                'Day 4' => 'Spa session in the morning followed by a sunset cruise with champagne.',
                'Day 5' => 'Breakfast, leisure time, and departure.',
            ],
            'max_participants' => 10,
            'image_url' => 'https://images.unsplash.com/photo-1470218091926-22a08a325802?q=80&w=1933&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'is_featured' => true,
        ]);

        Package::factory()->create([
            'title' => 'Adventure in the Amazon Rainforest',
            'description' => 'Explore the wild beauty of the Amazon with this adventurous package. Ideal for nature lovers and thrill-seekers.',
            'destination' => 'Amazon Rainforest, Brazil',
            'price' => 1799.99,
            'duration' => 7,
            'start_date' => '2024-11-12',
            'inclusions' => ['Round-trip Flight', 'Lodge Accommodation', 'Guided Jungle Tours', 'River Cruise', 'Wildlife Watching'],
            'exclusions' => ['Travel Insurance', 'Vaccinations'],
            'itinerary' => [
                'Day 1' => 'Arrival in Manaus and transfer to the lodge by riverboat.',
                'Day 2' => 'Guided hike into the rainforest followed by a nocturnal wildlife watching session.',
                'Day 3' => 'Canoe trip along the Amazon River and visit to an indigenous village.',
                'Day 4' => 'Guided wildlife safari and visit to a wildlife rehabilitation center.',
                'Day 5' => 'Piranha fishing in the river and a BBQ in the evening.',
                'Day 6' => 'Full-day river cruise with a visit to a hidden waterfall.',
                'Day 7' => 'Departure from Manaus after breakfast.',
            ],
            'max_participants' => 15,
            'image_url' => 'https://images.unsplash.com/photo-1609428443430-e082b7e657c4?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'is_featured' => false,
        ]);

        Package::factory()->create([
            'title' => 'Cultural Heritage Tour of Japan',
            'description' => 'Immerse yourself in the rich cultural heritage of Japan with this guided tour. Perfect for history buffs and cultural enthusiasts.',
            'destination' => 'Tokyo, Kyoto, and Osaka, Japan',
            'price' => 3199.99,
            'duration' => 10,
            'start_date' => '2024-10-20',
            'inclusions' => ['Round-trip Flight', 'Hotel Accommodation', 'Guided Tours', 'Cultural Workshops'],
            'exclusions' => ['Meals', 'Personal Expenses'],
            'itinerary' => [
                'Day 1' => 'Arrival in Tokyo and transfer to the hotel.',
                'Day 2' => 'Full-day tour of Tokyo, including a visit to the Imperial Palace and Meiji Shrine.',
                'Day 3' => 'Travel to Kyoto with visits to Fushimi Inari Shrine and Kiyomizu Temple.',
                'Day 4' => 'Cultural workshops in Kyoto, including tea ceremony and kimono dressing.',
                'Day 5' => 'Day trip to Nara, with visits to Todai-ji Temple and Nara Deer Park.',
                'Day 6' => 'Travel to Osaka and explore the vibrant Dotonbori district.',
                'Day 7' => 'Visit to Osaka Castle and Umeda Sky Building.',
                'Day 8' => 'Day trip to Hiroshima with a visit to the Peace Memorial Park.',
                'Day 9' => 'Free day in Osaka for shopping and leisure.',
                'Day 10' => 'Departure from Osaka after breakfast.',
            ],
            'max_participants' => 20,
            'image_url' => 'https://images.unsplash.com/photo-1700491251809-9abc0f7b967e?q=80&w=1916&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'is_featured' => true,
        ]);

        Package::factory()->create([
            'title' => 'Safari Adventure in Kenya',
            'description' => 'Experience the thrill of the African savanna with this all-inclusive safari package.',
            'destination' => 'Masai Mara, Kenya',
            'price' => 2999.99,
            'duration' => 8,
            'start_date' => '2024-12-05',
            'inclusions' => ['Round-trip Flight', 'Luxury Tent Accommodation', 'Daily Game Drives', 'All Meals'],
            'exclusions' => ['Travel Insurance', 'Vaccinations'],
            'itinerary' => [
                'Day 1' => 'Arrival in Nairobi and transfer to Masai Mara.',
                'Day 2' => 'Morning and evening game drives in the Masai Mara.',
                'Day 3' => 'Visit to a Masai village and cultural exchange.',
                'Day 4' => 'Full-day game drive with a picnic in the savanna.',
                'Day 5' => 'Hot air balloon safari at sunrise followed by a champagne breakfast.',
                'Day 6' => 'Leisure day with optional nature walk or visit to a local school.',
                'Day 7' => 'Final game drive and farewell dinner.',
                'Day 8' => 'Departure from Masai Mara and transfer to Nairobi for flight home.',
            ],
            'max_participants' => 12,
            'image_url' => 'https://images.unsplash.com/photo-1519659528534-7fd733a832a0?q=80&w=1926&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'is_featured' => true,
        ]);

        Package::factory()->create([
            'title' => 'Cultural and Culinary Journey in Italy',
            'description' => 'Explore the cultural and culinary delights of Italy with this immersive package.',
            'destination' => 'Rome, Florence, and Venice, Italy',
            'price' => 2699.99,
            'duration' => 9,
            'start_date' => '2024-11-01',
            'inclusions' => ['Round-trip Flight', 'Hotel Accommodation', 'Guided Tours', 'Cooking Classes'],
            'exclusions' => ['Travel Insurance', 'Personal Expenses'],
            'itinerary' => [
                'Day 1' => 'Arrival in Rome and transfer to the hotel.',
                'Day 2' => 'Guided tour of ancient Rome, including the Colosseum and Roman Forum.',
                'Day 3' => 'Day trip to Vatican City with a visit to St. Peter’s Basilica and the Sistine Chapel.',
                'Day 4' => 'Travel to Florence with a stop in Tuscany for wine tasting.',
                'Day 5' => 'Guided tour of Florence, including the Uffizi Gallery and Ponte Vecchio.',
                'Day 6' => 'Cooking class in Florence with a focus on traditional Tuscan cuisine.',
                'Day 7' => 'Travel to Venice and explore the city’s canals and historic landmarks.',
                'Day 8' => 'Day trip to the islands of Murano and Burano.',
                'Day 9' => 'Departure from Venice after breakfast.',
            ],
            'max_participants' => 18,
            'image_url' => 'https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?q=80&w=1966&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'is_featured' => true,
        ]);

    }
}
