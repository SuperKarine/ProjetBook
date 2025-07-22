La Startup EcoRide a pour objectif de réduire l'impact environnemental des déplacements en encourageant le covoiturage. L'ambition EcoRide est de devenir la principale plateforme de covoiturage pour les voyageurs soucieux de l'environnement et ceux qui recherchent 
une solution économique pour leurs déplacements. Déplacements uniquement en voiture.
J'ai donc crée un site pour répondre à ses besoins. Vous trouverez en copie pièces jointes les données de mon fichier .env pour se connecter à base de données.
Cette application à été conçu avec un environnement Docker avec des images MariaDB pour une base de données en MySQL, Mongo pour MongoDB
Le déploiement en CI/CD est en cours.
Pour déployer localement cette application vous aurez besoin de :
Docker
Docker-compose
et Git pour cloner le projet

Pour lancer l'application en local : git clone https://github.com/SuperKarine/CovoiturageEcoRide2.git
cd CovoiturageEcoRide2

Lancer l'application avec Docker Compose avec la commande : docker-compose up --build

Pour accéder à la navigation sur navigateur : Pour la page d'accueil = http://app.localhost/

                                              Pour les autres pages  = http://app.localhost/apropos (mettre le nom du fichier sans l'extension.php)

Les commandes utiles pour docker compose (sur le port 80) pour arrêter les containers docker-compose down
Voir les logs -> docker-compose logs -f
Pour rebuilder en cas de changement sur la configuration des images -> docker-compose up --build

