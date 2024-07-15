<?php
// Funzione per generare uno slug a partire dal nome
function generateSlug($name) {
  return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
}

// Funzione per generare un numero di partita IVA
function generateVatNumber() {
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
  "image1.jpg", "image2.jpg", "image3.jpg", "image4.jpg", "image5.jpg", 
  "image6.jpg", "image7.jpg", "image8.jpg", "image9.jpg", "image10.jpg", 
  "image11.jpg", "image12.jpg", "image13.jpg", "image14.jpg", "image15.jpg", 
  "image16.jpg", "image17.jpg", "image18.jpg", "image19.jpg", "image20.jpg"
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
