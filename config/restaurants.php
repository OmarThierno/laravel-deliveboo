<?php
// Funzione per generare uno slug a partire dal nome
function generateSlug($name)
{
  return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
}

// Funzione per generare un numero di partita IVA
function generateVatNumber()
{
  return rand(10000000000, 99999999999);
}

// Array di nomi di ristoranti
$restaurantNames = [
  "Trattoria da Mario", "Ristorante Bella Napoli", "Osteria del Buon Gusto",
  "Pizzeria Il Forno", "La Dolce Vita", "Ristorante La Pergola",
  "Trattoria Al Vecchio Mulino", "Ristorante Al Mare", "Pizzeria Da Gino",
  "Osteria La Cantina", "Ristorante Il Sogno", "Trattoria Il Girasole",
  "Ristorante Alla Torre", "Pizzeria La Rosa", "Osteria Il Boccale",
  "Trattoria Al Ponte", "Ristorante La Piazzetta", "Pizzeria La Lanterna",
  "Osteria Al Fiume", "Ristorante Il Campanile"
];

// Array di indirizzi di esempio
$addresses = [
  "Via Roma, 1, Roma", "Via Milano, 2, Milano", "Via Napoli, 3, Napoli",
  "Via Firenze, 4, Firenze", "Via Torino, 5, Torino", "Via Bologna, 6, Bologna",
  "Via Venezia, 7, Venezia", "Via Palermo, 8, Palermo", "Via Bari, 9, Bari",
  "Via Genova, 10, Genova", "Via Verona, 11, Verona", "Via Perugia, 12, Perugia",
  "Via Parma, 13, Parma", "Via Siena, 14, Siena", "Via Modena, 15, Modena",
  "Via Trento, 16, Trento", "Via Trieste, 17, Trieste", "Via Udine, 18, Udine",
  "Via Catania, 19, Catania", "Via Lecce, 20, Lecce"
];

// Array di immagini di esempio
$images = [
  "https://i.pinimg.com/564x/30/38/23/303823f794d72c0de459710a1b1aa9da.jpg", "https://i.pinimg.com/736x/98/b5/5b/98b55b61b77fb05cfe91063d39436f40.jpg", "https://i.pinimg.com/564x/6d/e1/9c/6de19cc57e4b6f1b4c1f62d965cf25c7.jpg", "https://i.pinimg.com/564x/d4/7f/b2/d47fb2c693d840d64f54f4778cfa4836.jpg", "https://i.pinimg.com/564x/f8/e5/f9/f8e5f9b53b0227124e5788ff355bdd98.jpg/",
  "https://i.pinimg.com/564x/92/4b/1b/924b1b56a27c760a7a0c23acb8a0171b.jpg", "https://i.pinimg.com/736x/8f/30/cb/8f30cba123bbcd584814a3a9f0915e4f.jpg", "https://i.pinimg.com/564x/51/72/09/517209f814ae727a14eb2e60b2c5f2b8.jpg", "https://i.pinimg.com/564x/11/19/eb/1119eba36188c766c543fd90ea30c6fc.jpg", "https://i.pinimg.com/564x/1f/28/c0/1f28c0ae1ae7b9e428bc5d5b7456b2d1.jpg",
  "https://i.pinimg.com/564x/a8/00/0d/a8000d97d3f37592dc2e9d3626471518.jpg", "https://i.pinimg.com/564x/d5/d8/94/d5d894bcdf012c2d936385f63f4848d0.jpg", "https://i.pinimg.com/564x/77/22/a9/7722a95968254428457f14ab5c78d3d6.jpg", "https://i.pinimg.com/564x/2e/98/bc/2e98bcf06f7c4fd7d096bd51fd31b248.jpg", "https://i.pinimg.com/564x/a9/2b/1f/a92b1f53ada416912f8fb9cbb94fdac9.jpg",
  "https://i.pinimg.com/564x/63/f5/ca/63f5cabe8b041503cf38841f40f166ff.jpg", "https://i.pinimg.com/564x/41/ac/24/41ac2431e30781523ed8c30de0634ff7.jpg", "https://i.pinimg.com/564x/f9/b4/76/f9b476f9438cfb2bff23b036b8ad5a5c.jpg", "https://i.pinimg.com/564x/05/19/17/05191722edbe91daf1ae8bb2d8f00acd.jpg", "https://i.pinimg.com/564x/42/7a/33/427a33c1c46a59061096ef64c40eaba8.jpg"
];

// Genera array di ristoranti
$restaurants = [];
for ($i = 0; $i < 20; $i++) {
  $name = $restaurantNames[$i];
  $user_id = $i + 1;
  $slug = generateSlug($name);
  $address = $addresses[$i];
  $image = $images[$i];
  $vat_number = generateVatNumber();

  $restaurants[] = [
    "business_name" => $name,
    "user_id" => $user_id,
    "slug" => $slug,
    "address" => $address,
    "image" => $image,
    "vat_number" => $vat_number
  ];
}

return $restaurants;
