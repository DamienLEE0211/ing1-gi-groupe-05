# ing1-gi-groupe-05
Pour utiliser VueJs ,il faut d'abord installer NodeJs:
Windows:
 -Installer la dernière version LTS(disponible sur le site officiel de NodeJs)
 -Apres installation, verifier dans l'invite de commande (ou powershell) la version de Node ainsi que la version du node package manager(npm):
 Pour Node:
 
 ``` Node --version```
 
 Pour npm:
 
 ``` npm --version```
 
----------------------------------------------------------------------------------------------------------------------------------------
Linux: 
 Ouvrir le terminal(ctrl+alt+T) 
 -Installer curl: 
 
 ``` sudo apt install curl```
 
 -Installer NodeJs avec les commandes suivantes:
 
 ``` curl -fsSL https://deb.nodesource.com/setup_14.x | sudo -E bash -```  (avec setup_14.x à adapter selon la distribution binaire nodejs)
 
 puis :
 
 ``` sudo apt-get install -y nodejs```
 
 Et enfin verifier la version avec les mêmes commandes que pour windows (Node --version et  npm --version)
----------------------------------------------------------------------------------------------------------------------------------------
Pour installer VuejS (vue-cli): 
Dans l'invite de commande ou le powershell(terminal pour Linux): Se placer dans le dossier où demarrer l'application 
``` cd ./chemin_jusqua_l'application```

puis

``` npm install vue```

puis installer vue-cli:

``` npm install -g @vue/cli```

Enfin pour demarrer l'application, decompresser le zip de l'application et se placer dans le dossier front ou se trouvent les dossiers src et vite.config.js

``` cd front```

puis demarrer l'application:

``` npm run dev```
