# Semaine 21 : Évaluation finale

## Objectif :

Cette semaine vous réalisez la dernière évaluation de votre parcours de formation. Vous allez donc
être évalués sur les deux activités types de votre titre professionnel, à savoir développer la partie
front-end et développer la partie back-end d’une application web ou web mobile.

## Compétences évaluées :

- Maquetter une application
- Réaliser une interface utilisateur web statique et adaptable
- Développer une interface utilisateur web dynamique
- Créer une base de données
- Développer les composants d’accès aux données
- Développer la partie back-end d’une application web ou web mobile
- Elaborer et mettre en œuvre des composants dans une application de gestion de contenu
  ou e-commerce

## Sujet :

Développeur web PHP dans une agence, on vous a confié la réalisation d’une application métier
pour un client travaillant dans le bâtiment.
Jusqu’à maintenant, les conducteurs de travaux de ce client utilisent des cahiers, des tableaux blancs
et des post-it pour gérer le dérouler des projets de construction et les différentes deadlines pour les
étapes du chantier.

Le problème avec ce système, bien que fonctionnel, est qu’il est coûteux, peu sécurisé et demande
de la place. Le client souhaite donc développer une application permettant à ses conducteurs de
travaux de gérer leurs projets de manière informatisée.

## Spécifications fonctionnelles :

Pour ce faire, vous devez concevoir une application qui permet à l’utilisateur de :

- Se connecter avec son compte personnel ou de s’inscrire s’il n’a pas de compte
- Voir tous les projets de cet utilisateur sur une page
- Créer un nouveau projet via un formulaire
- Voir le détail d’un projet, c’est-à-dire le projet avec ses tâches quand il clique dessus
- Créer des tâches liées à un projet particulier via un formulaire
- Supprimer les projets et les tâche comme il le désire
- Indiquer si une tâche est terminée
- Distinguer visuellement les tâches finies des tâches en cours
- Voir projets et tâches classées par ordre de deadline
- Utiliser l’application sur les chantiers via une tablette ou un smartphone

L’application est également visuellement enrichie par un ou plusieurs scripts JS afin d’offrir à
l’utilisateur une expérience la plus intuitive possible. Voici quelques exemples de fonctionnalités
possibles mais vous pouvez bien-sûr en intégrer d’autres :

- Au survol d’un projet tous les autres projets sauf celui-ci se grisent
- L’utilisateur peut choisir de cacher temporairement un projet ou une tâche d’un projet
- Un boutton d'aide fait appraître sous forme de popup ou de layer des instructions d'utilisation

## Quelques informations supplémentaires :

- Un utilisateur se connecte avec un email et un mot de passe
- Un projet est composé à minima d’un nom, d’une description, d’une date de création,
  d’une deadline
- Une tâche est composée à minima d’un nom, d’une description, d’une date de création,
  d’une deadline et d’un statut (finie ou non)

### En plus de votre application, on trouvera dans votre projet dans un dossier documentation :

- Un schéma de type UseCase et une arborescence fonctionnelle de l’application reprenant
  les fonctionnalités de chaque page
- Un schéma de base de données listant les tables, leur contenu, leurs relations et les
  cardinalités
- Un diagramme de classes qui liste les entités de votre application, leur contenu et leurs
  relations
- Les wireframes de l’application qui spécifient à minima le template et la page principale
  pour les versions mobiles, tablettes et PC

## Spécifications techniques :

- Framework Symfony 5
- Vous pouvez utiliser si vous le souhaitez la commande de make crud
- Sécurité de l’application gérée avec le bundle de sécurité Symfony
- Idéalement (mais pas obligatoirement) vous générez les données à l’aide de fixtures
- JavaScript ES6

Le rendu se fera via Teams avant dimanche soir minuit dans le dossier rendu vous déposerez
un fichier txt à votre nom avec le lien vers votre repository GitHub qui contiendra votre
projet.

## Présentation du projet :

Afin de vous préparer à la certification et au passage devant le jury, vous allez en guise de
correction du projet présenter ce dernier et serez questionnez sur son code et sa réalisation.
Durée maximum de la présentation 35min.

Vous présenterez votre projet à l’aide d’un support de type PowerPoint respectant le plan suivant :

- Présentation du contexte du projet, de l’entreprise, de l’environnement et/ou du besoin
- Conception et développement de la partie front-end
- Présentation détaillée des éléments les plus significatifs de l’interface de l’application
  (possibilité de démonstration)
- Conception et développement de la partie back-end
- Présentation détaillée de la fonctionnalité back-end la plus significative
- Présentation d’un problème et de la documentation anglophone ayant permis de la
  résoudre
- Conclusion (échecs et réussites/satisfactions)
