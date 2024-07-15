<?php
// Funzione per generare un nome casuale
function generateName($index) {
  $names = [
      "Luca Rossi", "Maria Bianchi", "Giovanni Verdi", "Anna Neri", "Paolo Russo",
      "Francesca Romano", "Stefano Gallo", "Chiara Fontana", "Marco Leone", "Elena Mancini",
      "Andrea De Luca", "Sara Grimaldi", "Roberto Ricci", "Laura Marini", "Giuseppe Esposito",
      "Martina Rizzi", "Alessandro Moretti", "Federica Vitale", "Matteo Costantini", "Silvia Fabbri"
  ];
  return $names[$index];
}

// Funzione per generare un'email realistica a partire dal nome
function generateEmail($name) {
  $domains = ["libero.it", "hotmail.com", "gmail.com", "domain.com", "resto.com"];
  $domain = $domains[array_rand($domains)];
  $email = strtolower(str_replace(' ', '.', $name)) . '@' . $domain;
  return $email;
}

// Password predefinita
$password = '$2y$12$oH.vtqyAz4Al3i7cUtxHa.x8r8.0VOoQn56q6DE64mgxiqNm2TiXu';

// Genera array di titolari
$users = [];
for ($i = 0; $i < 20; $i++) {
  $name = generateName($i);
  $email = generateEmail($name);

  $users[] = [
      "name" => $name,
      "email" => $email,
      "password" => $password
  ];
}

return $users;