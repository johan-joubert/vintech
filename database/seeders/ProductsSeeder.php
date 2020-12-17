<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // -------- PRODUITS DE LA GAMME GAMING ------------------------------------------------------------------------------
        DB::table('products')->insert([
            'name' => 'Borne d\'arcade DRAGON BALL',
            'short_description' => 'Grace a la borne d\'arcade DRAGON BALL; retrouvez l\'univers emblématique des jeux d\'arcades chez vous.',
            'description' => 'Produit vintage, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit.',
            'image' => 'arcade_db.jpg',
            'price' => 1499.99,
            'weight' => 129.36,
            'stock' => 5,
            'range_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Flipper STAR WARS',
            'short_description' => 'Grace au flipper STAR WARS; retrouvez l\'univers amusant du flipper chez vous.',
            'description' => 'Produit vintage, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'flipper.jpg',
            'price' => 1999.99,
            'weight' => 105.91,
            'stock' => 3,
            'range_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'NINTENDO NES',
            'short_description' => 'Console Nintendo NES, livrée avec 2 manettes et 2 jeux',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'nintendo.jpg',
            'price' => 129.99,
            'weight' => 1.2,
            'stock' => 30,
            'range_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'SEGA MASTER SYSTEM',
            'short_description' => 'Console Sega MASTER SYSTEM, livrée avec 2 manettes et 2 jeux',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'sega_master.jpg',
            'price' => 99.99,
            'weight' => 1.525,
            'stock' => 30,
            'range_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'GAME BOY',
            'short_description' => 'Console Game Boy, livrée avec 2 jeux',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'game_boy.jpg',
            'price' => 59.99,
            'weight' => 0.534,
            'stock' => 55,
            'range_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'GAME BOY COLOR POKÉMON',
            'short_description' => 'Console Game Boy Color Pokémon éditon limitée, livrée avec 2 jeux',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'game_boy_color.jpg',
            'price' => 99.99,
            'weight' => 0.534,
            'stock' => 25,
            'range_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'TETRIS',
            'short_description' => 'Console de poche Tetris',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'tetris.jpg',
            'price' => 39.99,
            'weight' => 0.324,
            'stock' => 45,
            'range_id' => 1
        ]);

        // -------- PRODUITS DE LA GAMME AUDIO ------------------------------------------------------------------------------        
        DB::table('products')->insert([
            'name' => 'Gramophone',
            'short_description' => 'Grace a ce Gramophone de qualitée supérieur, vous allez pouvoir redécouvrir vos titres favoris',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'gramophone.jpg',
            'price' => 199.99,
            'weight' => 10.564,
            'stock' => 10,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Platine vinyle',
            'short_description' => 'Grace a cette Platine vinyle de qualitée supérieur, vous allez pouvoir redécouvrir vos titres favoris',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'platine_vinyle.jpg',
            'price' => 89.99,
            'weight' => 8.957,
            'stock' => 18,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Jukebox',
            'short_description' => 'Animez vos soirées grace a ce jukebox de qualitée supérieur, idéal pour les soirées entre amis. 15 titres inclus.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'jukebox.jpg',
            'price' => 399.99,
            'weight' => 85.214,
            'stock' => 7,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Chaine hifi',
            'short_description' => 'Animez vos soirées grace a cette chaine hifi multifonction, double lecteur casette, triple lecteur cd.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'chaine_hifi.jpg',
            'price' => 89.49,
            'weight' => 35.241,
            'stock' => 15,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Boombox',
            'short_description' => 'Si vous aimez mettre l\'ambiance partout ou vous passez, cette Boombox est faite pour vous!',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'boombox.jpg',
            'price' => 59.99,
            'weight' => 8.386,
            'stock' => 35,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Radio',
            'short_description' => 'Grace a ce poste de radio de qualitée antique, redécouvrez vos chaines radio préférées.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'radio.jpg',
            'price' => 64.49,
            'weight' => 14.325,
            'stock' => 15,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Walkman',
            'short_description' => 'Grace a ce walkman, écoutez et réécoutez vos casettes préférées partout ou vous allez.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'walkman.jpg',
            'price' => 35.29,
            'weight' => 0.230,
            'stock' => 24,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Baladeur CD',
            'short_description' => 'Grace a ce baladeur CD, écoutez et réécoutez vos CD préférés partout ou vous allez.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'baladeur_cd.jpg',
            'price' => 29.99,
            'weight' => 0.218,
            'stock' => 36,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Baladeur radio',
            'short_description' => 'Grace a ce baladeur radio, écoutez et réécoutez vos radios préférées partout ou vous allez.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'baladeur_radio.jpg',
            'price' => 25.49,
            'weight' => 0.198,
            'stock' => 55,
            'range_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Lecteur MP3',
            'short_description' => 'Grace a ce lecteur MP3, écoutez et réécoutez vos chansons préférées partout ou vous allez.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'lecteur_mp3.jpg',
            'price' => 34.49,
            'weight' => 0.227,
            'stock' => 32,
            'range_id' => 2
        ]);

        // -------- PRODUITS DE LA GAMME VIDEO ------------------------------------------------------------------------------
        DB::table('products')->insert([
            'name' => 'Téléviseur couleur',
            'short_description' => 'Grace a ce poste de télévison, redécouvrez vos films préférés en basse qualitée.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'television1.jpg',
            'price' => 89.99,
            'weight' => 13.75,
            'stock' => 15,
            'range_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Téléviseur sur pied',
            'short_description' => 'Grace a ce poste de télévison, redécouvrez vos films préférés en basse qualitée et grace a son pied plus besoin de meuble télé.',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'television2.jpg',
            'price' => 136.29,
            'weight' => 23.104,
            'stock' => 9,
            'range_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Magnetoscope',
            'short_description' => 'Ce magnetoscope vous permettra de revoir vous films préférés en qualitée originelle',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'magnetoscope.jpg',
            'price' => 126.49,
            'weight' => 3.56,
            'stock' => 15,
            'range_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Camescope',
            'short_description' => 'Ce camescope vous permettra, de filmer tout ce que vous voulez et de le conserver sur cassette',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'camescope.jpg',
            'price' => 79.99,
            'weight' => 2.168,
            'stock' => 28,
            'range_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Vidéoprojecteur',
            'short_description' => 'Grace a ce vidéoprojecteur, transformez votre salon en salle de ciméma et mettez vous dans la peau des frères Lumière',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'videoprojecteur.jpg',
            'price' => 239.99,
            'weight' => 14.324,
            'stock' => 6,
            'range_id' => 3
        ]);

        // -------- PRODUITS DE LA GAMME INFORMATIQUE ------------------------------------------------------------------------------
        DB::table('products')->insert([
            'name' => 'PC sous Windows 98',
            'short_description' => 'Ordinateur sous système d\'exploitation de la société Microsoft, successeur de Windows 95',
            'description' => 'Windows 98 s\'est décliné en deux versions principales : la première sortie le 25 juin 19981 puis une mise à jour de la précédente dite "Second Edition", sortie le 23 avril 1999. Il fut suivi par Windows Millennium (ME) pour le grand public et par Windows 2000 pour les entreprises. Il constitue la seconde version de Windows 9x. Tout comme son prédécesseur, Windows 98 est bâti sur MS-DOS 7.1 et aura été la dernière version à prendre en charge le mode réel.',
            'image' => 'videoprojecteur.jpg',
            'price' => 150,
            'weight' => 20,
            'stock' => 7,
            'range_id' => 4
        ]);

        DB::table('products')->insert([
            'name' => 'Macintosh 1984',
            'short_description' => 'Grace a ce vidéoprojecteur, transformez votre salon en salle de ciméma et mettez vous dans la peau des frères Lumière',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'videoprojecteur.jpg',
            'price' => 239.99,
            'weight' => 14.324,
            'stock' => 9,
            'range_id' => 4
        ]);

        DB::table('products')->insert([
            'name' => 'Vidéoprojecteur',
            'short_description' => 'Grace a ce vidéoprojecteur, transformez votre salon en salle de ciméma et mettez vous dans la peau des frères Lumière',
            'description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques. Replongez vous dans le passé, grasse a ce magnifique produit',
            'image' => 'videoprojecteur.jpg',
            'price' => 239.99,
            'weight' => 14.324,
            'stock' => 8,
            'range_id' => 4
        ]);

    }
}
