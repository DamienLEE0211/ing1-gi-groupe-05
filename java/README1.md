Utilisation des bibliothèques java.io, java.util et Gson et exécution de la fonction main de Serveur.java

Ce guide explique comment utiliser les bibliothèques java.io, java.util et Gson dans un projet Java, ainsi que comment exécuter la fonction main d'un fichier Serveur.java pour démarrer un serveur.
Prérequis

    Assurez-vous d'avoir installé Java Development Kit (JDK) sur votre système.
    Téléchargez les fichiers JAR des bibliothèques java.io, java.util et Gson depuis leurs sources officielles ou depuis un référentiel de dépendances tel que Maven ou Gradle.
    Vérifiez que vous disposez du fichier Serveur.java contenant la fonction main dans votre projet.

- Compilation

Ouvrez un terminal et accédez au répertoire racine de votre projet Java.

Utilisez la commande javac pour compiler votre programme Java en incluant les fichiers JAR requis dans le classpath. Remplacez "chemin/vers/la/library1.jar" et "chemin/vers/la/library2.jar" par les chemins d'accès complets des fichiers JAR correspondants.

```bash

javac -cp chemin/vers/la/library1.jar:chemin/vers/la/library2.jar Serveur.java
```
Assurez-vous que le fichier Serveur.java est dans le même répertoire ou spécifiez le chemin d'accès complet si nécessaire.

- Exécution

Une fois la compilation réussie, exécutez la fonction main du fichier Serveur.java en utilisant la commande java. Assurez-vous d'être dans le même répertoire que le fichier compilé ou spécifiez le chemin d'accès complet si nécessaire.


```bash
java Serveur
```

