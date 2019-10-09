# Step by step how I make my plugin

<TODO : Screen - () >

## Etape 1 la création :

Je commence par créer deux fichiers.
Le premier index.php qui lui ne va absolument rien contenir mais est nécessaire à la création du plugin. Ce fichier sert à empêcher le listing du contenu des dossiers. 
Puis chroma-contest-settins.php, qui lui va me servir de file header, de plus il sécurise le plugin.

## Etape 2 initialisation :

Depuis ce file header, je déclare un nouvelle objet.
$Contest = new Contest. 
Dans cette classe je commence par déclarer une variable privée qui par la suite va contenir les options de ma page.

Quant au constructeur, je lui donne des fonctions liées a WordPress ( les add_action ). Elles vont définir les options du plugin ainsi qu'une redirection de ma page lors de l'envoi d'un formulaire.

Ma fonction de redirection est une vérification de la variable $_POST au champ qui lui correspond. Si elles contient bien quelque chose, alors je passe dans une variable sur le chemin de mon plugin. Cette variable je la passe ensuite dans la fonction wp_redirect , fonction liée à Wordpress qui récupère l'url du back-office dynamiquement.

J'ai par la suite une fonction d'ajout de page, qui détermine si l'utilisateur est bien administrateur pour accéder à la page du plugin depuis le back-office. Elle permet aussi de donner un nom , une capability et un slug à ma page.

Je crée une fonction qui va quant à elle contenir le contenu html. Je passe ici dans l'objet courant la fonction get_option, elle récupère une valeur d'option basée sur un nom d'option prècis lié a Wordpress.

La dernière fonction du plugin me permet d'initialiser les paramètres de ma page. Fonction type des plugins de wordpress.

## Etape 3 la database :

Depuis une fonction de mon objet contest, je déclare un routeur.php. Dès l'entrée de mon routeur j'appelle ce coup ci un nouvelle objet ( oui un objet dans un objet ). Cette objet va quand à lui s'occuper des appels depuis la base de données. Il va me permettre d'utiliser la constante $wpdb qui va contenir des tableaux de données des tables choisies.

L'objet contestdb va contenir des fonctions qui vont me permettre d'avoir un accès a la base de données de WordPress et de ma table custom. La fonction set_contest_information va me permettre de rentrer dans la table chroma_contest les données récupérées dans le formulaire. J'appellerai cette fonction lors d'une vérification.

J'ai aussi une fonction qui permet de supprimer l'id courant du concours ciblé. 

J'ai par la suite fait une fonction qui me renvoie un tableau d'objet de titre, qui de ma table post est ciblée par ces attachements. Cela me permettra d'afficher par la suite dans une liste déroulante l'oeuvre à présenter pour le concours.

Par la suite la fonction get_id_by_join vas me retourner un tableau d'identifiants. Je passe par une requête sql qui va faire un INNER JOIN de mea table post et contest. Cela permet de récupérer seulement l'identifiant en lien avec le nom de l'oeuvre. Le retour de cette variable va me permettre d'appeler lors de la boucle de WordPress l'identifiant dans son tableau d'argument.

Il existe La fonction get_current_contest_id qui me retourne tout les id de ma table concours, elle me permettra de conditionner l'affichage des concours. 

La fonction suivante get_all_contest va cibler ma table 'chroma_contest', puis me retourner un tableau de données accessible depuis mon routeur.

Avant de finir sur les fonctions qui passent à mon objet les variables nécessaires a l'insertion de données, je fait une fonction qui va me retourner un tableau de d'identifiant depuis ma table concours. Avant de renvoyer ce tableau, je le passe dans une variable, via la fonction de php array_key, qui va me retourner toutes les  clefs de ce tableau. Ces clefs me permettront de compter le nombre d'oeuvres lancées pour le concours.

Pour conclure l'objet contestdb, je fais des get du nom du concours, de la date, de la description et du nom de l'oeuvre associée. 

## Etape 4 routeur et traitement :

Le routeur est une classe chargée de rediriger les requête reçues vers la bonne action

Dans mon routeur après avoir déclaré mon objet Contestdb ( lien avec la base de données ) je fais une vérification de nouveau mais pour l'affichage de la vue, ce qui par le futur me permettra de conditionner utilisateur et administrateur. Cette vérification sert à voir si le rôle est bien égal à administrator et admin_artiste. Alors on redirige vers la vue en question.

Avant cette redirection je vérifie si mon objet n'est pas vide, si il est vide alors il n'exécutera pas les prochains scripts appelés. Si la condition est bonne , je viens associer à de nouvelles variables les fonctions de récupérations de données que j'avais créé dans ma classe contestdb.

Avant d'afficher quoi que ce soit, j'effectue des traitement de données.
* La vérification : Grâce à ce traitement de données je vais pouvoir rentrer en base de données les informations récupérées dans les champs de mon formulaire grâce à la méthode post. Je vérifie via une condition sur les données récupérées en POST qu'elles ne soient pas nulles. Si elles ne le sont pas, je vais pouvoir les attribuer dans des variables. Via une autre condition je vérifie si les données sont vides, alors j'attribue un message d'erreur dans une variable. Si on a bien des données correctes, alors on les passe dans la fonction qui insert les données.

* La suppression d'un concours : Une simple condition qui me permet la suppression d'un concours via sont id, depuis le bouton hidden de mon formulaire.

* Et un tableau de données qui contiendra du html dans une variable.  Je viens d'abord initialiser un tableau vide qui va contenir mes tableaux à parcourir. Je boucle sur la variable qui va contenir toute ma table depuis ma base de données. Je viens stocker dans mon tableau vide, tout mon html, ce qui va me permettre de boucler sur l'index et ainsi récupérer l'information dans son champ dans la vue adéquat.

Pour finir avec le routeur, je termine par une petite condition qui vérifie si les identifiants récupérés via une fonction sont remplis, si cela ne contient pas d'identifiants alors on affiche un message comme quoi il n'y a pas de concours.

## Etape 5 Les vues :

Maintenant que les données on été traitées je vais pouvoir les afficher via mes deux fichiers view.

Dans mon fichier create_contest_admin.php je fais un formulaire qui de mes balises <input>, va récupérer via les getteurs depuis mon objet contestdb.php les valeurs insérées dans les champs qui leur corresponds.
Dans cette même vue je crée un sélecteur. Je viens boucler sur mon tableau de titre d'oeuvre, qui pour chaque index va afficher le nom de l'oeuvre. Je passe alors une variable dynamique dans la value cette balise <option> et aussi à l'intérieur. Avant de refermer mon formulaire, je place un bouton caché, qui va au clic récupérer le nom qui a été choisi dans la liste des options.

Tout le formulaire est pris dans une condition qui vérifie le nombre de clefs, si les clefs atteignent le nombre de 5 alors on affiche un message qui indique à l'utilisateur qu'il ne peux plus créer de concours.

Dans le fichier current_contest.php je vais afficher les concours fraîchement créés.
Je commence alors par initialiser la variable $index à zéro, car elle va pouvoir être co-raccord avec les index de mon tableau qui contient le html et le code php dynamique. Mais avant cela, je boucle sur mon tableau contenant les id des mes post ( depuis la table post ). Je viens donc placer en argument de ma boucle WordPress.