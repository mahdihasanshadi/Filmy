<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ActorSeeder extends Seeder
{
    public function run()
    {
        $actors = [
            [
                'name' => 'Tom Hanks',
                'biography' => 'Thomas Jeffrey Hanks is an American actor and filmmaker. Known for both his comedic and dramatic roles, Hanks is one of the most popular and recognizable film stars worldwide.',
                'birth_date' => '1956-07-09',
                'birth_place' => 'Concord, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ2MjMwNDA3Nl5BMl5BanBnXkFtZTcwMTA2NDY3NQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Meryl Streep',
                'biography' => 'Mary Louise "Meryl" Streep is an American actress. Often described as "the best actress of her generation", Streep is particularly known for her versatility and accent adaptation.',
                'birth_date' => '1949-06-22',
                'birth_place' => 'Summit, New Jersey, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTU4Mjk3MDI4Ml5BMl5BanBnXkFtZTcwNzQ2MjM5Nw@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Leonardo DiCaprio',
                'biography' => 'Leonardo Wilhelm DiCaprio is an American actor and film producer. Known for his work in biopics and period films, DiCaprio is the recipient of numerous accolades, including an Academy Award.',
                'birth_date' => '1974-11-11',
                'birth_place' => 'Los Angeles, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjI0MTg3MzI0M15BMl5BanBnXkFtZTcwMzQyODU2Mw@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Morgan Freeman',
                'biography' => 'Morgan Freeman is an American actor, film director, and narrator. Freeman has appeared in many high-profile films and is known for his distinctive deep voice.',
                'birth_date' => '1937-06-01',
                'birth_place' => 'Memphis, Tennessee, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTc0MDMyMzI2OF5BMl5BanBnXkFtZTcwMzM2OTk1MQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Scarlett Johansson',
                'biography' => 'Scarlett Ingrid Johansson is an American actress. The world\'s highest-paid actress in 2018 and 2019, she has featured multiple times on the Forbes Celebrity 100 list.',
                'birth_date' => '1984-11-22',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTM3OTUwMDYwNl5BMl5BanBnXkFtZTcwNTUyNzc3Nw@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Bryan Cranston',
                'biography' => 'Bryan Lee Cranston is an American actor, director, producer, and screenwriter. He is best known for his roles as Walter White in Breaking Bad and Hal in Malcolm in the Middle.',
                'birth_date' => '1956-03-07',
                'birth_place' => 'Hollywood, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTA2NjEyMTY4MTVeQTJeQWpwZ15BbWU3MDQ5NDAzNDc@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Aaron Paul',
                'biography' => 'Aaron Paul Sturtevant is an American actor. He is best known for portraying Jesse Pinkman in the AMC series Breaking Bad, for which he won several awards.',
                'birth_date' => '1979-08-27',
                'birth_place' => 'Emmett, Idaho, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTY1OTY5NjI5NV5BMl5BanBnXkFtZTcwODA4MjM0OA@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Emilia Clarke',
                'biography' => 'Emilia Isobel Euphemia Rose Clarke is an English actress. She is best known for her role as Daenerys Targaryen in Game of Thrones.',
                'birth_date' => '1986-10-23',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BNjg3OTg4MDczMl5BMl5BanBnXkFtZTgwODc0NzUwNjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Kit Harington',
                'biography' => 'Christopher Catesby "Kit" Harington is an English actor. He is best known for his role as Jon Snow in Game of Thrones.',
                'birth_date' => '1986-12-26',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTA2NTI0NjYxMTBeQTJeQWpwZ15BbWU3MDIxMjgyNzY@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Millie Bobby Brown',
                'biography' => 'Millie Bobby Brown is a British actress. She gained recognition for playing Eleven in the Netflix series Stranger Things.',
                'birth_date' => '2004-02-19',
                'birth_place' => 'Marbella, Spain',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjA5NzA0NzQzMF5BMl5BanBnXkFtZTgwMTQxNjUzNjM@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Finn Wolfhard',
                'biography' => 'Finn Wolfhard is a Canadian actor and musician. He is best known for his role as Mike Wheeler in Stranger Things.',
                'birth_date' => '2002-12-23',
                'birth_place' => 'Vancouver, Canada',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjQ3NjM5MzE5Nl5BMl5BanBnXkFtZTgwODQxNjU3NDM@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Steve Carell',
                'biography' => 'Steven John Carell is an American actor and comedian. He is best known for his portrayal of Michael Scott in The Office.',
                'birth_date' => '1962-08-16',
                'birth_place' => 'Concord, Massachusetts, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjMyOTM2OTk1Ml5BMl5BanBnXkFtZTgwMTI3MzkyNjM@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Rainn Wilson',
                'biography' => 'Rainn Wilson is an American actor best known for his role as Dwight Schrute on The Office.',
                'birth_date' => '1966-01-20',
                'birth_place' => 'Seattle, Washington, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTI5ODY0NTAwNl5BMl5BanBnXkFtZTcwOTI3NjkxMw@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Pedro Pascal',
                'biography' => 'Pedro Pascal is a Chilean-American actor. He is known for starring as The Mandalorian in the Star Wars series.',
                'birth_date' => '1975-04-02',
                'birth_place' => 'Santiago, Chile',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BZjNkZmFiZmQtZjRkYS00NzgxLWEzNDktYjA2MmE4NjUxZjU5XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Giancarlo Esposito',
                'biography' => 'Giancarlo Esposito is an American actor known for his roles in Breaking Bad and The Mandalorian.',
                'birth_date' => '1958-04-26',
                'birth_place' => 'Copenhagen, Denmark',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjEyODM1NjI0OF5BMl5BanBnXkFtZTcwMTE0OTA1Mg@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Jennifer Aniston',
                'biography' => 'Jennifer Aniston is an American actress known for her role as Rachel Green in Friends.',
                'birth_date' => '1969-02-11',
                'birth_place' => 'Sherman Oaks, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BNjk1MjIxNjUxNF5BMl5BanBnXkFtZTcwODk2NzM4Mg@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Courteney Cox',
                'biography' => 'Courteney Cox is an American actress known for her role as Monica Geller in Friends.',
                'birth_date' => '1964-06-15',
                'birth_place' => 'Birmingham, Alabama, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTA4OTczNDExNDNeQTJeQWpwZ15BbWU3MDUyNDY4Mjc@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Lisa Kudrow',
                'biography' => 'Lisa Kudrow is an American actress known for her role as Phoebe Buffay in Friends.',
                'birth_date' => '1963-07-30',
                'birth_place' => 'Los Angeles, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTU5OTA0ODcxNl5BMl5BanBnXkFtZTcwMjE3NjQxMw@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Matt LeBlanc',
                'biography' => 'Matt LeBlanc is an American actor known for his role as Joey Tribbiani in Friends.',
                'birth_date' => '1967-07-25',
                'birth_place' => 'Newton, Massachusetts, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BODQ0NTI0OTk0M15BMl5BanBnXkFtZTcwMDk2MDg5Nw@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Matthew Perry',
                'biography' => 'Matthew Perry is an American actor known for his role as Chandler Bing in Friends.',
                'birth_date' => '1969-08-19',
                'birth_place' => 'Williamstown, Massachusetts, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTMwOTg2NDQzOV5BMl5BanBnXkFtZTcwOTE4NzQxMw@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'David Schwimmer',
                'biography' => 'David Schwimmer is an American actor known for his role as Ross Geller in Friends.',
                'birth_date' => '1966-11-02',
                'birth_place' => 'Flushing, Queens, New York City, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ2Mjg5ODY2M15BMl5BanBnXkFtZTgwNjE2OTY2OTE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Claire Foy',
                'biography' => 'Claire Foy is a British actress known for her role as Queen Elizabeth II in The Crown.',
                'birth_date' => '1984-04-16',
                'birth_place' => 'Stockport, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BN2NiMzE1NDUtNzUyNC00ZjM0LWE5NmUtNjRjZWViY2QyZjY1XkEyXkFqcGdeQXVyMTExNzQzMDE0._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Matt Smith',
                'biography' => 'Matt Smith is a British actor known for his roles in Doctor Who and The Crown.',
                'birth_date' => '1982-10-28',
                'birth_place' => 'Northampton, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTg1MjQ0MDg0Nl5BMl5BanBnXkFtZTcwNDg1OTU4OQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Andrew Lincoln',
                'biography' => 'Andrew Lincoln is a British actor known for his role as Rick Grimes in The Walking Dead.',
                'birth_date' => '1973-09-14',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjE0NzM5MTc5OF5BMl5BanBnXkFtZTgwMjc3ODYxODE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Norman Reedus',
                'biography' => 'Norman Reedus is an American actor known for his role as Daryl Dixon in The Walking Dead.',
                'birth_date' => '1969-01-06',
                'birth_place' => 'Hollywood, Florida, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjE3MjM3NjQ0NV5BMl5BanBnXkFtZTgwNDY3ODYxODE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Evan Rachel Wood',
                'biography' => 'Evan Rachel Wood is an American actress known for her role as Dolores Abernathy in Westworld.',
                'birth_date' => '1987-09-07',
                'birth_place' => 'Raleigh, North Carolina, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTg2NjE5NjQ0MV5BMl5BanBnXkFtZTcwMzM0NzIzMw@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Thandie Newton',
                'biography' => 'Thandie Newton is a British actress known for her role as Maeve Millay in Westworld.',
                'birth_date' => '1972-11-06',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTg3NjE5MTY0MV5BMl5BanBnXkFtZTcwMzY4OTM5Ng@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Milo Ventimiglia',
                'biography' => 'Milo Ventimiglia is an American actor known for his role as Jack Pearson in This Is Us.',
                'birth_date' => '1977-07-08',
                'birth_place' => 'Anaheim, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTg1NDg5ODEwNF5BMl5BanBnXkFtZTcwMzY4NDYyOA@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Mandy Moore',
                'biography' => 'Mandy Moore is an American actress and singer known for her role as Rebecca Pearson in This Is Us.',
                'birth_date' => '1984-04-10',
                'birth_place' => 'Nashua, New Hampshire, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTg4NzM5NDk0MV5BMl5BanBnXkFtZTcwNjcwMjE0NA@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Tim Robbins',
                'biography' => 'Timothy Francis Robbins is an American actor, screenwriter, director, producer, and musician. He is known for his role as Andy Dufresne in The Shawshank Redemption.',
                'birth_date' => '1958-10-16',
                'birth_place' => 'West Covina, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTI1OTYxNzAxOF5BMl5BanBnXkFtZTYwNTE5ODI4._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Marlon Brando',
                'biography' => 'Marlon Brando Jr. was an American actor. Considered one of the most influential actors of the 20th century, he received numerous accolades throughout his career.',
                'birth_date' => '1924-04-03',
                'birth_place' => 'Omaha, Nebraska, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjE0NDQzNjk1NF5BMl5BanBnXkFtZTcwMzM2NDY2NQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Al Pacino',
                'biography' => 'Alfredo James Pacino is an American actor and filmmaker. In a career spanning over five decades, he has received numerous accolades.',
                'birth_date' => '1940-04-25',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQzMzg1ODAyNl5BMl5BanBnXkFtZTYwMjAxODQ1._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Tom Hardy',
                'biography' => 'Edward Thomas Hardy is an English actor and producer. He is known for his roles in Inception, The Dark Knight Rises, and Mad Max: Fury Road.',
                'birth_date' => '1977-09-15',
                'birth_place' => 'Hammersmith, London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Christian Bale',
                'biography' => 'Christian Charles Philip Bale is an English actor. Known for his versatility and physical transformations for his roles, he has been a leading man in films of several genres.',
                'birth_date' => '1974-01-30',
                'birth_place' => 'Haverfordwest, Wales',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTkxMzk4MjQ4MF5BMl5BanBnXkFtZTcwMzExODQxOA@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Heath Ledger',
                'biography' => 'Heath Andrew Ledger was an Australian actor and music video director. After performing roles in several Australian television and film productions during the 1990s, Ledger left for the United States in 1998 to develop his film career.',
                'birth_date' => '1979-04-04',
                'birth_place' => 'Perth, Australia',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTI2NTY0NzA4MF5BMl5BanBnXkFtZTYwMjE1Mjc0._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'John Travolta',
                'biography' => 'John Joseph Travolta is an American actor, dancer, and singer. He became prominent during the 1970s, appearing on the television series Welcome Back, Kotter and starring in the box office successes Carrie, Saturday Night Fever, and Grease.',
                'birth_date' => '1954-02-18',
                'birth_place' => 'Englewood, New Jersey, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTU5NTk2MTkyM15BMl5BanBnXkFtZTcwNTQ0NjEzMw@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Robin Wright',
                'biography' => 'Robin Gayle Wright is an American actress and director. She is known for her roles in The Princess Bride, Forrest Gump, and House of Cards.',
                'birth_date' => '1966-04-08',
                'birth_place' => 'Dallas, Texas, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTM0ODU5Nzk2OV5BMl5BanBnXkFtZTcwMzI2ODgyNQ@@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Keanu Reeves',
                'biography' => 'Keanu Charles Reeves is a Canadian actor. Born in Beirut and raised in Toronto, Reeves began acting in theatre productions and in television films before making his feature film debut in Youngblood.',
                'birth_date' => '1964-09-02',
                'birth_place' => 'Beirut, Lebanon',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BNGJmMWEzOGQtMWZkNS00MGNiLTk5NGEtYzg1YzAyZTgzZTZmXkEyXkFqcGdeQXVyMTE1MTYxNDAw._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Laurence Fishburne',
                'biography' => 'Laurence John Fishburne III is an American actor, playwright, producer, screenwriter, and film director. He is known for his roles in The Matrix trilogy, Boyz n the Hood, and What\'s Love Got to Do with It.',
                'birth_date' => '1961-07-30',
                'birth_place' => 'Augusta, Georgia, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTI0NTI4NjE3NV5BMl5BanBnXkFtZTYwMDA0Nzc4._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Liam Neeson',
                'biography' => 'William John Neeson is an actor from Northern Ireland. He has been nominated for several awards, including an Academy Award for Best Actor, a BAFTA Award for Best Actor in a Leading Role, and three Golden Globe Awards for Best Actor in a Motion Picture Drama.',
                'birth_date' => '1952-06-07',
                'birth_place' => 'Ballymena, Northern Ireland',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjA5MTk0NTIyMV5BMl5BanBnXkFtZTcwNjI2MjQ0Nw@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Ralph Fiennes',
                'biography' => 'Ralph Nathaniel Twisleton-Wykeham-Fiennes is an English actor, film producer, and director. A Shakespeare interpreter, he first achieved success onstage at the Royal National Theatre.',
                'birth_date' => '1962-12-22',
                'birth_place' => 'Ipswich, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMjA0MzQzNzM1Nl5BMl5BanBnXkFtZTcwNjM5MjU5OQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Sam Neill',
                'biography' => 'Nigel John Dermot "Sam" Neill is a New Zealand actor. He is known for his roles in Jurassic Park, The Piano, and Peaky Blinders.',
                'birth_date' => '1947-09-14',
                'birth_place' => 'Omagh, Northern Ireland',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTM1MTU2MDU0NF5BMl5BanBnXkFtZTcwNTU2MjU2NQ@@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Laura Dern',
                'biography' => 'Laura Elizabeth Dern is an American actress, director, and producer. She is the recipient of numerous accolades, including an Academy Award, a Primetime Emmy Award, and five Golden Globe Awards.',
                'birth_date' => '1967-02-10',
                'birth_place' => 'Los Angeles, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTc3NzY0ODg5Ml5BMl5BanBnXkFtZTgwMDc0MzY4MTE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Matthew Broderick',
                'biography' => 'Matthew Broderick is an American actor. His roles include the Golden Globe-nominated portrayal of the title character in Ferris Bueller\'s Day Off, the voice of adult Simba in Disney\'s The Lion King, and his Tony Award-winning performance in How to Succeed in Business Without Really Trying.',
                'birth_date' => '1962-03-21',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQzMzg1ODAyNl5BMl5BanBnXkFtZTYwMjAxODQ1._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'James Earl Jones',
                'biography' => 'James Earl Jones is an American actor. He has been described as "one of America\'s most distinguished and versatile" actors and "one of the greatest actors in American history."',
                'birth_date' => '1931-01-17',
                'birth_place' => 'Arkabutla, Mississippi, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTc3NzY0ODg5Ml5BMl5BanBnXkFtZTgwMDc0MzY4MTE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Bob Gunton',
                'biography' => 'Robert Patrick "Bob" Gunton Jr. is an American actor and singer. He is known for his roles as Warden Samuel Norton in The Shawshank Redemption and President Richard Martinez in 24.',
                'birth_date' => '1945-11-15',
                'birth_place' => 'Santa Monica, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'William Sadler',
                'biography' => 'William Thomas Sadler is an American actor. He is known for his roles in Die Hard 2, The Shawshank Redemption, and The Green Mile.',
                'birth_date' => '1950-04-13',
                'birth_place' => 'Buffalo, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Clancy Brown',
                'biography' => 'Clarence J. "Clancy" Brown III is an American actor and voice actor. He is known for his roles in Highlander, The Shawshank Redemption, and Starship Troopers.',
                'birth_date' => '1959-01-05',
                'birth_place' => 'Urbana, Ohio, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Gil Bellows',
                'biography' => 'Gil Bellows is a Canadian actor. He is known for his roles in The Shawshank Redemption, Ally McBeal, and The Weather Man.',
                'birth_date' => '1967-06-28',
                'birth_place' => 'Vancouver, British Columbia, Canada',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Mark Rolston',
                'biography' => 'Mark Rolston is an American actor. He is known for his roles in Aliens, The Shawshank Redemption, and The Departed.',
                'birth_date' => '1956-12-07',
                'birth_place' => 'Baltimore, Maryland, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'James Whitmore',
                'biography' => 'James Allen Whitmore Jr. was an American actor. He was nominated for the Academy Award for Best Supporting Actor for his role in The Shawshank Redemption.',
                'birth_date' => '1921-10-01',
                'birth_place' => 'White Plains, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'James Caan',
                'biography' => 'James Edmund Caan was an American actor. He was known for his roles in The Godfather, Misery, and Elf.',
                'birth_date' => '1940-03-26',
                'birth_place' => 'The Bronx, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Robert Duvall',
                'biography' => 'Robert Selden Duvall is an American actor and filmmaker. He has been nominated for seven Academy Awards and won Best Actor for Tender Mercies.',
                'birth_date' => '1931-01-05',
                'birth_place' => 'San Diego, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Diane Keaton',
                'biography' => 'Diane Keaton is an American actress, director, and producer. She is known for her roles in The Godfather trilogy, Annie Hall, and Something\'s Gotta Give.',
                'birth_date' => '1946-01-05',
                'birth_place' => 'Los Angeles, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'John Cazale',
                'biography' => 'John Holland Cazale was an American actor. He appeared in five films over seven years, all of which were nominated for the Academy Award for Best Picture.',
                'birth_date' => '1935-08-12',
                'birth_place' => 'Boston, Massachusetts, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Talia Shire',
                'biography' => 'Talia Rose Shire is an American actress. She is known for her roles in The Godfather trilogy and the Rocky series.',
                'birth_date' => '1946-04-25',
                'birth_place' => 'Lake Success, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Joseph Gordon-Levitt',
                'biography' => 'Joseph Leonard Gordon-Levitt is an American actor, filmmaker, singer, and entrepreneur. He is known for his roles in Inception, The Dark Knight Rises, and Looper.',
                'birth_date' => '1981-02-17',
                'birth_place' => 'Los Angeles, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Ellen Page',
                'biography' => 'Ellen Philpotts-Page is a Canadian actor and producer. She is known for her roles in Juno, Inception, and The Umbrella Academy.',
                'birth_date' => '1987-02-21',
                'birth_place' => 'Halifax, Nova Scotia, Canada',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Ken Watanabe',
                'biography' => 'Ken Watanabe is a Japanese actor. He is known for his roles in The Last Samurai, Inception, and Godzilla.',
                'birth_date' => '1959-10-21',
                'birth_place' => 'Koide, Niigata, Japan',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Dileep Rao',
                'biography' => 'Dileep Rao is an American actor. He is known for his roles in Inception, Avatar, and Drag Me to Hell.',
                'birth_date' => '1973-07-29',
                'birth_place' => 'Los Angeles, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Cillian Murphy',
                'biography' => 'Cillian Murphy is an Irish actor. He is known for his roles in 28 Days Later, Inception, and Peaky Blinders.',
                'birth_date' => '1976-05-25',
                'birth_place' => 'Douglas, Cork, Ireland',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Tom Berenger',
                'biography' => 'Thomas Michael Moore "Tom" Berenger is an American actor. He is known for his roles in Platoon, Major League, and Inception.',
                'birth_date' => '1949-05-31',
                'birth_place' => 'Chicago, Illinois, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Michael Caine',
                'biography' => 'Sir Michael Caine is an English actor. He is known for his roles in The Italian Job, The Dark Knight trilogy, and Inception.',
                'birth_date' => '1933-03-14',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Aaron Eckhart',
                'biography' => 'Aaron Edward Eckhart is an American actor. He is known for his roles in The Dark Knight, Thank You for Smoking, and Sully.',
                'birth_date' => '1968-03-12',
                'birth_place' => 'Cupertino, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Gary Oldman',
                'biography' => 'Gary Leonard Oldman is an English actor and filmmaker. He is known for his roles in The Dark Knight trilogy, Harry Potter, and Darkest Hour.',
                'birth_date' => '1958-03-21',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Maggie Gyllenhaal',
                'biography' => 'Margalit Ruth "Maggie" Gyllenhaal is an American actress and producer. She is known for her roles in The Dark Knight, Secretary, and Crazy Heart.',
                'birth_date' => '1977-11-16',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Samuel L. Jackson',
                'biography' => 'Samuel Leroy Jackson is an American actor and producer. He is known for his roles in Pulp Fiction, The Avengers, and Star Wars.',
                'birth_date' => '1948-12-21',
                'birth_place' => 'Washington, D.C., USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Uma Thurman',
                'biography' => 'Uma Karuna Thurman is an American actress and model. She is known for her roles in Pulp Fiction, Kill Bill, and Gattaca.',
                'birth_date' => '1970-04-29',
                'birth_place' => 'Boston, Massachusetts, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Bruce Willis',
                'biography' => 'Walter Bruce Willis is an American actor and producer. He is known for his roles in Die Hard, Pulp Fiction, and The Sixth Sense.',
                'birth_date' => '1955-03-19',
                'birth_place' => 'Idar-Oberstein, West Germany',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Ving Rhames',
                'biography' => 'Irving Rameses "Ving" Rhames is an American actor. He is known for his roles in Pulp Fiction, Mission: Impossible, and Dawn of the Dead.',
                'birth_date' => '1959-05-12',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Tim Roth',
                'biography' => 'Timothy Simon Roth is an English actor and director. He is known for his roles in Pulp Fiction, Reservoir Dogs, and The Hateful Eight.',
                'birth_date' => '1961-05-14',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Amanda Plummer',
                'biography' => 'Amanda Michael Plummer is an American actress. She is known for her roles in Pulp Fiction, The Fisher King, and The Hunger Games: Catching Fire.',
                'birth_date' => '1957-03-23',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Maria de Medeiros',
                'biography' => 'Maria de Medeiros is a Portuguese actress, director, and singer. She is known for her roles in Pulp Fiction, Henry & June, and The Saddest Music in the World.',
                'birth_date' => '1965-08-19',
                'birth_place' => 'Lisbon, Portugal',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Eric Stoltz',
                'biography' => 'Eric Stoltz is an American actor, director, and producer. He is known for his roles in Pulp Fiction, Mask, and Some Kind of Wonderful.',
                'birth_date' => '1961-09-30',
                'birth_place' => 'American Fork, Utah, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Rosanna Arquette',
                'biography' => 'Rosanna Lauren Arquette is an American actress, film director, and producer. She is known for her roles in Pulp Fiction, Desperately Seeking Susan, and The Whole Nine Yards.',
                'birth_date' => '1959-08-10',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Christopher Walken',
                'biography' => 'Christopher Walken is an American actor. He is known for his roles in Pulp Fiction, The Deer Hunter, and Catch Me If You Can.',
                'birth_date' => '1943-03-31',
                'birth_place' => 'Astoria, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Gary Sinise',
                'biography' => 'Gary Alan Sinise is an American actor, director, and musician. He is known for his roles in Forrest Gump, Apollo 13, and CSI: NY.',
                'birth_date' => '1955-03-17',
                'birth_place' => 'Blue Island, Illinois, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Mykelti Williamson',
                'biography' => 'Mykelti Williamson is an American actor. He is known for his roles in Forrest Gump, Con Air, and 24.',
                'birth_date' => '1957-03-04',
                'birth_place' => 'St. Louis, Missouri, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Sally Field',
                'biography' => 'Sally Margaret Field is an American actress and director. She is known for her roles in Forrest Gump, Steel Magnolias, and Places in the Heart.',
                'birth_date' => '1946-11-06',
                'birth_place' => 'Pasadena, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Carrie-Anne Moss',
                'biography' => 'Carrie-Anne Moss is a Canadian actress. She is known for her roles in The Matrix trilogy, Memento, and Jessica Jones.',
                'birth_date' => '1967-08-21',
                'birth_place' => 'Burnaby, British Columbia, Canada',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Hugo Weaving',
                'biography' => 'Hugo Wallace Weaving is an English-Australian actor. He is known for his roles in The Matrix trilogy, The Lord of the Rings trilogy, and V for Vendetta.',
                'birth_date' => '1960-04-04',
                'birth_place' => 'Ibadan, Nigeria',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Joe Pantoliano',
                'biography' => 'Joseph Peter Pantoliano is an American actor. He is known for his roles in The Matrix, Memento, and The Sopranos.',
                'birth_date' => '1951-09-12',
                'birth_place' => 'Hoboken, New Jersey, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Ben Kingsley',
                'biography' => 'Sir Ben Kingsley is an English actor. He is known for his roles in Gandhi, Schindler\'s List, and Iron Man 3.',
                'birth_date' => '1943-12-31',
                'birth_place' => 'Scarborough, Yorkshire, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Caroline Goodall',
                'biography' => 'Caroline Cruice Goodall is an English actress. She is known for her roles in Schindler\'s List, Hook, and The Princess Diaries.',
                'birth_date' => '1959-11-13',
                'birth_place' => 'London, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Jonathan Sagall',
                'biography' => 'Jonathan Sagall is an Israeli actor, director, and screenwriter. He is known for his roles in Schindler\'s List and Europa Europa.',
                'birth_date' => '1959-01-23',
                'birth_place' => 'Toronto, Ontario, Canada',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Embeth Davidtz',
                'biography' => 'Embeth Jean Davidtz is an American actress. She is known for her roles in Schindler\'s List, Matilda, and Bicentennial Man.',
                'birth_date' => '1965-08-11',
                'birth_place' => 'Trenton, New Jersey, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Jeff Goldblum',
                'biography' => 'Jeffrey Lynn Goldblum is an American actor and musician. He is known for his roles in Jurassic Park, Independence Day, and Thor: Ragnarok.',
                'birth_date' => '1952-10-22',
                'birth_place' => 'West Homestead, Pennsylvania, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Richard Attenborough',
                'biography' => 'Richard Samuel Attenborough, Baron Attenborough was an English actor, director, and producer. He is known for his roles in Jurassic Park, The Great Escape, and Miracle on 34th Street.',
                'birth_date' => '1923-08-29',
                'birth_place' => 'Cambridge, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Bob Peck',
                'biography' => 'Robert Peck was an English actor. He is known for his roles in Jurassic Park, Edge of Darkness, and The Life and Loves of a She-Devil.',
                'birth_date' => '1945-08-23',
                'birth_place' => 'Leeds, Yorkshire, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Martin Ferrero',
                'biography' => 'Martin Ferrero is an American actor. He is known for his roles in Jurassic Park, Heat, and Planes, Trains and Automobiles.',
                'birth_date' => '1947-11-29',
                'birth_place' => 'Brockton, Massachusetts, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'BD Wong',
                'biography' => 'Bradley Darryl Wong is an American actor. He is known for his roles in Jurassic Park, Law & Order: Special Victims Unit, and Mr. Robot.',
                'birth_date' => '1960-10-24',
                'birth_place' => 'San Francisco, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Jeremy Irons',
                'biography' => 'Jeremy John Irons is an English actor. He is known for his roles in The Lion King, Die Hard with a Vengeance, and The Borgias.',
                'birth_date' => '1948-09-19',
                'birth_place' => 'Cowes, Isle of Wight, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Moira Kelly',
                'biography' => 'Moira Kelly is an American actress. She is known for her roles in The Lion King, Twin Peaks, and One Tree Hill.',
                'birth_date' => '1968-03-06',
                'birth_place' => 'Queens, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Nathan Lane',
                'biography' => 'Nathan Lane is an American actor and writer. He is known for his roles in The Lion King, The Birdcage, and Modern Family.',
                'birth_date' => '1956-02-03',
                'birth_place' => 'Jersey City, New Jersey, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Ernie Sabella',
                'biography' => 'Ernie Sabella is an American actor. He is known for his roles in The Lion King, Perfect Strangers, and Friends.',
                'birth_date' => '1949-09-19',
                'birth_place' => 'Westbury, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Rowan Atkinson',
                'biography' => 'Rowan Sebastian Atkinson is an English actor, comedian, and writer. He is known for his roles in Mr. Bean, Blackadder, and Johnny English.',
                'birth_date' => '1955-01-06',
                'birth_place' => 'Consett, County Durham, England',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Whoopi Goldberg',
                'biography' => 'Whoopi Goldberg is an American actor, comedian, and television personality. She is known for her roles in The Color Purple, Ghost, and Sister Act.',
                'birth_date' => '1955-11-13',
                'birth_place' => 'New York City, New York, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Female',
                'is_active' => true
            ],
            [
                'name' => 'Cheech Marin',
                'biography' => 'Richard Anthony "Cheech" Marin is an American actor, comedian, and writer. He is known for his roles in The Lion King, Desperado, and From Dusk Till Dawn.',
                'birth_date' => '1946-07-13',
                'birth_place' => 'Los Angeles, California, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ],
            [
                'name' => 'Jim Cummings',
                'biography' => 'James Jonah "Jim" Cummings is an American voice actor. He is known for his roles in The Lion King, Winnie the Pooh, and Darkwing Duck.',
                'birth_date' => '1952-11-03',
                'birth_place' => 'Youngstown, Ohio, USA',
                'photo' => 'https://m.media-amazon.com/images/M/MV5BMTQ3MjU1MDMxM15BMl5BanBnXkFtZTgwODg1MTY2MjE@._V1_.jpg',
                'gender' => 'Male',
                'is_active' => true
            ]
        ];

        foreach ($actors as $actor) {
            Actor::firstOrCreate(
                ['name' => $actor['name']],
                array_merge($actor, ['slug' => Str::slug($actor['name'])])
            );
        }
    }
}
