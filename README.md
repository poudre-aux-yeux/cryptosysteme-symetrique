# Cryptographie Symétrique

Petit programme PHP pour crypter et décrypter

## Start the program

```sh
php ./src/start.php
```

## Les différentes fonctions de cryptage du programme

Utilisation du mot ```AMI```

- La méthode de césar dans le programme utilise le code ASCII
- Le cryptage du mot passe par l'encodage UTF-8

1. Césarification du mot
   - AMI > [0,12,8]
2. Dé-césarification du mot césarifié
   - [0,12,8] > AMI
3. Cryptage du mot
   - AMI > [3,1,19]
4. Décryptage du mot
   - [3,1,19] > AMI
5. Encodage du mot de texte en binaire
   - AMI > 010000010100110101001001
6. Désencodage du mot de binaire en texte
   - 010000010100110101001001 > AMI

### La permutation

Ordre de base | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7
Ordre mélangé | 5 | 6 | 0 | 3 | 4 | 2 | 7 | 1

1. On récupère la chaine binaire à permuter
2. On sépare chaque partie du binaire correspondant à chaque lettre encodé
3. On mélange les caractères binaires d'un même lot entre eux et suivant suivant un même schéma
4. On réassemble le tout pour obtenir le nouveau mot encodé et permuté
