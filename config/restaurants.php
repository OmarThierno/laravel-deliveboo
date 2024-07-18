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
  "Osteria Al Fiume", "Ristorante Il Campanile", "Ristorante Il Pescatore", 
  "Trattoria La Fonte", "Pizzeria Al Volo", 
  "Osteria Il Cortile", "Ristorante La Quercia", "Trattoria Al Pozzo",
  "Pizzeria La Ruota", "Osteria La Luna", "Ristorante La Grotta",
  "Trattoria La Conchiglia", "Pizzeria Il Vesuvio", "Osteria Il Gabbiano",
  "Ristorante La Taverna", "Trattoria Al Bosco", "Pizzeria Il Faro",
  "Osteria Il Grappolo", "Ristorante Il Portico", "Trattoria La Stella",
  "Pizzeria Il Pino", "Osteria La Cascina"
];

// Array di indirizzi di esempio
$addresses = [
  "Via Roma, 1, Roma", "Via Milano, 2, Milano", "Via Napoli, 3, Napoli",
  "Via Firenze, 4, Firenze", "Via Torino, 5, Torino", "Via Bologna, 6, Bologna",
  "Via Venezia, 7, Venezia", "Via Palermo, 8, Palermo", "Via Bari, 9, Bari",
  "Via Genova, 10, Genova", "Via Verona, 11, Verona", "Via Perugia, 12, Perugia",
  "Via Parma, 13, Parma", "Via Siena, 14, Siena", "Via Modena, 15, Modena",
  "Via Trento, 16, Trento", "Via Trieste, 17, Trieste", "Via Udine, 18, Udine",
  "Via Catania, 19, Catania", "Via Lecce, 20, Lecce", "Corso Vittorio Emanuele, 21, Roma", 
  "Piazza Duomo, 22, Milano", "Viale delle Belle Arti, 23, Napoli",
  "Piazza della Signoria, 24, Firenze", "Corso Francia, 25, Torino", "Piazza Maggiore, 26, Bologna",
  "Campo San Polo, 27, Venezia", "Via Maqueda, 28, Palermo", "Corso Cavour, 29, Bari",
  "Via Garibaldi, 30, Genova", "Via Mazzini, 31, Verona", "Piazza IV Novembre, 32, Perugia",
  "Piazza Garibaldi, 33, Parma", "Piazza del Campo, 34, Siena", "Corso Canalchiaro, 35, Modena",
  "Piazza Duomo, 36, Trento", "Piazza Unità d'Italia, 37, Trieste", "Via Mercatovecchio, 38, Udine",
  "Via Etnea, 39, Catania", "Piazza Sant'Oronzo, 40, Lecce"
];

