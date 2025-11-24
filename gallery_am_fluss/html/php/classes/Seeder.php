<?php

require_once __DIR__ . "/Artist.php";
require_once __DIR__ . "/Painting.php";

class Seeder {

    public static function seed(): array {
        // Künstliche Beispiel-Daten (fiktiv)
        return [
            new Artist(
                1,
                "Elara Novis",
                "Elara Novis ist eine zeitgenössische Malerin, die für ihre surrealen Farbexplosionen bekannt ist.",
                [
                    new Painting(1, "Whispers of the Void", 2020, "media/art-gallery-pic-1.jpg"),
                    new Painting(2, "Silent Horizon", 2019, "media/art-gallery-pic-2.jpg"),
                    new Painting(3, "Eclipse of Thought", 2021, "media/art-gallery-pic-3.jpg"),
                    new Painting(4, "Fragments of Tomorrow", 2022, "media/art-gallery-pic-4.jpg"),
                ]
            ),
            new Artist(
                2,
                "Lior Sanz",
                "Lior Sanz kombiniert digitale Kunst mit traditionellen Maltechniken und schafft traumartige Landschaften.",
                [
                    new Painting(5, "Echo Garden", 2018, "media/art-gallery-pic-5.jpg"),
                    new Painting(6, "Glass Memory", 2020, "media/art-gallery-pic-6.jpg"),
                    new Painting(7, "Still Heart", 2021, "media/art-gallery-pic-7.jpg"),
                    new Painting(8, "Dust and Dawn", 2022, "media/art-gallery-pic-8.jpg"),
                ]
            ),
            new Artist(
                3,
                "Mara Kelyth",
                "Mara Kelyth malt expressionistische Szenen, die Themen wie Erinnerung, Licht und Natur erforschen.",
                [
                    new Painting(9, "Golden Rain", 2023, "media/art-gallery-pic-9.jpg"),
                    new Painting(10, "Crimson Mirage", 2022, "media/art-gallery-pic-10.jpg"),
                    new Painting(11, "The Forgotten Sea", 2024, "media/art-gallery-pic-11.jpg"),
                    new Painting(12, "Between Shadows", 2021, "media/art-gallery-pic-12.jpg"),
                ]
            )
        ];
    }
}
