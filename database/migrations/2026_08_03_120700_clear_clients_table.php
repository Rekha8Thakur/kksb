<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('clients')->truncate();

        $clients = [
            ['name' => 'Bare Bakers', 'logo' => '/images/clients/bare-bakers.png', 'website_url' => null, 'order' => 1],
            ['name' => 'Blackberrys', 'logo' => '/images/clients/blackberrys.png', 'website_url' => null, 'order' => 2],
            ['name' => 'Devbhumi', 'logo' => '/images/clients/devbhumi.jpg', 'website_url' => null, 'order' => 3],
            ['name' => 'McDonald\'s', 'logo' => '/images/clients/mcdonalds.png', 'website_url' => null, 'order' => 4],
            ['name' => 'The Belgian Waffle Co.', 'logo' => '/images/clients/belgian-waffle.jpg', 'website_url' => null, 'order' => 5],
            ['name' => 'Gigo Bytes', 'logo' => '/images/clients/gigo-bytes.jpg', 'website_url' => null, 'order' => 6],
            ['name' => 'Hero MotoCorp', 'logo' => '/images/clients/hero.png', 'website_url' => null, 'order' => 7],
            ['name' => 'Hungry Point', 'logo' => '/images/clients/hungry-point.png', 'website_url' => null, 'order' => 8],
            ['name' => 'Swiggy', 'logo' => '/images/clients/swiggy.png', 'website_url' => null, 'order' => 9],
            ['name' => 'Laxmanjee', 'logo' => '/images/clients/laxmanjee.jpg', 'website_url' => 'https://laxmanjee.com', 'order' => 10],
            ['name' => 'Lenovo', 'logo' => '/images/clients/lenovo.png', 'website_url' => 'https://lenovo.com', 'order' => 11],
            ['name' => 'LG', 'logo' => '/images/clients/lg.jpg', 'website_url' => 'https://lg.com', 'order' => 12],
            ['name' => 'Liqo', 'logo' => '/images/clients/liqo.jpg', 'website_url' => 'https://liqo.com', 'order' => 13],
            ['name' => 'Maini Tour N Travels', 'logo' => '/images/clients/maini.jpg', 'website_url' => 'https://mainitravels.com', 'order' => 14],
            ['name' => 'Mehru\'s', 'logo' => '/images/clients/mehrus.jpg', 'website_url' => null, 'order' => 15],
            ['name' => 'Nexa', 'logo' => '/images/clients/nexa.png', 'website_url' => null, 'order' => 16],
            ['name' => 'NFCI Solan', 'logo' => '/images/clients/nfci.jpg', 'website_url' => null, 'order' => 17],
            ['name' => 'Paris Parker Aveda', 'logo' => '/images/clients/paris-parker.png', 'website_url' => null, 'order' => 18],
            ['name' => 'Peter England', 'logo' => '/images/clients/peter-england.png', 'website_url' => null, 'order' => 19],
            ['name' => 'Zomato', 'logo' => '/images/clients/zomato.png', 'website_url' => null, 'order' => 20],
            ['name' => 'Zorko Brand of Food Lovers', 'logo' => '/images/clients/zorko.png', 'website_url' => null, 'order' => 21],
        ];

        foreach ($clients as $client) {
            $client['created_at'] = now();
            $client['updated_at'] = now();
            DB::table('clients')->insert($client);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