// Array di immagini di esempio
$images = [
  "https://i.pinimg.com/564x/30/38/23/303823f794d72c0de459710a1b1aa9da.jpg", "https://i.pinimg.com/736x/98/b5/5b/98b55b61b77fb05cfe91063d39436f40.jpg", "https://i.pinimg.com/564x/6d/e1/9c/6de19cc57e4b6f1b4c1f62d965cf25c7.jpg", "https://i.pinimg.com/564x/d4/7f/b2/d47fb2c693d840d64f54f4778cfa4836.jpg", "https://i.pinimg.com/474x/69/f0/a1/69f0a1cb9971f44deca903cdabd69e82.jpg",
  "https://i.pinimg.com/564x/92/4b/1b/924b1b56a27c760a7a0c23acb8a0171b.jpg", "https://i.pinimg.com/736x/8f/30/cb/8f30cba123bbcd584814a3a9f0915e4f.jpg", "https://i.pinimg.com/564x/51/72/09/517209f814ae727a14eb2e60b2c5f2b8.jpg", "https://i.pinimg.com/564x/11/19/eb/1119eba36188c766c543fd90ea30c6fc.jpg", "https://i.pinimg.com/564x/1f/28/c0/1f28c0ae1ae7b9e428bc5d5b7456b2d1.jpg",
  "https://i.pinimg.com/564x/a8/00/0d/a8000d97d3f37592dc2e9d3626471518.jpg", "https://i.pinimg.com/564x/d5/d8/94/d5d894bcdf012c2d936385f63f4848d0.jpg", "https://i.pinimg.com/564x/77/22/a9/7722a95968254428457f14ab5c78d3d6.jpg", "https://i.pinimg.com/564x/2e/98/bc/2e98bcf06f7c4fd7d096bd51fd31b248.jpg", "https://i.pinimg.com/564x/a9/2b/1f/a92b1f53ada416912f8fb9cbb94fdac9.jpg",
  "https://i.pinimg.com/564x/63/f5/ca/63f5cabe8b041503cf38841f40f166ff.jpg", "https://i.pinimg.com/564x/41/ac/24/41ac2431e30781523ed8c30de0634ff7.jpg", "https://i.pinimg.com/564x/f9/b4/76/f9b476f9438cfb2bff23b036b8ad5a5c.jpg", "https://i.pinimg.com/564x/05/19/17/05191722edbe91daf1ae8bb2d8f00acd.jpg", "https://i.pinimg.com/564x/42/7a/33/427a33c1c46a59061096ef64c40eaba8.jpg",
  "https://i.pinimg.com/474x/9c/74/a0/9c74a00ca967ca06f6d514ce13443f77.jpg", "https://i.pinimg.com/474x/90/16/ab/9016abc6e14faed8510a4eb03a3a5de2.jpg", "https://i.pinimg.com/474x/34/7f/8d/347f8d6089a45534ba7e84f7a5085555.jpg", "https://i.pinimg.com/474x/a6/f4/cc/a6f4cc1b01eadcdf7115221e035d1390.jpg", "https://i.pinimg.com/474x/53/38/10/533810f6725df29ec2253baa6ee74d1c.jpg",
  "https://i.pinimg.com/474x/c3/f8/02/c3f802155a000569ac44673c687dadf5.jpg", "https://i.pinimg.com/474x/7a/84/9d/7a849db06a290632e3d31226889636ec.jpg", "https://i.pinimg.com/474x/d9/4a/a0/d94aa0738571c7be2f8c9a1197a5ef14.jpg", "https://i.pinimg.com/474x/29/a4/1a/29a41a7e139b52ff7dd6ef4f006d823d.jpg", "https://i.pinimg.com/474x/60/f8/47/60f847a42bd5f368e6f2d9dd80edbe86.jpg",
  "https://i.pinimg.com/474x/a7/a9/d2/a7a9d2ee940f2360e1d2097cda3cfb31.jpg", "https://i.pinimg.com/474x/b3/3d/d6/b33dd68d47b4bbfe7759dc8f18fbf050.jpg", "https://i.pinimg.com/474x/89/74/58/897458698e889041997103aafea386e2.jpg", "https://i.pinimg.com/474x/65/22/2e/65222e4c247b634055ae88532e879d71.jpg", "https://i.pinimg.com/474x/e5/e2/6c/e5e26c717eda3b2dd0b8700913298b98.jpg",
  "https://i.pinimg.com/474x/b4/af/a9/b4afa9cd5858ade7cf00a1ff04941334.jpg", "https://i.pinimg.com/474x/67/1a/c5/671ac51d269090d3c7c4f3e15bfe68e9.jpg", "https://i.pinimg.com/474x/ff/57/1e/ff571ee6572aa02047994bd3457f137b.jpg", "https://i.pinimg.com/474x/c7/94/71/c794712d090c9984cdd958ef67fd8ab0.jpg", "https://i.pinimg.com/474x/99/ba/bc/99babc0273f5cdb534edb9358339631f.jpg"
];

// Genera array di ristoranti
$restaurants = [];
for ($i = 0; $i < count($restaurantNames); $i++) {
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
